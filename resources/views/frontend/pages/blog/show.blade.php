@extends('frontend.layouts.index')

@section('content')
<!--// Blog Single Section Start //-->
<section class="section padding-minus-10" id="blogSingleSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="blog-post-single">
                    <div class="blog-post-img">
                        <img src="{{ $blog->big_thumbnail }}" alt="Blog Post Image" class="img-fluid">
                    </div>
                    <div class="blog-text">
                        <h4>{{ $blog->title }}</h4>
                        <div class="author-meta">
                            <a href="#"><span
                                    class="far fa-calendar-alt"></span>{{ $blog->created_at->translatedFormat('d F Y') }}</a>
                            <a href="#"><span class="far fa-user"></span>Diunggah oleh {{ $blog->username }}</a>
                        </div>
                        @if (!$blog->photos->isEmpty())
                        <div class="d-flex gap-2 mb-4">
                            @foreach ($blog->photos as $photo)
                            <a href="{{ $photo->photo }}" data-lightbox="photos">
                                <img src="{{ $photo->photo }}" class="w-[100px] h-[100px]" alt="{{ $blog->title }} photos">
                            </a>
                            @endforeach
                        </div>
                        @endif
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="blog-sidebar">
                    <div class="blog-widgets">
						<form action="{{ route('blog.index') }}" method="GET">
							<div class="blog-search-bar position-relative">
								<input type="text" name="keyword" placeholder="Cari..." value="{{ request()->query->get('keyword') }}" class="search-form-control">
								<button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
							</div>
						</form>
					</div>
                    <div class="blog-widgets">
                        <h5 class="inner-header-title">Blog Terbaru</h5>
                        @forelse ($recents as $recent)
                        <div class="recent-post-item clearfix">
                            <div class="recent-post-img mr-3">
                                <a href="{{ route('blog.show', $recent->slug) }}">
                                    <img class="img-fluid" src="{{ $recent->small_thumbnail }}" alt="{{ $recent->title }}">
                                </a>
                            </div>
                            <div class="recent-post-body">
                                <a href="{{ route('blog.show', $recent->slug) }}">
                                    <h6 class="recent-post-title" style="text-overflow: ellipsis; overflow: hidden;">{{ $recent->title }}</h6>
                                </a>
                                <p class="recent-post-date"><i class="far fa-calendar-alt"></i>{{ $recent->created_at->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-center">Belum ada blog terbaru</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Blog Single Section End //-->
@endsection
