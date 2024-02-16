@extends('dashboard.adminLayout.main')
@push('title')
    <title>Category</title>
@endpush

<style>
    .alert {
        color: red;
    }

    .thumb-image {
        float: left;
        width: 100px;
        position: relative;
        padding: 5px;
        height: 100px;
    }
</style>
@section('main-content')

        <div class="card card-primary">
            <div class="card-title ml-4 mt-4">
                <h3 class="card-title">Category Edit Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Cateogry Name</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category"
                            id="category" placeholder="Enter Cateogry Name" value="{{ $category->name }}">
                        @error('category')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
@endsection
