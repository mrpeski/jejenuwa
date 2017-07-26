@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('edit_page', $page) !!}
@if(count($errors))
    <ul class="alert alert-info">
    @foreach($errors as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif



<form action="{{route('Page_update', ['id' => $page->id ])}}" method="POST">
    <input type="hidden" name="_method" value="PATCH">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title" class="label">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $page->title }}">
    </div> 
    <div class="form-group">
        <label for="title" class="label">Date</label>
        <input type="date" class="form-control" name="publish_date" id="publish_date">
    </div>
    <div class="form-group">
        <label for="body" class="label">Content</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $page->body }}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>

</form>
@endsection