@extends('admin.admin')

@section('content')
@include('admin._layouts.modal')
<input type="button" class="btn btn-primary trigger" value="Attach File">
<h3>{{ $page->title }}</h3>

<p>{{ $page->body }}</p>

@section('modular_script')
	<script type="" src="{{ asset('js/modal.js') }}"></script>
@endsection
@endsection