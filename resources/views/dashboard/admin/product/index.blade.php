@extends('dashboard.adminLayout.main')
@push('title')
    <title>Product</title>
@endpush
@section('main-content')
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card">
            <div class="card-header">
                <a href="{{ route('product.create') }}" class="btn btn-primary " style="float: right;">Add New</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="" height="100" width="100">
                                </td>
                                @if ($item->category_id != null)
                                    <td>{{ $item->category->name }}
                                    </td>
                                @else
                                    <td>No Category
                                    </td>
                                @endif

                                <td>{{ $item->title }}
                                </td>
                                <td>{{ $item->description }}
                                </td>
                                <td>{{ $item->price }}
                                </td>



                                <td>
                                    <a class="btn btn-primary"
                                                href="{{ route('product.edit', $item->id) }}">Edit
                                            </a>

                                            <a class="btn btn-danger"
                                                href="{{ route('product.destroy', $item->id) }}">Delete
                                            </a>

                                </td>

                            </tr>
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>

@endsection
