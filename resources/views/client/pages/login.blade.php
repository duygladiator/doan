@extends('client.layout.master');

<section class="blog spad">
  <div class="container">
    <div class="row justify-content-center">
      <h2>LOGIN</h2>
    </div>
    <div class="row justify-content-center">
      @auth
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault().document.getElementById('logout').submit();">LOGOUT</a>
        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none">
          @csrf
        </form>
      @endauth
    </div>

  </div>
  @guest
    <form class="align-middle" method="POST" action="{{ route('user.login') }}">
      @csrf
      <div class="col-md-4 align-self-center">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  @endguest
</section>




{{-- <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          @csrf
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">Sign in</h3>
            @auth
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault().document.getElementById('logout').submit();">
                LOG OUT
              </a>
              <form id="logout" action="{{ route('logout') }}" method="POS" style="display: none">
                @csrf
              </form>
            @endauth
            @guest

              <div class="form-outline mb-4">
                <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                <label class="form-check-label" for="form1Example3"> Remember password </label>
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

              <hr class="my-4">

              <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i
                  class="fab fa-google me-2"></i> Sign in with google</button>
              <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit"><i
                  class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>
            @endguest


          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
