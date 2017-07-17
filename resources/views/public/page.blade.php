@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
    @endif
    	<h3>
        {{ $page->title }}
    	</h3>
    <div class="content">
    	{{ $page->body }}
    </div>
    
</div>
@endsection

