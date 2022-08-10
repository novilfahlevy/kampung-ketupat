<!--// Footer Start //-->
<footer class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 footer-widget-resp">
          <div class="footer-widget">
            <h6 class="footer-title">Tentang</h6>
            <p class="footer-desc">
              {{ $setting['about'] }}
            </p>
            <div class="footer-social-links">
              @isset ($setting['facebook'])
              <a href="{{ $setting['facebook'] }}">
                <i class="fab fa-facebook"></i>
              </a>
              @endisset
              @isset ($setting['youtube'])
              <a href="{{ $setting['youtube'] }}">
                <i class="fab fa-youtube"></i>
              </a>
              @endisset
              @isset ($setting['instagram'])
              <a href="{{ $setting['instagram'] }}">
                <i class="fab fa-instagram"></i>
              </a>
              @endisset
              @isset ($setting['twitter'])
              <a href="{{ $setting['twitter'] }}">
                <i class="fab fa-twitter"></i>
              </a>
              @endisset
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 footer-widget-resp">
          <div class="footer-widget">
            <h6 class="footer-title">Kontak</h6>
            <div class="footer-contact-info-wrap">
              <ul class="footer-contact-info-list">
                <li>
                  <h6>Alamat:</h6>
                  <p>{{ $setting['address'] }}</p>
                </li>
                <li>
                  <h6>Email & No Telp:</h6>
                  <div class="text">
                    <p>{{ $setting['email'] }}</p>
                    <p>{{ $setting['phone'] }}</p>
                  </div>
                </li>
                <li>
                  <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
                  <!-- Histats.com  START  (aync)-->
                  <script type="text/javascript">
                    var _Hasync= _Hasync|| [];
                    _Hasync.push(['Histats.start', '1,4687670,4,437,112,75,00011111']);
                    _Hasync.push(['Histats.fasi', '1']);
                    _Hasync.push(['Histats.track_hits', '']);
                    _Hasync.push(['Histats.framed_page', '']);
                    (function() {
                    var hs = document.createElement('script');
                    hs.type = 'text/javascript';
                    hs.async = true;
                    hs.src = ('//s10.histats.com/js15_as.js');
                    hs.style.display = 'none';
                    (document.getElementsByTagName('head')[0]).appendChild(hs);
                    })();
                  </script>
                  <noscript>
                    <a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4687670&101" alt="" border="0"></a>
                  </noscript>
                  <!-- Histats.com  END  -->
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright text-center">
    <div class="container">
      <p class="copyright-text">© Copyright 2021. Kampung Ketupat</p>
    </div>
  </div>
</footer>
<!--// Footer End //-->