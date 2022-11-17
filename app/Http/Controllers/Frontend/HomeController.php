<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Collaboration;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        Visitor::create(['ip' => request()->ip()]);

        $collaborations = Collaboration::all();
        $recentGalleries = Gallery::recent()->photo()->landscape()->get();
        $recentBlogs = Blog::public()->recent()->get();
        $reviews = Review::public()->fiveStars()->take(10)->get();
        $faqs = Faq::all();

        return view('frontend.pages.index', compact('collaborations', 'recentGalleries', 'recentBlogs', 'reviews', 'faqs'));
    }
}
