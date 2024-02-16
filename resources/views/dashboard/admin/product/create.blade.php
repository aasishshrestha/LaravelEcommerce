@extends('dashboard.adminLayout.main')
@push('title')
    <title>Product</title>
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
                <h3 class="card-title">Product Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div id="wrapper" style="margin-top: 20px;"><input id="fileUpload" name="image"
                                    type="file" />
                                <div id="image-holder"></div>
                            </div>
                        </div>

                        @error('image')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Select Product Category</label>
                        <select class="form-control" name="category_id">
                            <option value=""disabled selected hidden>Choose Product Category</option>

                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Product Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="title" placeholder="Enter Product Title" value="{{ old('title') }}">


                        @error('title')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        {{-- <input type="number" class="form-control @error('rent_price') is-invalid @enderror"
                            name="rent_price" id="title" placeholder="Enter Rent Price"> --}}
                        <textarea class="form-control" name="description" id="" cols="20" rows="10"
                            placeholder="Enter Product Description" value="{{ old('description') }}"></textarea>


                        @error('description')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="Enter Price" value="{{ old('price') }}">


                        @error('price')
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
