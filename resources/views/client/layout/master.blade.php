<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('ico.ico') }}">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
</head>

<body>
  <!-- Header Section Begin -->
  {{-- @include('client.blocks.header') --}}
  <!-- Header Section End -->

  {{-- <div class="container">
    <div class="row">
      <div class="col-3">
        <!-- Page Preloder -->
        <div id="preloder">
          <div class="loader"></div>
        </div>
        @include('client.blocks.sidebar')
        <!-- Humberger Begin -->
        @include('client.blocks.humberger')
        <!-- Humberger End -->
      </div>
      <div class="col-9"> @yield('content')</div>
    </div>
  </div> --}}

  <div class="row">
    <div class="col-3">
      <div id="preloder">
        <div class="loader"></div>
      </div>
      @include('client.blocks.sidebar')

    </div>
    <div class="col-9"> @yield('content')</div>
  </div>




  <!-- Footer Section Begin -->
  {{-- @include('client.blocks.footer') --}}
  <!-- Footer Section End -->

  <!-- Js Plugins -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
  <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  @yield('js-custom')

</body>

</html>
