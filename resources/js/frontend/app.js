/* -------------------------------------------------------------------
 * Theme Name            : HovyLee - App Landing Page
 * Author Name           : Yucel Yilmaz
 * Created Date          : 25 October 2021
 * Version               : 1.0
 * File                  : main.js
------------------------------------------------------------------- */
/* -------------------------------------------------------------------
   All Functions                               
   ------------------------ /
 * 01.Preloader
 * 02.Header
 * 03.Counter Up
 * 04.Owl Carousel
 * 05.Smooth Scroll
 * 06.Background Image
 * 07.Magnific Popup
 * 08.Contact Form
------------------------------------------------------------------- */

$( document ).ready( function() {
    // All Functions
    HovyLeePreLoader();
    HovyLeeHeader();
    HovyLeeCounterUp();
    HovyLeeCarousel();
    HovyLeeSmoothScroll();
    HovyLeeBgImgPath();
    HovyLeeMGFPopup();
    HovyLeeContactForm();
});

/* -------------------------------------------------------------------
 * 06.Background Image Path
------------------------------------------------------------------- */
function HovyLeePreLoader(){
    "use-scrict";

    // Variables
    let preloaderWrap = $( '#preloader-wrap' );
    let loaderInner = preloaderWrap.find( '.preloader-inner' );
 
    $( window ).ready(function(){
        loaderInner.fadeOut(); 
        preloaderWrap.delay(350).fadeOut( 'slow' );
    });   
}

/* -------------------------------------------------------------------
 * 02.Header
------------------------------------------------------------------- */
function HovyLeeHeader() {
    "use-strict";

    // Variables
    let header          = $( '.header' );
    let logoTransparent = $( '.logo-transparent' );
    let scrollTopBtn    = $( '.scroll-top-btn' );
    let logoNormal      = $( '.logo-normal' );
    let windowWidth     = $( window ).innerWidth();
    let scrollTop       = $( window ).scrollTop();
    let $dropdown       = $( '.dropdown' );
    let $dropdownToggle = $( '.dropdown-toggle' );
    let $dropdownMenu   = $( '.dropdown-menu' );
    let showClass       = 'show';

    $('body').scrollspy(
        { 
            target: '#fixedNavbar' 
        }
    );
    
    $( '.menu-link' ).on( 'click', function(){
        $( '#fixedNavbar' ).collapse( 'hide' );
    });

    // When Window On Scroll
    $( window ).on( 'scroll', function(){
        let scrollTop = $( this ).scrollTop();

        if( scrollTop > 85 ) {
            logoTransparent.hide();
            logoNormal.show();
            !header.hasClass('always-shrink') && header.addClass( 'header-shrink' );
            scrollTopBtn.addClass( 'active' );
        }else {
            logoTransparent.show();
            logoNormal.hide();
            !header.hasClass('always-shrink') && header.removeClass( 'header-shrink' );
            scrollTopBtn.removeClass( 'active' );
        }
    });

    // The same process is done without page scroll to prevent errors.
    if( scrollTop > 85 ) {
        logoTransparent.hide();
        logoNormal.show();
        !header.hasClass('always-shrink') && header.addClass( 'header-shrink' );
        scrollTopBtn.addClass( 'active' );
    }else {
        logoTransparent.show();
        logoNormal.hide();
        !header.hasClass('always-shrink') && header.removeClass( 'header-shrink' );
        scrollTopBtn.removeClass( 'active' );
    }

    // Window On Resize Hover Dropdown
    $( window ).on( 'resize', function() {
        let windowWidth  = $( this ).innerWidth();

        if ( windowWidth > 991 ) {
            $dropdown.hover(
                function() {
                    let hasShowClass  =  $( this ).hasClass( showClass );
                    if( hasShowClass!==true ){
                        $( this ).addClass( showClass );
                        $( this ).find( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                        $( this ).find( $dropdownMenu ).addClass( showClass );
                    }
                },
                function() {
                    $( this ).removeClass( showClass);
                    $( this ).find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                    $( this ).find( $dropdownMenu ).removeClass( showClass );
                }
            );
        }else {
            $dropdown.off( 'mouseenter mouseleave' );
            header.find( '.main-menu' ).collapse( 'hide' );
        }
    });
    // The same process is done without page scroll to prevent errors.
    if ( windowWidth > 991 ) {
        $dropdown.hover(
            function() {
                const $this = $( this );

                var hasShowClass  = $this.hasClass( showClass );

                if( hasShowClass!==true ){
                    $this.addClass( showClass);
                    $this.find ( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                    $this.find( $dropdownMenu ).addClass( showClass );
                }
            },
            function() {
                const $this = $( this );
                $this.removeClass( showClass );
                $this.find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                $this.find( $dropdownMenu ).removeClass( showClass );
            }
        );
    }else {
        $dropdown.off( 'mouseenter mouseleave' );
    }
}

/* -------------------------------------------------------------------
 * 03.Counter Up
------------------------------------------------------------------- */
function HovyLeeCounterUp() {
    "use-strict";

    // Variables
    let counterItem     = $( '.counter' );

    counterItem.counterUp({
        delay: 10,
        time: 1000
    });


    $(".nav-item a[href*='#']").on('click', function(event) {
      
        if (this.hash !== "" && $(this).data('scroll')) {
          event.preventDefault();
          var hash = this.hash;
    
          $('html, body').stop().animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
    
            window.location.hash = hash;
          });
        }
    });

    $(".scroll-btn").on('click', function(event) {
      
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
    
          $('html, body').stop().animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
    
            window.location.hash = hash;
          });
        }
    });
}

/* -------------------------------------------------------------------
 * 04.Owl Carousel
------------------------------------------------------------------- */
function HovyLeeCarousel(){

    "use-strict";

    // Variables
    let $testimonialsCarousel    = $( '.testimonials-carousel');
    let $galleryCarousel         = $( '.gallery-carousel');
    let $supportCarousel        = $( '.dukungan-carousel');

    const carouselConfig = {
        margin: 0,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768:{
                items:2
            },
            1000:{
                items:3
            }
        },
    }

    $supportCarousel.owlCarousel({
        ...carouselConfig,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 2000,
        slideTransition: 'linear',
        loop: true,
        center: true,
        margin: 0,
        nav: false,
        dots: false,
        autoWidth: true,
    });

    $galleryCarousel.owlCarousel({
        ...carouselConfig,
        loop: true,
        center: true,
        autoWidth: true,
        margin: 10,
    });
    
    $testimonialsCarousel.owlCarousel({
        ...carouselConfig,
        center: true,
        loop: true,
    });
}

/* -------------------------------------------------------------------
 * 05.Smooth Scroll
------------------------------------------------------------------- */
function HovyLeeSmoothScroll() {
    "use-strict";

    $("a[href^='#']").on('click', function(event) {
      
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
    
          $('html, body').stop().animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
    
            window.location.hash = hash;
          });
        }
    });
}

/* -------------------------------------------------------------------
 * 06.Background Image Path
------------------------------------------------------------------- */
function HovyLeeBgImgPath(){
    "use-scrict";

    // Variables
    let dataBgItem         = $( '*[data-bg-image-path]' );

    dataBgItem.each( function() {
        let imgPath        = $( this ).attr( 'data-bg-image-path' );
        $( this).css( 'background-image', 'url(' + imgPath + ')' );
    });
}

/* -------------------------------------------------------------------
 * 07.Magnific Popup
------------------------------------------------------------------- */
function HovyLeeMGFPopup(){
    "use-scrict";

    // Variables
    let youtubePopup = $( '.watch-video-btn' );

    youtubePopup.magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
}

/* -------------------------------------------------------------------
 * 08.Contact Form
------------------------------------------------------------------- */
function HovyLeeContactForm(){
    "use-scrict";
    let contactForm               = $( '#contactForm' );
    let formControl               = contactForm.find( '.custom-form-control' );

    // Added AutoComplete Attribute Turned Off
    formControl.attr("autocomplete","off");

    //  Captcha Variables    
    let contactFormCaptchaVal     = $("#contactFormCaptchaVal");
    let contactFormCaptchaSpan    = $('#contactFormCaptchaSpan');
    let contactFormCaptchaInput   = $('#contactFormCaptchaInput');

    // Generates the Random number function 
    function randomNumber(){
         
        let a = Math.ceil(Math.random() * 9) + '',
            b = Math.ceil(Math.random() * 9) + '',
            c = Math.ceil(Math.random() * 9) + '',
            d = Math.ceil(Math.random() * 9) + '',
            e = Math.ceil(Math.random() * 9) + '',
            code = a + b + c + d + e;
   
        contactFormCaptchaVal.val(code);
        contactFormCaptchaSpan.html(code);
    }

    // Called random number function
    randomNumber();

    // Validate the Entered input aganist the generated security code function   
    function validateCaptcha() {
        let str1 = contactFormCaptchaVal.val();
        let str2 = contactFormCaptchaInput.val();
        if (str1 == str2) {
            return true;
        } else {
            return false;
        }
    }
    // Contact Form Submit
    contactForm.on("submit", function(event) {
        // Form Variables
        let $this = $(this);
        let name = $( 'input[name*="contact_name"]' ).val().trim();
        let email = $( 'input[name*="contact_email"]' ).val().trim();
        let phone = $( 'input[name*="contact_phone"]' ).val().trim();
        let subject = $( 'input[name*="contact_subject"]' ).val().trim();
        let message = $( 'textarea[name*="contact_message"]' ).val().trim();
        let validateEmail = $( 'input[name*="contact_email"]' ).EmailValidate();
        let validatePhone = $( 'input[name*="contact_phone"]' ).PhoneValidate();

        if (name =='' || email =='' || phone == '' || message == '' || contactFormCaptchaInput == '' || subject == "") {
            if($('.contact-alerts .empty-form').css("display") == "none"){
                $('.contact-alerts .empty-form').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else if (!validatePhone === true) {
            if($('.contact-alerts .phone-invalid').css("display") == "none"){
                $('.contact-alerts .phone-invalid').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else if (!validateEmail === true) {
            if($('.contact-alerts .email-invalid').css("display") == "none"){
                $('.contact-alerts .email-invalid').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else if (validateCaptcha() != true){
            if($('.contact-alerts .security-alert').css("display") == "none"){
                $('.contact-alerts .security-alert').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else {
            $this.find(':submit').append('<span class="fas fa-spinner fa-pulse ml-3"></span>');
            $this.find(':submit').attr('disabled','true');
            $.ajax({
                url: 'phpmailer/send_mail.php',
                data: {
                    contact_name: name,
                    contact_email: email,
                    contact_phone: phone,
                    contact_subject: subject,
                    contact_message: message,
                },
                type: 'POST',
                success: function(response) {
                    $('#contactForm')[0].reset();
                    if (response == true) {
                        $this.find(':submit').removeAttr('disabled');
                        $this.find(':submit').find("span").fadeOut();
                        $("#contactFormSuccessModal").modal("show");
                        // Called random number function
                        randomNumber();
                    } else {
                        $this.find(':submit').removeAttr('disabled');
                        $this.find(':submit').find("span").fadeOut();
                        $("#contactFormDangerModal").modal("show");
                        $("#contactFormDangerModal #error_message").html(response);
                        // Called random number function
                        randomNumber();
                    }
                }
            });
        }
        event.preventDefault();
    });
}

/* -------------------------------------------------------------------
 * 09.Review Form
------------------------------------------------------------------- */
$('#reviewFormButton').click(function() {
    $('#reviewFormModal').modal('show');
});

$('#reviewFormModal').find('.star').click(function() {
    const $stars = $(this).parent().children();
    $stars.each((index, elem) => {
        if (index <= $stars.index(this)) {
            $(elem).addClass('text-warning');
        } else {
            $(elem).removeClass('text-warning');
        }
        $('#stars').val($stars.index(this) + 1);
    });
});

$('form#sendReviewForm').submit(function(event) {
    event.preventDefault();

    $(`#sendReviewAlert`).removeClass('alert alert-danger');
    $(`#sendReviewAlert`).removeClass('alert alert-success');
    $(`#sendReviewAlert`).text('');
    $('.error-message').hide();

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
        },
        data: {
            name: $(this).find('#name').val(),
            email: $(this).find('#email').val(),
            review: $(this).find('#review').val(),
            stars: $(this).find('#stars').val(),
        },
        dataType: 'json'
    })
    .then(response => {
        $(`#sendReviewAlert`).addClass('alert alert-success');
        $(`#sendReviewAlert`).text(response.message);
        setTimeout(() => window.location.reload(), 2000);
    })
    .catch(response => {
        if (response.status == 422) {
            Object.keys(response.responseJSON.errors).forEach(error => {
                $(`#${error}ErrorMessage`).show();
                $(`#${error}ErrorMessage`).text(response.responseJSON.errors[error][0]);
            });
        } else {
            $(`#sendReviewAlert`).addClass('alert alert-danger');
            $(`#sendReviewAlert`).text(response.responseJSON.message);
        }
    });
});