@extends('frontend.layouts.index')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section" data-bg-image-path="{{ asset('storage/img/bg/breadcrumb-img.png') }}">
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
			<div class="col-lg-4 col-md-6">
				<div class="blog-item">
					<div class="img">
						<a href="{{ route('blog.show', 1) }}">
							<img src="{{ asset('storage/img/blog/blog-img-1.jpg') }}" alt="Blog image" class="img-fluid" />
						</a>
					</div>
					<div class="body">
						<div class="meta">
							<a href="#">
								<i class="far fa-calendar-alt"></i>
								<span>19 July</span>
							</a>
							<a href="#">
								<i class="far fa-user"></i>
								<span>By Admin</span>
							</a>
						</div>
						<h2>
							<a href="#">How do I automatically update this Program ?</a>
						</h2>
						<p>
							It is a long established fact that a reader will be distracted by..
						</p>
						<a href="{{ route('blog.show', 1) }}" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="blog-item">
					<div class="img">
						<a href="{{ route('blog.show', 1) }}">
							<img src="{{ asset('storage/img/blog/blog-img-2.jpg') }}" alt="Blog image" class="img-fluid" />
						</a>
					</div>
					<div class="body">
						<div class="meta">
							<a href="#">
								<i class="far fa-calendar-alt"></i>
								<span>10 July</span>
							</a>
							<a href="#">
								<i class="far fa-user"></i>
								<span>By Admin</span>
							</a>
						</div>
						<h2>
							<a href="#">How to change password from admin panel?</a>
						</h2>
						<p>
							It is a long established fact that a reader will be distracted by..
						</p>
						<a href="{{ route('blog.show', 1) }}" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="blog-item">
					<div class="img">
						<a href="{{ route('blog.show', 1) }}">
							<img src="{{ asset('storage/img/blog/blog-img-3.jpg') }}" alt="Blog image" class="img-fluid" />
						</a>
					</div>
					<div class="body">
						<div class="meta">
							<a href="#">
								<i class="far fa-calendar-alt"></i>
								<span>17 Aqust</span>
							</a>
							<a href="#">
								<i class="far fa-user"></i>
								<span>By Admin</span>
							</a>
						</div>
						<h2>
							<a href="#">How to make a sketch drawing as an illustrator</a>
						</h2>
						<p>
							It is a long established fact that a reader will be distracted by..
						</p>
						<a href="{{ route('blog.show', 1) }}" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="blog-item">
					<div class="img">
						<a href="{{ route('blog.show', 1) }}">
							<img src="{{ asset('storage/img/blog/blog-img-4.jpg') }}" alt="Blog image" class="img-fluid" />
						</a>
					</div>
					<div class="body">
						<div class="meta">
							<a href="#">
								<i class="far fa-calendar-alt"></i>
								<span>11 April</span>
							</a>
							<a href="#">
								<i class="far fa-user"></i>
								<span>By Admin</span>
							</a>
						</div>
						<h2>
							<a href="#">I forgot my password, how to renew?</a>
						</h2>
						<p>
							It is a long established fact that a reader will be distracted by..
						</p>
						<a href="{{ route('blog.show', 1) }}" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="blog-item">
					<div class="img">
						<a href="{{ route('blog.show', 1) }}">
							<img src="{{ asset('storage/img/blog/blog-img-5.jpg') }}" alt="Blog image" class="img-fluid" />
						</a>
					</div>
					<div class="body">
						<div class="meta">
							<a href="#">
								<i class="far fa-calendar-alt"></i>
								<span>18 March</span>
							</a>
							<a href="#">
								<i class="far fa-user"></i>
								<span>By Admin</span>
							</a>
						</div>
						<h2>
							<a href="#">Find the most beautiful free psd uikit collections</a>
						</h2>
						<p>
							It is a long established fact that a reader will be distracted by..
						</p>
						<a href="{{ route('blog.show', 1) }}" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="blog-item">
					<div class="img">
						<a href="{{ route('blog.show', 1) }}">
							<img src="{{ asset('storage/img/blog/blog-img-4.jpg') }}" alt="Blog image" class="img-fluid" />
						</a>
					</div>
					<div class="body">
						<div class="meta">
							<a href="#">
								<i class="far fa-calendar-alt"></i>
								<span>17 Aqust</span>
							</a>
							<a href="#">
								<i class="far fa-user"></i>
								<span>By Admin</span>
							</a>
						</div>
						<h2>
							<a href="#">How to get advertising and make money on social media</a>
						</h2>
						<p>
							It is a long established fact that a reader will be distracted by..
						</p>
						<a href="{{ route('blog.show', 1) }}" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="pagination-wrap">
			<a href="#" class="pagination-link"><i class="fa fa-arrow-left"></i></a>
			<a href="#" class="pagination-link active">1</a>
			<a href="#" class="pagination-link">2</a>
			<a href="#" class="pagination-link">3</a>
			<a href="#" class="pagination-link"><i class="fa fa-arrow-right"></i></a>
		</div>
		<!--// .pagination-wrap //-->
	</div>
</section>
<!--// Blog Grid Section End //-->
@endsection