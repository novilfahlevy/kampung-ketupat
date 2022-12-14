<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Traits\Action;
use App\Traits\Upload;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    use Action, Upload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galleries = Gallery::query();

        if ($request->query->has('keyword')) {
            $galleries->keyword($request->query->get('keyword'));
        }

        $galleries = $galleries->paginate(10);
        
        return view('backend.pages.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.galleries.create');
    }
    
    public function createVideo()
    {
        return view('backend.pages.galleries.create-video');
    }

    private function storePhotos(StoreGalleryRequest $request)
    {
        foreach ($request->photos as $photo) {
            $gallery = new Gallery();
            $gallery->description = $request->description;
            $gallery->type = 'photo';
            
            $filename = $this->saveAndModify($photo, function($image) use ($gallery) {
                $gallery->photo_width = $image->width();
                $gallery->photo_height = $image->height();
            });

            if ($filename) {
                $gallery->photo_url = $filename;
                $gallery->save();
            }
        }

        $this->logAction('Mengunggah foto ke galeri');
    }

    private function storeVideo(StoreGalleryRequest $request)
    {
        $gallery = new Gallery();
        $gallery->photo_url = $request->youtube_url;
        $gallery->description = $request->description;
        $gallery->type = 'video';
        $gallery->save();

        $this->logAction('Mengunggah video ke galeri');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->youtube_url) {
                $this->storeVideo($request);
            } else {
                $this->storePhotos($request);
            }
            
            DB::commit();

            return redirect()
                ->route('admin.galeri.index')
                ->with('response', ['status' => 200, 'message' => 'Berhasil mengunggah foto ke galeri']);
        } catch (Exception $error) {
            DB::rollBack();
            app('sentry')->captureException($error);
            return redirect()
                ->back()
                ->with('response', ['status' => $error->getCode(), 'message' => 'Gagal mengunggah foto ke galeri, silakan coba lagi']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('backend.pages.galleries.edit', compact('gallery'));
    }

    public function editVideo($id)
    {
        $gallery = Gallery::find($id);
        return view('backend.pages.galleries.edit-video', compact('gallery'));
    }

    private function updatePhoto(UpdateGalleryRequest $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->description = $request->description;

        $photo = $request->photo;
        if ($photo) {
            $filename = $this->saveAndModify($photo, function($image) use ($gallery) {
                $gallery->photo_width = $image->width();
                $gallery->photo_height = $image->height();
            });
            if ($filename) {
                $gallery->photo_url = $filename;
            }
        }

        $gallery->save();

        $this->logAction('Mengedit foto di galeri');
    }

    private function updateVideo(UpdateGalleryRequest $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->photo_url = $request->youtube_url;
        $gallery->description = $request->description;
        $gallery->save();

        $this->logAction('Mengedit video di galeri');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            if ($request->youtube_url) {
                $this->updateVideo($request, $id);
            } else {
                $this->updatePhoto($request, $id);
            }

            DB::commit();

            return redirect()->back()->with('response', ['status' => 200, 'message' => 'Berhasil mengedit foto di galeri']);
        } catch (Exception $error) {
            DB::rollBack();
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', ['status' => $error->getCode(), 'message' => 'Gagal mengedit foto di galeri, silakan coba lagi']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::find($id);
            $gallery->delete();

            $this->logAction('Menghapus foto di galeri');

            return redirect()->back()->with('response', [
                'status' => 200,
                'message' => 'Berhasil menghapus foto di galeri'
            ]);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', [
                'status' => $error->getCode(),
                'message' => 'Gagal menghapus foto di galeri, silakan coba lagi'
            ]);
        }
    }
}
