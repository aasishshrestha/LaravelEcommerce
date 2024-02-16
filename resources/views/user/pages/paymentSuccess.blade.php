@extends('user.includes.app')
@push('title')
    <title>Home-One stop solution for purchasing bicycle</title>
@endpush

@section('main-content')
    <div class="container-fluid mt-5 py-5">
        <div class="container py-5">
            <div class="row p-5">
                <div class="col-12">
                    <iframe src="{{ $urlp }}" width="90%" height="400" frameborder="0"></iframe>

                    <a class="btn btn-primary text-white" href="{{ route('shop') }}">Go Back Shopping</a>
                </div>
            </div>
        </div>


    </div>
@endsection
