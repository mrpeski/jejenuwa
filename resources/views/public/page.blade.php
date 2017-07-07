@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        {{ $page->title }}
    </div>
    
</div>
@endsection
