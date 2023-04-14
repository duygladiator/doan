@extends('client.layout.master')

@section('title')
  cloneGram
@endsection

<link rel="stylesheet" href="{{ asset('assets/css/home-suggest.css') }}">

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-8">main</div>
      <div class="suggest col-4 d-inline">
        <div class="user">
          <a href="">
            <img class="user-icon" src="{{ asset('user-placeholder.png') }}" alt="">
          </a>
          <div class="pl-4">
            <a class="" href="">userId</a>
            <div class="">Name</div>
          </div>
          <div class="ml-auto">
            <button href="">Switch</button>
          </div>
        </div>

        <div class="sgg py-4 d-flex">
          <div>Suggestions for you</div>
          <button class="ml-auto">See All</button>
        </div>

        <div class="">
          <div class="user">
            <a href="">
              <img class="user-icon1" src="{{ asset('user-placeholder.png') }}" alt="">
            </a>
            <div class="pl-4">
              <a class="" href="">userId</a>
              <div class="">Followed by ...</div>
            </div>
            <div class="ml-auto">
              <button href="">Follow</button>
            </div>
          </div>
          <div class="user">
            <a href="">
              <img class="user-icon1" src="{{ asset('user-placeholder.png') }}" alt="">
            </a>
            <div class="pl-4">
              <a class="" href="">userId</a>
              <div class="">Followed by ...</div>
            </div>
            <div class="ml-auto">
              <button href="">Follow</button>
            </div>
          </div>
          <div class="user">
            <a href="">
              <img class="user-icon1" src="{{ asset('user-placeholder.png') }}" alt="">
            </a>
            <div class="pl-4">
              <a class="" href="">userId</a>
              <div class="">Followed by ...</div>
            </div>
            <div class="ml-auto">
              <button href="">Follow</button>
            </div>
          </div>
          <div class="user">
            <a href="">
              <img class="user-icon1" src="{{ asset('user-placeholder.png') }}" alt="">
            </a>
            <div class="pl-4">
              <a class="" href="">userId</a>
              <div class="">Followed by ...</div>
            </div>
            <div class="ml-auto">
              <button href="">Follow</button>
            </div>
          </div>
          <div class="user">
            <a href="">
              <img class="user-icon1" src="{{ asset('user-placeholder.png') }}" alt="">
            </a>
            <div class="pl-4">
              <a class="" href="">userId</a>
              <div class="">Followed by ...</div>
            </div>
            <div class="ml-auto">
              <button href="">Follow</button>
            </div>
          </div>
        </div>

        <div class="foot">
          <nav>
            <ul class="">
              <li><a href="">About</a></li>
              <li><a href="">Help</a></li>
              <li><a href="">Press</a></li>
              <li><a href="">API</a></li>
              <li><a href="">Jobs</a></li>
              <li><a href="">Privacy</a></li>
              <li><a href="">Terms</a></li>
              <li><a href="">Locations</a></li>
              <li><a href="">Language</a></li>
              <li><a href="">Clone Verified</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection
