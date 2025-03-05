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
                    <form action="{{ route('login') }}" method="POST" class="aunthentication-cover-content">
                        @csrf
                        @method('POST')
                        <p class="h4 fw-bold mb-2 text-center">Sign in</p>
                        <div class="text-center">
                            <p class="fs-14 text-muted mt-3">Don't have an account yet? <a href="{{ route('register') }}"
                                    class="text-primary fw-semibold">Sign up here</a></p>
                        </div>
                        @foreach ($errors->all() as $error)
                            <div class="col-xl-12">
                                <div class="alert alert-danger mb-1" role="alert">
                                    {{ $error }}
                                </div>
                            </div>
                        @endforeach
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="signup-Email" class="form-label text-default op=8">Email
                                    address</label>
                                <input type="text" name="email" class="form-control form-control-lg" id="signup-Email"
                                    value="{{ old('email') }}" placeholder="Email">
                            </div>
                            <div class="col-xl-12">
                                <label class="form-label text-default d-block">password
                                    <a href="reset.html" class="float-end text-success">Forget password ?</a>
                                </label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="signup-password" placeholder="password">
                                </div>
                            </div>

                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
