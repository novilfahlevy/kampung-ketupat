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
		<div class="row">
			<div class="col-lg-8">
				<div class="blog-post-single">
					<div class="blog-post-img">
						<img src="{{ asset('storage/img/blog/blog-post-img.jpg') }}" alt="Blog Post Image" class="img-fluid">
					</div>
					<div class="blog-text">
						<h4>How to get advertising and make money on social media ?</h4>
						<div class="author-meta">
							<a href="#"><span class="far fa-calendar-alt"></span>17 Agustus 2022</a>
							<a href="#"><span class="far fa-user"></span>Diunggah oleh Admin</a>
						</div>
						<p>
							It is a long established fact that a reader will be distracted 
							by the readable content of a page when looking at its layout.
							The point of using Lorem Ipsum is that it has a more-or-less 
							normal distribution of letters, as opposed to using 'Content here, 
							content here', making it look like readable English. 
							Many desktop publishing packages and web page editors now use 
							Lorem Ipsum as their default model text, and a search for 'lorem ipsum' 
							will uncover many web sites still in their infancy. 
							Various versions have evolved over the years, sometimes 
							by accident, sometimes on purpose (injected humour and the like).
						</p>
						<blockquote>
							<q>
								The standard chunk of Lorem Ipsum used since the 1500s is reproduced 
								below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus 
								Bonorum et Malorum" by Cicero are also reproduced in their exact original 
								form, accompanied by English versions from the 1914 translation by H. Rackham.
							</q>
						</blockquote>
						<p>
							It is a long established fact that a reader will be distracted 
							by the readable content of a page when looking at its layout.
							The point of using Lorem Ipsum is that it has a more-or-less 
							normal distribution of letters, as opposed to using 'Content here,
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="blog-sidebar">
					<div class="blog-widgets">
						<h5 class="inner-header-title">Search</h5>
						<form action="blog-sidebar.html" method="get">
							<div class="blog-search-bar position-relative">
								<input type="text" name="sidebar_searchbar" required="" placeholder="Search Here *" class="search-form-control">
								<button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
							</div>
						</form>
					</div>
					<div class="blog-widgets">
						<h5 class="inner-header-title">Recent Post</h5>
						<div class="recent-post-item clearfix">
							<div class="recent-post-img mr-3">
								<a href="#">
									<img class="img-fluid" src="{{ asset('storage/img/blog/recent-blog-img-1.jpg') }}" alt="Recent Img">
								</a>
							</div>
							<div class="recent-post-body">
								<a href="blog-single.html">
									<h6 class="recent-post-title">How to make a sketch drawing as an illustrator</h6>
								</a>
								<p class="recent-post-date"><i class="far fa-calendar-alt"></i>17 Agust 2021</p>
							</div>
						</div>
						<div class="recent-post-item clearfix">
							<div class="recent-post-img mr-3">
								<a href="#">
									<img class="img-fluid" src="{{ asset('storage/img/blog/recent-blog-img-2.jpg') }}" alt="Recent Img">
								</a>
							</div>
							<div class="recent-post-body">
								<a href="blog-single.html">
									<h6 class="recent-post-title">How to change password from admin panel?</h6>
								</a>
								<p class="recent-post-date"><i class="far fa-calendar-alt"></i>10 July 2021</p>
							</div>
						</div>
						<div class="recent-post-item clearfix">
							<div class="recent-post-img mr-3">
								<a href="#">
									<img class="img-fluid" src="{{ asset('storage/img/blog/recent-blog-img-3.jpg') }}" alt="Recent Img">
								</a>
							</div>
							<div class="recent-post-body">
								<a href="blog-single.html">
									<h6 class="recent-post-title">Find the most beautiful free psd uikit collections</h6>
								</a>
								<span class="recent-post-date"><i class="far fa-calendar-alt"></i>18 March 2021</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--// Blog Single Section End //-->
@endsection