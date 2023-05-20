@extends('client.layout.master')

@section('title')
  cloneGram
@endsection

<link rel="stylesheet" href="{{ asset('assets/css/home-suggest.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/home-feed.css') }}">

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-8">
        <div class="carousel">
          <div class="feed">
            @foreach ($users as $user)
              <img class="user-icon" src="{{ asset('user-placeholder.png') }}" alt="">
              <div>{{ $user->name }}</div>
            @endforeach
          </div>
        </div>

        <div class="post justify-content-center">
          <div class="post-header d-flex">
            <div class="user">
              <div>
                <img class="post-user-avt" src="{{ asset('user-placeholder.png') }}" alt="">
              </div>
              <div class="post-user-name">user name</div>
            </div>
            <div class="opt">
              popup-opt
            </div>
          </div>
          <div class="post-body">

            <div class="card" style="width: 28rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                  content.</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
              </ul>
              <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

            <div class="post-carousel">
              post carousel
            </div>
            <div>
              <div class="post-like">like post</div>
              <div class="post-cmt">cmt post</div>
              <div class="post-share">share post</div>
            </div>
            <div class="post-total-like">total like</div>
            <div class="post-content">

            </div>
          </div>
        </div>
      </div>

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
