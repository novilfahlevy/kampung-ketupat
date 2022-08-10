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
                  <!-- Histats.com  START (html only)-->
                  <a href="/" alt="page hit counter" target="_blank" >
                    <embed src="//s10.histats.com/437.swf"  flashvars="jver=1&acsid=4687670&domi=4"  quality="high"  width="112" height="75" name="437.swf"  align="middle" type="application/x-shockwave-flash" pluginspage="//www.macromedia.com/go/getflashplayer" wmode="transparent" />
                  </a>
                  <img  src="//sstatic1.histats.com/0.gif?4687670&101" alt="" border="0">
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