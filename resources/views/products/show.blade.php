@extends('products.app')

@section('title', 'Show Product')

@section('bredcrum')
    <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item active" aria-current="page">
            All Product
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Show Product
        </li>

    </ol>
@endsection

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-light">
                    <!-- Product Image -->
                    <div class="card-img-top text-center">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="Product Image"
                                style="max-height: 400px; object-fit: cover;">
                        @else
                            <div class="text-muted"
                                style="height: 400px; display: flex; align-items: center; justify-content: center;">
                                <span>No Image Available</span>
                            </div>
                        @endif
                    </div>

                    <!-- Product Details -->
                    <div class="card-body">

                        <div class="mb-3">
                            <p class="card-text"><strong>Name:</strong> {{ $product->name }}</p>
                            <p class="card-text"><strong>Product ID:</strong> {{ $product->product_id }}</p>
                            <p class="card-text"><strong>Description:</strong>
                                {{ $product->description ??
                                    'No description
                                                            available' }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            <p class="card-text"><strong>Stock:</strong> {{ $product->stock ?? 'Out of stock' }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-end">
                        <small>Last updated: {{ $product->updated_at->format('d M Y, h:i A') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
