@extends('layouts.guest')

@section('main')

<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class="text-danger">401</h1>
            <h3 class="text-uppercase">Not authorized !</h3>
            <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME, PLEASE LOGIN FIRST</p>
            <a href="/" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Back to home to login</a> </div>
        <footer class="footer text-center">2017 © Ample Admin.</footer>
    </div>
</section>


@endsection