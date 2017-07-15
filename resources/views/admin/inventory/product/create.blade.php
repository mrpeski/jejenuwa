@extends('admin.admin')

@section('content')
<form action="#">
    <div class="form-group">
        <label for="product_name" id="product_name">Product Name</label>
        <input type="text" name="product_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="brand" id="brand">Brand</label>
        <input type="text" name="brand" class="form-control">
    </div>
    <div class="form-group">
        <label for="category" id="category">Category</label>
        <input type="text" name="category" class="form-control">
    </div>
    <div class="form-group">
        <label for="location" id="location">Location</label>
        <input type="text" name="location" class="form-control">
    </div>
    <div class="form-group">
        <label for="stock" id="stock">Stock</label>
        <input type="text" name="stock" class="form-control">
    </div>
    <div class="form-group">
        <label for="description" id="description">Description</label>
        <textarea type="text" name="description" class="form-control">
        </textarea>
    </div>

    <div class="form-grpup">
        <button class="btn btn-primary btn-lg">Create</button>
    </div>
</form>
@stop
