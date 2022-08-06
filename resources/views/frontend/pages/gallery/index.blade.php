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
		<div class="row justify-content-center">
			@foreach ($galleries->chunk(3) as $chunk)
			<div class="col-12 col-md-4 col-lg-3 col-xl-4">
				@foreach ($chunk as $gallery)
				<a href="{{ $gallery->photo }}" data-title="{{ $gallery->description }}" data-lightbox="galeri" data-alt="Galeri">
					<img src="{{ $gallery->photo }}" class="w-full mb-3">
				</a>
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection