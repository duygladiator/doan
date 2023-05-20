<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sidebar.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<div class="sidebar">
  <div class="side-navi">
    <a href="{{ route('home') }}"
      class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img src="{{ asset('insta-logo.png') }}" alt="">
    </a>

    <div class="container">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item {{ request()->route()->getName() === 'home'? 'active': '' }}">
          <a href="{{ route('client.home') }}" class="nav-link" aria-current="page">
            <img class="svg" src="{{ asset('assets/home-icon.svg') }}" alt="">
            Home
          </a>
        </li>
        <li class="{{ request()->route()->getName() === 'search'? 'active': '' }}">
          {{-- <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
        aria-expanded="false" aria-controls="collapseWidthExample">
        Search
      </button> --}}
          <a href="#" class="nav-link link-dark search" data-bs-toggle="collapse" data-bs-target="#search"
            aria-expanded="false" aria-controls="search" onClick="search()">
            <img class="svg" src="{{ asset('assets/search.svg') }}" alt="">
            Search
          </a>
          <div id="search-sidebar" class="search-sidebar" style="hidden">
            <div class="collapse collapse-horizontal" id="search">
              <div class="card card-body" style="width: 300px;">
                This is some placeholder content for a horizontal collapse. It's hidden by default and shown when
                triggered.
              </div>
            </div>
          </div>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <img class="svg" src="{{ asset('assets/explore.svg') }}" alt="">
            Explore
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <img class="svg" src="{{ asset('assets/reels.svg') }}" alt="">
            Reels
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <img class="svg" src="{{ asset('assets/messages.svg') }}" alt="">
            Messages
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <img class="svg" src="{{ asset('assets/noti.svg') }}" alt="">
            Notifications
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <img class="svg" src="{{ asset('assets/create.svg') }}" alt="">
            Create
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <img class="svg rounded-circle" src="{{ asset('user-placeholder.png') }}" alt="">
            Profile
          </a>
        </li>
      </ul>
    </div>

    <div class="menu">
      <div id="menu" class="d-flex align-items-center link-dark text-decoration-none" data-bs-toggle="dropdown"
        aria-expanded="false">
        <img class="svg pr-3" src="{{ asset('assets/menu.svg') }}" alt="">
        More
      </div>
      <div class="dropdown-menu" aria-labelledby="dropdownUser2">
        <li>
          <a class="dropdown-item" href="#">Settings</a>
          <img class="svg1" src="{{ asset('assets/chevron-right.svg') }}" alt="">
        </li>
        <li>
          <a class="dropdown-item" href="#">Your activity</a>
          <img class="svg1" src="{{ asset('assets/chevron-right.svg') }}" alt="">
        </li>
        <li>
          <a class="dropdown-item" href="#">Saved</a>
          <img class="svg1" src="{{ asset('assets/chevron-right.svg') }}" alt="">
        </li>
        <li>
          <a class="dropdown-item" href="#">Switch appearnce</a>
          <img class="svg1" src="{{ asset('assets/chevron-right.svg') }}" alt="">
        </li>
        <li>
          <a class="dropdown-item" href="#">Report a Problem</a>
          <img class="svg1" src="{{ asset('assets/chevron-right.svg') }}" alt="">
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item" href="#">Switch account</a>
          <img class="svg1" src="{{ asset('assets/chevron-right.svg') }}" alt="">
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <div class="">
          <ul class="navbar-nav ms-auto">
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">
                    {{ __('Login') }}
                  </a>
                </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}
                  </a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  function search() {
    document.getElementById("search-sidebar")
  }
</script>
