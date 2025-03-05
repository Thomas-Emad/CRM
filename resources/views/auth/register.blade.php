@extends('layouts.guest')


@section('content')
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
        <div class="my-4 d-flex justify-content-center">
            <a href="index.html">
                <img src="{{ asset('assets/img/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
                <img src="{{ asset('assets/img/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
            </a>
        </div>
        <div class="card custom-card">
            <div class="card-body">
                <div class="authentication-cover">
                    <div class="aunthentication-cover-content">
                        <p class="h5 fw-bold mb-2 text-center">Sign Up</p>
                        <div class="text-center">
                            <p class="fs-14 text-muted mt-3">Already have an account? <a href="{{ route('login') }}"
                                    class="text-primary fw-semibold">Sign In Here</a></p>
                        </div>
                        <form action="{{ route('register') }}" method="POST" class="row gy-3">
                            @foreach ($errors->all() as $error)
                                <div class="col-xl-12">
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                </div>
                            @endforeach

                            @csrf
                            @method('POST')
                            <div class="col-xl-12">
                                <label for="signup-firstname" class="form-label text-default op=8">Your Name</label>
                                <input type="text" name="name" class="form-control form-control-lg"
                                    value="{{ old('name') }}" id="signup-firstname" placeholder="Your name">
                            </div>
                            <div class="col-xl-12">
                                <label for="signup-email" class="form-label text-default op=8">Email</label>
                                <input type="text" name="email" class="form-control form-control-lg"
                                    value="{{ old('email') }}" id="signup-email" placeholder="Your name">
                            </div>
                            <div class="col-xl-12">
                                <label for="signup-password" class="form-label text-default op=8">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="signup-password" placeholder="password">
                                </div>
                            </div>

                            <div class="col-xl-12 d-grid mt-2">
                                <button class="btn btn-lg btn-primary" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
