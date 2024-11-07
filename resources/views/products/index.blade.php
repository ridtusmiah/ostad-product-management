@extends('products.app')

@section('title', 'All Product')

@section('bredcrum')
    <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item active" aria-current="page">
            All Product
        </li>

    </ol>
@endsection

@section('content')

    <div style="position: relative; margin-bottom: 20px;">
        <form action="{{ route('products.index') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <!-- Search input -->
                    <input class="form-control" type="text" name="search"
                        placeholder="Search by Product ID or Description" value="{{ request('search') }}"
                        style="padding-right: 30px;">
                    <!-- Cross button for clearing the search -->
                    @if (request('search'))
                        <a class="custom-cross" href="{{ route('products.index') }}">
                            ❌
                        </a>
                    @endif
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
                <div class="col-md-1">
                    <div class="dropdown">
                        <button class="btn btn-info">SORT</button>
                        <div class="dropdown-content">

                            <a
                                href="{{ route('products.index', ['sort_by' => 'name', 'order' => 'desc'] + request()->query()) }}">Sort
                                by Name <i class="bi bi-arrow-up-circle"></i></a>
                            <a
                                href="{{ route('products.index', ['sort_by' => 'name', 'order' => 'asc'] + request()->query()) }}">Sort
                                by Name <i class="bi bi-arrow-down-circle"></i></a>

                            <a
                                href="{{ route('products.index', ['sort_by' => 'price', 'order' => 'desc'] + request()->query()) }}">Sort
                                by Price <i class="bi bi-arrow-up-circle"></i></a>
                            <a
                                href="{{ route('products.index', ['sort_by' => 'price', 'order' => 'asc'] + request()->query()) }}">Sort
                                by Price <i class="bi bi-arrow-down-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Create Button -->
                    <a href="{{ route('products.create') }}" class="btn btn-primary" style="white-space: nowrap;">
                        + Create New Product
                    </a>
                </div>
            </div>
    </div>
    </form>
    </div>
    <table class="table table-bordered">
        <tr>
            <th style="width: 10px">ID</th>
            <th style="width: 10px">Product ID</th>
            <th style="width: 10px">Name</th>
            <th style="width: 10px">Price</th>
            <th style="width: 10px">Description</th>
            <th style="width: 10px">Image</th>
            <th style="width: 10px">Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    @if ($product->image)
                        <div class="image-dropdown">
                            <img src="{{ asset('storage/' . $product->image) }}" width="50" alt="Product Image">
                            <div class="image-dropdown-content">
                                <img src="{{ asset('storage/' . $product->image) }}" width="280" alt="Product Image">
                            </div>
                        </div>
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('products.show', $product->id) }}">View</a>
                    <a class="btn btn-warning" href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }} <!-- This generates the pagination links -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
@endsection
