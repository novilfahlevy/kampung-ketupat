<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Traits\Action;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use Action;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews = Review::query();

        if ($request->query->has('keyword')) {
            $reviews->keyword($request->query->get('keyword'));
        }

        $reviews = $reviews->orderBy('is_public')->orderByDesc('stars')->paginate(10);
        
        return view('backend.pages.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $review = Review::find($id);
        return view('backend.pages.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $review = Review::find($id);
            $review->is_public = !!$request->is_public;
            $review->save();

            $this->logAction('Mengedit ulasan');

            return redirect()->back()->with('response', ['status' => 200, 'message' => 'Berhasil mengedit ulasan']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', ['status' => $error->getCode(), 'message' => 'Gagal mengedit ulasan, silakan coba lagi']);
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
            $review = Review::find($id);
            $this->logAction('Menghapus ulasan');
            $review->delete();

            return back()->with('response', ['status' => 200, 'message' => 'Berhasil menghapus ulasan']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return back()->with('response', ['status' => $error->getCode(), 'message' => 'Gagal menghapus ulasan, silakan coba lagi']);
        }
    }
}
