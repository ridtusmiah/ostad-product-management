@extends('products.app')
@section('title', 'Create Product')
@section('bredcrum')
<ol class="breadcrumb float-sm-end">
    <li class="breadcrumb-item active" aria-current="page">
        All Product
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Create Product
    </li>

</ol>
@endsection
@section('content')
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="product_id" class="form-label">Product ID</label>
        <input type="text" class="form-control" id="product_id" name="product_id" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock">
    </div>
    <div class="input-group mb-3">
        <input type="file" class="form-control" id="image" name="image">
        <label class="input-group-text" for="image">Upload</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection