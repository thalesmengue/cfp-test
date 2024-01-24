@extends('layouts.app')

@section('title', 'Create')

@section('page-title', 'Create')

@section('content')
        <div class="d-flex flex-column justify-content-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 px-5 py-5">
                        <h2 class="text-center text-lg font-weight-bold mb-4">Create a New User</h2>
                        <form class="mt-4" action="{{ route('users.store') }}" method="POST">
                            @csrf
                            @include('users._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
