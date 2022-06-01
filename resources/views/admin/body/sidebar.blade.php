<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('backend/assets/images/logo.svg" alt="logo') }}" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('backend/assets/images/logo-mini.svg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('backend/assets/images/faces/face15.jpg') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name}}</h5>
              <span>{{ Auth::user()->email}}</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="/">
          <span class="menu-icon">
            <i class="mdi mdi-web"></i>
          </span>
          <span class="menu-title">Website</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-home"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
{{-- Categories area --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">
                <span class="menu-icon"><i class="mdi mdi-format-list-bulleted-type"></i></span>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories') }}">Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subcategories') }}">Sub-categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('deleted') }}">Deleted categories</a></li>
                </ul>
            </div>
        </li>
{{-- Disctric area --}}
    <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#district" aria-expanded="false" aria-controls="district">
            <span class="menu-icon"><i class="mdi mdi-security"></i></span>
            <span class="menu-title">Disctric</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="district">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('district') }}">Disctric</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('subdistrict') }}">Sub disctric</a></li>
            </ul>
        </div>
    </li>

  {{-- Post area --}}
<li class="nav-item menu-items">
    <a class="nav-link" data-toggle="collapse" href="#post" aria-expanded="false" aria-controls="post">
      <span class="menu-icon">
        <i class="mdi mdi-security"></i>
      </span>
      <span class="menu-title">Posts</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="post">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{ route('create.post') }}">Add post</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('all.post') }}">All posts</a></li>
      </ul>
    </div>
  </li>

    <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="setting">
                <span class="menu-icon"><i class="mdi mdi-security"></i></span>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('social.settings') }}">Social links</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('seo.settings') }}">SEO settings</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('coffee.settings') }}">Coffee timer</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('livetv.settings') }}">Live TV</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('headline.settings') }}">Headline</a></li>

                </ul>
            </div>
    </li>

    <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#websites" aria-expanded="false" aria-controls="websites">
            <span class="menu-icon"><i class="mdi mdi-security"></i></span>
            <span class="menu-title">Websites</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="websites">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('websites') }}">All websites</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('create.website') }}">Add website</a></li>
            </ul>
        </div>
    </li>

    <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
            <span class="menu-icon"><i class="mdi mdi-security"></i></span>
            <span class="menu-title">Galleries</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="gallery">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('photo.gallery') }}">Photo gallery</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('video.gallery') }}">Video gallery</a></li>
            </ul>
        </div>
    </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/icons/mdi.html">
          <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
          </span>
          <span class="menu-title">Icons</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
