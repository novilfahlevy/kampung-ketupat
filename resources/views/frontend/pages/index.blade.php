@extends('frontend.layouts.index')

@section('content')
<!--// Hero Section Start //-->
<section class="hero-banner bg-overlay" id="home" data-bg-image-path="{{ asset('storage/img/header.png') }}">
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.652932174733!2d117.15012201542001!3d-0.5216927354187605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f93fc6a90bb%3A0x6b206598b103ec0c!2sKampung%20Ketupat!5e0!3m2!1sid!2sid!4v1659330964343!5m2!1sid!2sid" class="rounded w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
{{-- Location Section End --}}

<!--// Kerjasama Section Start //-->
<section class="section bg-light-grey" id="kerjasama">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Kerjasama</h2>
                    <h4>Pihak yang pernah bekerja sama dan mengadakan kegiatan di Kampung Ketupat</h4>
                </div>
            </div>
        </div>
        <div class="kerjasama-carousel owl-carousel owl-theme mb-20">
            <div class="item">
                <img src="{{ asset('storage/img/team/team-img-1.png') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/team/team-img-2.png') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/team/team-img-3.png') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/team/team-img-4.png') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
        </div>
    </div>
</section>
<!--// Kerjasama Section End //-->

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
        <div class="gallery-carousel owl-carousel owl-theme mb-20">
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-1.jpg') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-2.jpg') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-3.jpg') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-4.jpg') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-5.jpg') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-7.png') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-8.png') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
            <div class="item">
                <img src="{{ asset('storage/img/kunjungan/junjungan-9.png') }}" alt="Screenshots image" class="img-fluid h-100">
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('galeri.index') }}" class="primary-btn">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
<!--// Galeri Section End //-->

<!--// Blogs Section Start //-->
<section class="section bg-light-grey" id="blog">
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
        <div class="row justify-content-center mb-20">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="img">
                        <a href="blog-single.html">
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
                        <a href="blog-single.html" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="img">
                        <a href="blog-single.html">
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
                        <a href="blog-single.html" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="img">
                        <a href="blog-single.html">
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
                        <a href="blog-single.html" title="Read More" class="blog-button">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('blog.index') }}" class="primary-btn">Lihat Selengkapnya</a>
            </div>
        </div>
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
        <div class="testimonials-carousel owl-carousel owl-theme mb-20">
            <div class="item">
                <div class="testimonial-item">
                    <div class="body">
                        <h6>
                            Marvin Pasaribu
                        </h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>
                            Lokasi di mangkupalas, samarinda. Berada di pinggir sungai mahakam dengan view jembatan mahkota 2, sungai mahakam dan rumah2 dipinggir sungai. Cukup ramai didatangi orang2 pada pagi & sore hari untuk jalan2 dan berfoto dengan keluarga. Juga termasuk jalur track bersepeda keliling samarinda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <button type="button" class="primary-btn" id="reviewFormButton">Tulis Ulasan</button>
            </div>
        </div>
    </div>
</section>
<!--// Testimonials Section End //-->

<!--// FAQ Section Start //-->
<section class="section bg-light-grey" id="faq-area">
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
            <div class="col-12 mb-4">
                <div class="accordion-item">
                    <div class="accordion-item-header" id="accordionHeadingOne">
                        <a href="#" data-toggle="collapse" data-target="#accordionItemOne" aria-expanded="false" aria-controls="accordionItemOne">
                            <i class="fas fa-question"></i>
                            <span>Apa saja yang tersedia di kampung ketupat?</span>
                        </a>
                    </div>
                    <div id="accordionItemOne" class="collapse" aria-labelledby="accordionHeadingOne">
                        <div class="accordion-body">
                            <p>
                                Selain ciri khas ketupatnya, terdapat spot yang bagus untuk berfoto dan beberapa makanan tradisional yang tersedia, juga ada acara yang diadakan guna meramaikan kampung ketupat, bahkan di hari minggu terdapat hiburan musik dan permainan tradisional.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="accordion-item">
                    <div class="accordion-item-header" id="accordionHeaderTwo">
                        <a href="#" data-toggle="collapse" data-target="#accordionItemTwo" aria-expanded="false" aria-controls="accordionItemTwo">
                            <i class="fas fa-question"></i>
                            <span>Bagaimana sejarah kampung ketupat?</span>
                        </a>
                    </div>
                    <div id="accordionItemTwo" class="collapse" aria-labelledby="accordionHeaderTwo">
                        <div class="accordion-body">
                            <p>
                                Dinamai kampung ketupat karena keunikan masyarakatnya yang mempunyai kebiasaan membuat ketupat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="accordion-item">
                    <div class="accordion-item-header" id="accordionHeaderThree">
                        <a href="#" data-toggle="collapse" data-target="#accordionItemThree" aria-expanded="false" aria-controls="accordionItemThree">
                            <i class="fas fa-question"></i>
                            <span>Apakah pihak luar bisa bekerjasama untuk membuat suatu acara atau lainnya?</span>
                        </a>
                    </div>
                    <div id="accordionItemThree" class="collapse" aria-labelledby="accordionHeaderThree">
                        <div class="accordion-body">
                            <p>
                                Sudah banyak pihak-pihak yang bekerjasama dengan kampung ketupat, seperti ada yang ingin membuat acara dan juga banyak mahasiswa-mahasiswa yang melakukan kegiatan KKN, PKM, dan pengabdian masyarakat yang membuat fasilitas di kampung ketupat menjadi lebih bervariasi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// FAQ Section End //-->
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
                <form action="">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                                <i class="fa fa-star select-none cursor-pointer star"></i>
                            </div>
                            <input type="hidden" name="stars" id="stars">
                        </div>
                        <div class="col-12">
                            <div class="custom-form-group">
                                <input type="text" class="custom-form-control" name="name" placeholder="Nama *">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="custom-form-group">
                                <input type="email" class="custom-form-control" name="email" placeholder="Email *">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="custom-form-group">
                                <textarea class="custom-form-control" name="review" id="review" placeholder="Ulasan *" cols="30" rows="10"></textarea>
                                <span class="fa fa-comment"></span>
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