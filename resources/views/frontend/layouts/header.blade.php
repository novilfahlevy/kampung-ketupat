<!--// Header Start //-->
<header class="{{ 'header fixed-top p-3 p-lg-0' . (request()->routeIs('blog.show') ? ' always-shrink header-shrink' : '') }}" id="header">
  <div id="nav-menu-wrap">
      <div class="container">
          <nav class="navbar navbar-expand-lg p-0">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar" 
                  aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="togler-icon-inner">
                      <span class="line-1"></span>
                      <span class="line-2"></span>
                      <span class="line-3"></span>
                  </span>
              </button>
              <div class="collapse navbar-collapse main-menu justify-content-center" id="fixedNavbar">
                  @php
                      $isInGalleryPage = request()->routeIs('galeri.index') || request()->routeIs('galeri.show');
                      $isInBlogPage = request()->routeIs('blog.index') || request()->routeIs('blog.show');
                      $isInReviewPage = request()->routeIs('ulasan.index') || request()->routeIs('ulasan.show');
                      $isInsidePage = $isInGalleryPage || $isInBlogPage || $isInReviewPage;
                  @endphp
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/') : '#home' }}">
                              <i class="fas fa-home"></i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#lokasi') : '#lokasi' }}">Lokasi</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#dukungan') : '#dukungan' }}">Dukungan</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#galeri') : '#galeri' }}">Galeri</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#blog') : '#blog' }}">Blog</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#ulasan') : '#ulasan' }}">Ulasan</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#faq-area') : '#faq-area' }}">FAQ</a>
                      </li>
                  </ul>
              </div>
          </nav>
      </div>
  </div>
</header>
<!--// Header End  //-->