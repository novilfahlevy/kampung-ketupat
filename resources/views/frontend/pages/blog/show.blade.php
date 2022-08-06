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
							<a href="{{ route('blog.index') }}">
								Blog
							</a>
						</li>
						<li class="active">
							Slug
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--// Breadcrumb Section end //-->

<!--// Blog Single Section Start //-->
<section class="section padding-minus-10" id="blogSingleSection">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8 col-lg-6">
				<div class="blog-post-single">
					<div class="blog-post-img">
						<img src="{{ $blog->thumbnail }}" alt="Blog Post Image" class="img-fluid">
					</div>
					<div class="blog-text">
						<h4>{{ $blog->title }}</h4>
						<div class="author-meta">
							<a href="#"><span class="far fa-calendar-alt"></span>{{ $blog->created_at->translatedFormat('d F Y') }}</a>
							<a href="#"><span class="far fa-user"></span>Diunggah oleh {{ $blog->username }}</a>
						</div>
						{!! $blog->content !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--// Blog Single Section End //-->
@endsection