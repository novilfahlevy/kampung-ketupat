@extends('frontend.layouts.index')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section" data-bg-image-path="{{ asset('storage/img/bg/bg-grid.jpg') }}">
    <div id="heroparticles"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>Kumpulan blog Kampung Ketupat</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="active">
                            Blog
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section end //-->

<!--// Blog Grid Section Start //-->
<section class="section" id="blogGridSection">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
				<div class="blog-sidebar">
					<div class="blog-widgets">
						<form action="{{ route('blog.index') }}" method="GET">
							<div class="blog-search-bar position-relative">
								<input type="text" name="keyword" placeholder="Cari..." value="{{ request()->query->get('keyword') }}" class="search-form-control">
								<button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
            @forelse ($blogs as $blog)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="img">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <img src="{{ $blog->thumbnail }}" alt="Blog image" class="img-fluid" />
                        </a>
                    </div>
                    <div class="body">
                        <div class="meta">
                            <a href="#">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ $blog->created_at->translatedFormat('d F Y') }}</span>
                            </a>
                            <a href="#">
                                <i class="far fa-user"></i>
                                <span>{{ $blog->username }}</span>
                            </a>
                        </div>
                        <h2>
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h2>
                        <p>
                            {!! $blog->short_content !!}
                        </p>
                        <a href="{{ route('blog.show', $blog->slug) }}" title="Read More" class="blog-button">Lanjut
                            baca <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 py-5">
                <p class="text-center">Belum ada blog</p>
            </div>
            @endforelse
			<div class="col-12">
				{{ $blogs->links('frontend.pages.blog.pagination') }}
			</div>
        </div>
    </div>
    <!--// .pagination-wrap //-->
    </div>
</section>
<!--// Blog Grid Section End //-->
@endsection
