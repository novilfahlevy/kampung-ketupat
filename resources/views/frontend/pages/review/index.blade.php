@extends('frontend.layouts.index')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section" data-bg-image-path="{{ asset('storage/img/bg/bg-grid.jpg') }}">
	<div id="heroparticles"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="breadcrumb-inner">
					<h1>Kumpulan ulasan tentang Kampung Ketupat</h1>
					<ul class="breadcrumb-links">
						<li>
							<a href="{{ url('/') }}">
								<i class="fas fa-home"></i>
							</a>
						</li>
						<li class="active">
							Ulasan
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
		<div class="row justify-content-center align-items-start">
			<div class="col-12 mb-5">
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
							<button type="button" class="primary-btn" id="reviewFormButton">Tulis Ulasan</button>
					</div>
				</div>
			</div>
			@foreach ($reviews->chunk(ceil($reviews->count() / 3)) as $chunk)
			<div class="col-12 col-md-4 col-lg-3 col-xl-4">
				@foreach ($chunk as $review)
				<div class="item">
					<div class="testimonial-item">
							<div class="body">
									<h6>
											{{ $review->name }}
									</h6>
									<div class="rating">
											<i class="fa fa-star {{ $review->stars >= 1 ? 'text-warning' : 'text-secondary' }}"></i>
											<i class="fa fa-star {{ $review->stars >= 2 ? 'text-warning' : 'text-secondary' }}"></i>
											<i class="fa fa-star {{ $review->stars >= 3 ? 'text-warning' : 'text-secondary' }}"></i>
											<i class="fa fa-star {{ $review->stars >= 4 ? 'text-warning' : 'text-secondary' }}"></i>
											<i class="fa fa-star {{ $review->stars >= 5 ? 'text-warning' : 'text-secondary' }}"></i>
									</div>
									<p>
											{{ $review->review }}
									</p>
							</div>
					</div>
				</div>
				@endforeach
			</div>
			@endforeach
			<div class="col-12 d-flex justify-content-center mt-5">
				{{ $reviews->links('frontend.pagination') }}
			</div>
		</div>
	</div>
</section>
@endsection

@push('modal')
<!-- Review Modal Start -->
<div class="modal fade custom-modal" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header success">
                <h5 class="modal-title" id="reviewFormModalLabel">Tulis ulasan anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('send-review') }}" id="sendReviewForm" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div id="sendReviewAlert"></div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                            </div>
                            <p class="text-danger text-center error-message mt-2" id="starsErrorMessage"></p>
                            <input type="hidden" name="stars" id="stars">
                        </div>
                        <div class="col-12">
                            <div class="custom-form-group mb-3">
                                <input type="text" class="custom-form-control mb-2" name="name" id="name" placeholder="Nama *">
                                <span class="fa fa-user"></span>
                                <p class="text-danger error-message" id="nameErrorMessage"></p>
                            </div>
                            <div class="custom-form-group mb-3">
                                <input type="email" class="custom-form-control mb-2" name="email" id="email" placeholder="Email *">
                                <span class="fa fa-envelope"></span>
                                <p class="text-danger error-message" id="emailErrorMessage"></p>
                            </div>
                            <div class="custom-form-group mb-3">
                                <textarea class="custom-form-control mb-2" name="review" id="review" placeholder="Ulasan *" cols="30" rows="10"></textarea>
                                <span class="fa fa-comment"></span>
                                <p class="text-danger error-message" id="reviewErrorMessage"></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="primary-btn">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Review Modal End -->
@endpush