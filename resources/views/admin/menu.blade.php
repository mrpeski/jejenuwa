@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('menu') !!}

	@if(session()->has('message'))
		<div class="alert alert-info">{{ session('message') }}</div>
	@endif
	<div>
	<!-- <h4 style="display: inline-block;">Menu</h4> -->

	@include('admin._layouts.new_menu')

	@include('admin._layouts.link_bucket')

	@include('admin._layouts.sortable')

	@include('admin._layouts.location')
	
	@section('modular_script')
		<script type="" src="{{ asset('js/menu.js') }}"></script>
	@endsection
@stop
