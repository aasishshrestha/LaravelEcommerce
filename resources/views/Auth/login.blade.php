@extends('user.includes.app')
@push('title')
    <title>Login</title>
@endpush
@section('main-content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Login</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">Login</li>
        </ol>
    </div>
    <div class="container-fluid py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-3">

                </div>
                <div class="col-6">
                    <form method="post" action="{{route('login.user')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>

                        <div class="form-group mt-1">
                            <input class="btn btn-primary text-white" type="submit" value="Login">
                        </div>
                    </form>
                </div>
                <div class="col-3">

                </div>

            </div>
        </div>
    </div>
@endsection
