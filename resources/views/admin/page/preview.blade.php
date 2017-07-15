@extends('admin.admin')

@section('content')
@include('admin._layouts.modal')
<input type="button" class="btn btn-primary trigger" value="Attach File">
<h3>{{ $page->title }}</h3>

<p>{{ $page->body }}</p>

@endsection