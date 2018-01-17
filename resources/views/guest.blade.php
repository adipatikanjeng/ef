@extends('layouts.guest') @section('main')

<section id="wrapper" class="new-login-register">
  <div class="lg-info-panel">
    <div class="inner-panel">
      <div class="lg-content">
        <h2>THE ULTIMATE & MULTIPURPOSE ADMIN TEMPLATE OF 2017</h2>
        <p class="text-muted">with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different demos and many more... </p>
      </div>
    </div>
  </div>
  <div class="new-login-box">
      <a href="javascript:void(0)" class="p-20 di">
          <img src="/images/admin-logo.png" style="max-width:280px">
        </a>
    <div class="white-box">
      <h3 class="box-title m-b-0">Sign In to Admin</h3>
      <small>Enter your details below</small>
      <form class="form-horizontal new-lg-form" id="loginform" action="{{ route('auth.login') }}" method="POST">
          {{ csrf_field() }}
        <div class="form-group  m-t-20">
          <div class="col-xs-12">
            <label>Email Address</label>
            <input class="form-control" type="text" required="" placeholder="Email" name="email">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <label>Password</label>
            <input class="form-control" type="password" required="" placeholder="Password" name="password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-info pull-left p-t-0">
              <input id="checkbox-signup" name="remember" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            {{--  <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right">
              <i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>  --}}
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" value="Login">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>


</section>

@endsection