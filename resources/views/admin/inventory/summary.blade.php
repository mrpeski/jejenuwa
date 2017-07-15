@extends('admin.admin')

@section('content')

    <a type="button" class="btn btn-primary btn-lg col-lg-3" href="{{route('Product_create')}}" style="display:block;padding:40px">
    Add Product
    </a>
    <a type="button" class="btn btn-primary btn-lg col-lg-3" href="{{route('Product_create')}}" style="display:block;margin-left:5px;padding:40px">
    Add Brands
    </a>
    <a type="button" class="btn btn-primary btn-lg col-lg-3" href="{{route('Product_create')}}" style="display:block;margin-left:5px;padding:40px">
    Location
    </a>

@stop
