@extends('frontend.layouts.index')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section" data-bg-image-path="{{ asset('storage/img/bg/bg-grid.jpg') }}">
	<div id="heroparticles"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="breadcrumb-inner">
					<h1>Kumpulan galeri foto Kampung Ketupat</h1>
					<ul class="breadcrumb-links">
						<li>
							<a href="{{ url('/') }}">
								<i class="fas fa-home"></i>
							</a>
						</li>
						<li class="active">
							Galeri
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--// Breadcrumb Section end //-->

<section class="section" id="gallerySection">
	<div class="container">
		<div class="row">
			<div class="col-12"></div>
		</div>
	</div>
</section>
@endsection