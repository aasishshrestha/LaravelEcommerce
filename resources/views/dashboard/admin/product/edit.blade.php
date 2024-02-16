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
                <h3 class="card-title">Edit Product Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label>Select a News Category</label>
                        <select class="form-control" name="category_id">
                            <option value=""disabled selected hidden>Choose News Category</option>

{{-- <option value="y">yyy</option> --}}
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}"
                                    {{ $products->category_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="title" placeholder="Enter Product Title" value="{{ $products->title }}">


                        @error('title')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        {{-- <input type="number" class="form-control @error('rent_price') is-invalid @enderror"
                            name="rent_price" id="title" placeholder="Enter Rent Price"> --}}
                        <textarea class="form-control" name="description" id="" cols="20" rows="10"
                            placeholder="Enter Product Description">{{ $products->description }}</textarea>


                        @error('description')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="Enter Price" value="{{ $products->price }}">


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


{{--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#fileUpload").on('change', function() {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);
                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            });
        });
    </script> --}}
@endsection
