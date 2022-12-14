@extends('frontend.layouts.index')

@section('content')
<!--// Hero Section Start //-->
<section class="hero-banner bg-overlay" id="home" data-bg-image-path="{{ asset('storage/uploads/'.$setting['header_background_url']) }}">
    <div id="heroparticles"></div>
    <div class="container h-100">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-xl-6 col-md-10">
                <div class="hero-inner text-center">
                    <h1>Kampung Ketupat</h1>
                    <h2>Kampung dengan keunikan masyarakatnya yang mempunyai kebiasaan membuat ketupat</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Hero Section End //-->

{{-- Location Section Start --}}
<section class="section" id="lokasi">
    <div class="container">
        <h2 class="mb-5 text-center">Lokasi</h2>
        <div class="custom-card">
            <iframe src="{{ $setting['location'] }}" class="rounded w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
{{-- Location Section End --}}

<!--// Dukungan Section Start //-->
<section class="section bg-light-grey" id="dukungan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Didukung Oleh</h2>
                </div>
            </div>
        </div>
        @if (!$collaborations->isEmpty())
        <div class="dukungan-carousel owl-carousel owl-theme mb-20">
            @foreach ($collaborations as $collaboration)
            <div class="item">
                <img src="{{ $collaboration->logo }}" alt="{{ $collaboration->name }}" class="img-fluid h-100">
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center">Belum ada pihak kerja sama</p>
        @endif
    </div>
</section>
<!--// Dukungan Section End //-->

<!--// Galeri Section Start //-->
<section class="section" id="galeri">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Galeri</h2>
                </div>
            </div>
        </div>
        @if (!$recentGalleries->isEmpty())
        <div class="gallery-carousel owl-carousel owl-theme mb-20">
            @foreach ($recentGalleries as $gallery)
            <div class="item">
                <a href="{{ $gallery->photo }}" class="d-flex justify-content-center" data-lightbox="galeri" data-title="{{ $gallery->description }}">
                    <img src="{{ $gallery->photo }}" alt="Gallery" class="img-fluid h-[200px] shadow-sm rounded-sm">
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('galeri.index') }}" class="primary-btn">Lihat Selengkapnya</a>
            </div>
        </div>
        @else
        <p class="text-center">Belum ada foto di galeri</p>
        @endif
    </div>
</section>
<!--// Galeri Section End //-->

<!--// Blogs Section Start //-->
<section class="section" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2><span>Blog </span> Terbaru</h2>
                    <h4>
                        Berita seputar acara, kunjungan, dan kegiatan di kampung ketupat.
                    </h4>
                </div>
            </div>
        </div>
        @if (!$recentBlogs->isEmpty())
        <div class="row justify-content-center mb-20">
            @foreach ($recentBlogs as $blog)
            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column">
                <div class="blog-item flex-1">
                    <div class="img">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <img src="{{ $blog->medium_thumbnail }}" alt="Blog image" class="img-fluid" />
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
                        <h2 class="mb-0" style="text-overflow: ellipsis; overflow: hidden;">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h2>
                        {{-- <p>
                            {!! $blog->short_content !!}
                        </p> --}}
                        {{-- <a href="{{ route('blog.show', $blog->slug) }}" title="Read More" class="blog-button">Baca <i class="fa fa-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('blog.index') }}" class="primary-btn">Lihat Selengkapnya</a>
            </div>
        </div>
        @else
        <p class="text-center">Belum ada pihak kerja sama</p>
        @endif
    </div>
</section>
<!--// Blogs Section End //-->

<!--// Testimonials Section Start //-->
<section class="section" id="ulasan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Pendapat tentang <span>Kampung Ketupat</span>?</h2>
                    <h4>
                        Apa yang dikatakan masyarakat tentang kampung ketupat.
                    </h4>
                </div>
            </div>
        </div>
        @if (!$reviews->isEmpty())
        <div class="testimonials-carousel owl-carousel owl-theme mb-20">
            @foreach ($reviews as $review)
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
        @else
        <p class="text-center mb-5">Belum ada ulasan</p>
        @endif
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('ulasan.index') }}" class="primary-btn">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
<!--// Testimonials Section End //-->

<!--// FAQ Section Start //-->
@if (!$faqs->isEmpty())
<section class="section" id="faq-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>FAQ</h2>
                    <h4>
                        Beberapa pertanyaan yang pernah diajukan.
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($faqs as $faq)
            <div class="col-12 mb-4">
                <div class="accordion-item">
                    <div class="accordion-item-header" id="{{ 'accordionHeading'.$loop->index }}">
                        <a href="#" data-toggle="collapse" data-target="#{{ 'accordionItemOne'.$loop->index }}" aria-expanded="false" aria-controls="{{ 'accordionItemOne'.$loop->index }}">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-question"></i>
                                <span class="text-center text-md-left">{{ $faq->question }}</span>
                            </div>
                        </a>
                    </div>
                    <div id="{{ 'accordionItemOne'.$loop->index }}" class="collapse" aria-labelledby="{{ 'accordionHeading'.$loop->index }}">
                        <div class="accordion-body">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--// FAQ Section End //-->
@endif
@endsection