<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Traits\Action;
use App\Traits\Upload;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use Action, Upload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('backend.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        DB::beginTransaction();
        try {
            $blog = new Blog();
            $blog->user_id = auth()->user()->id;
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->content = $request->content;
            $blog->is_public = !!$request->is_public;
    
            $filename = $this->resizeAndSave($request->thumbnail_base64, 600, 400);
            if ($filename) {
                $blog->thumbnail_url = $filename;
                $blog->save();
            }

            $photos = $request->photos_base64;
            if ($photos) {
                foreach ($photos as $photo) {
                    $photoName = $this->saveFile($photo);
                    $blog->photos()->create(['photo_url' => $photoName]);
                }
            }

            $this->logAction('Membuat blog "'.$request->title.'"');

            DB::commit();
    
            return redirect()->route('admin.blog.index')->with('response', [
                'status' => 200,
                'message' => 'Berhasil membuat blog'
            ]);
        } catch (Exception $error) {
            DB::rollBack();
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', [
                'status' => $error->getCode(),
                'message' => 'Gagal membuat blog, silakan coba lagi'
            ]);
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
        $blog = Blog::find($id);
        return view('backend.pages.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->content = $request->content;
            $blog->is_public = !!$request->is_public;

            $thumbnail = $request->thumbnail_base64;
            if ($thumbnail) {
                $filename = $this->resizeAndSave($thumbnail, 600, 400, $blog->thumbnail_url);
                if ($filename) {
                    $blog->thumbnail_url = $filename;
                }
            }

            $blog->save();

            $photos = $request->photos_base64;
            if ($photos) {
                $blog->photos()->delete();
                foreach ($photos as $photo) {
                    $photoName = $this->saveFile($photo);
                    $blog->photos()->create(['photo_url' => $photoName]);
                }
            }

            $this->logAction('Mengedit blog "'.$request->title.'"');

            DB::commit();
            
            return redirect()->back()->with('response', [
                'status' => 200,
                'message' => 'Berhasil mengedit blog'
            ]);
        } catch (Exception $error) {
            DB::rollBack();
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', [
                'status' => $error->getCode(),
                'message' => 'Gagal mengedit blog, silakan coba lagi'
            ]);
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
            $blog = Blog::find($id);
            $title = $blog->title;

            $blog->delete();

            $this->logAction('Menghapus blog "'.$title.'"');

            return redirect()->back()->with('response', [
                'status' => 200,
                'message' => 'Berhasil menghapus blog'
            ]);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', [
                'status' => $error->getCode(),
                'message' => 'Gagal menghapus blog, silakan coba lagi'
            ]);
        }
    }
}
