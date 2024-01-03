@extends('layouts.app')

@section('title', 'Login')

@section('page-title', 'Login')

@section('content')
    <div class="d-flex min-vh-100 flex-column justify-content-center py-4 px-4 px-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    <h2 class="text-center text-lg font-weight-bold mb-4">Create a new account</h2>

                    <form class="mt-4" action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                            @if($errors->has('first_name'))
                                <div class="col-12 text-center mt-2">
                                    <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('first_name') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                            @if($errors->has('last_name'))
                                <div class="col-12 text-center mt-2">
                                    <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('last_name') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            @if($errors->has('username'))
                                <div class="col-12 text-center mt-2">
                                    <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('username') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                            @if($errors->has('mobile'))
                                <div class="col-12 text-center mt-2">
                                    <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('mobile') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your best email address</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                            @if($errors->has('email'))
                                <div class="col-12 text-center mt-2">
                                    <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
                            @if($errors->has('password'))
                                <div class="col-12 text-center mt-2">
                                    <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('password') }}</span>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>

                    <p class="text-center mt-4 text-muted">Already have an account? <a href="{{ route('auth.index') }}" class="text-decoration-none text-primary">Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
