<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollaborationRequest;
use App\Http\Requests\UpdateCollaborationRequest;
use App\Models\Collaboration;
use App\Traits\Action;
use App\Traits\Upload;
use Exception;
use Illuminate\Http\Request;

class CollaborationController extends Controller
{
    use Action, Upload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collaborations = Collaboration::paginate(10);
        return view('backend.pages.collaborations.index', compact('collaborations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.collaborations.create');
    }

    private function resizeLogo($image)
    {
        $width = 200;
        $height = 200;
        $image->height() > $image->width() ? $width = null : $height = null;
        $image->resize($width, $height, fn ($constraint) => $constraint->aspectRatio());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollaborationRequest $request)
    {
        try {
            $collaboration = new Collaboration();
            $collaboration->name = $request->name;
    
            $filename = $this->saveAndModify($request->logo_base64, fn($image) => $this->resizeLogo($image));
            if ($filename) {
                $collaboration->logo_url = $filename;
                $collaboration->save();
            }

            $this->logAction('Membuat pihak kerjasama "'.$request->name.'"');

            return redirect()
                ->route('admin.kerjasama.index')
                ->with('response', ['status' => 200, 'message' => 'Berhasil menambah pihak kerjasama']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()
                ->back()
                ->with('response', ['status' => $error->getCode(), 'message' => 'Gagal menambah pihak kerjasama, silakan coba lagi']);
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
        $collaboration = Collaboration::find($id);
        return view('backend.pages.collaborations.edit', compact('collaboration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollaborationRequest $request, $id)
    {
        try {
            $collaboration = Collaboration::find($id);
            $collaboration->name = $request->name;
    
            if ($request->logo_base64) {
                $filename = $this->saveAndModify($request->logo_base64, fn($image) => $this->resizeLogo($image), $collaboration->logo_url);
                if ($filename) {
                    $collaboration->logo_url = $filename;
                }
            }

            $collaboration->save();

            $this->logAction('Mengedit pihak kerjasama "'.$request->name.'"');

            return redirect()
                ->route('admin.kerjasama.index')
                ->with('response', ['status' => 200, 'message' => 'Berhasil mengedit pihak kerjasama']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()
                ->back()
                ->with('response', ['status' => $error->getCode(), 'message' => 'Gagal mengedit pihak kerjasama, silakan coba lagi']);
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
            $collaboration = Collaboration::find($id);
            $name = $collaboration->name;

            $collaboration->delete();

            $this->logAction('Menghapus pihak "'.$name.'"');

            return redirect()->back()->with('alert', [
                'status' => 200,
                'message' => 'Berhasil menghapus pihak kerjasama'
            ]);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->back()->with('alert', [
                'status' => $error->getCode(),
                'message' => 'Gagal menghapus pihak kerjasama, silakan coba lagi'
            ]);
        }
    }
}
