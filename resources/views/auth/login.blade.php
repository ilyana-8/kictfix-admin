@extends('layouts.blank')
@section('title', 'Login')

@section('content')
<section class="vh-100 d-flex">
    <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card border-0 rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-5 left-column">
                            <div class="text-center">
                                <img src="{{ asset('img/KICTFix-logo.png') }}" alt="KICTFix Logo">
                            </div>
                        </div>
                        <div class="col-md-7 right-column">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-12">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @endif

                                        @if (Session::has('error'))
                                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                        @endif

                                        <div class="mb-5">
                                            <h4 class="text-center">Admin Login</h4>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com">
                                                <label for="email" class="form-label">Email</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-1">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                                <label for="password" class="form-label">Password</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="checkbox mb-1">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card p-3 p-md-5 my-5 bg-white">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center">
                        <img src="{{ asset('img/KICTFix-logo.png') }}" alt="KICTFix Logo" class="mb-5" style="width: 180px;">
                        <h3 class="mb-3 fw-semibold">Admin Login</h3>
                    </div>

                    <div class="form-floating mb-2">
                        <input id="email" type="email" class="form-control bg-light @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                        <label for="floatingInput">Email Address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control bg-light @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="checkbox mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection
