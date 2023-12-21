@extends('layouts.app')

@section('title', 'Home')

@section('page-title', 'Home')

@section('content')
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h2 mb-4">Users</h1>
                <p class="text-muted mb-4">Here stay the list of all the registered users</p>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
            </div>
        </div>

        <div class="mt-4">
            <div>
                <table class="table table-bordered bordered table-striped table-condensed datatable" id="users">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($users)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td class="">
                                    <div class="d-flex">
                                        <a href="{{ route('users.edit', $user) }}" class="">
                                            <i class="bi bi-pencil ms-2"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 ms-4">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


