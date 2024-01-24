@extends('layouts.app')

@section('title', 'Login')

@section('page-title', 'Login')

@section('content')
    <div class="d-flex min-vh-100 flex-column justify-content-center py-4 px-4 px-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">

                    @if (Session::get('success'))
                        <div class="alert alert-success" id="alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <h2 class="text-center text-lg font-weight-bold mb-4">Sign in to your account</h2>

                    @error('email')
                        <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <li class="list-unstyled">{{ $message }}</li>
                                </ul>
                        </div>
                    @enderror
                    <form class="mt-4" action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </form>

                    <p class="text-center mt-4 text-muted">Don't have a account? <a href="{{ route('auth.create') }}" class="text-decoration-none text-primary">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
