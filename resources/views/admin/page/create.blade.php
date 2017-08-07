@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('new_page') !!}
@if(count($errors))
    <ul class="alert alert-info" style="padding: 10px;">
    @foreach($errors->all() as $error)
        <li style="margin-left: 10px;">{{ $error }}</li>
    @endforeach
    </ul>
@endif

<form action="{{route('Page_store')}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Save">
    </div>

    <div class="form-group">
        <label for="title" class="label for-title">Title</label>
        <input type="text" class="form-control title" name="title" id="title" value="Untitled">
    </div> 
    <!-- <div class="form-group">
        <label for="title" class="label">Date</label>
        <input type="date" class="form-control" name="publish_date" id="publish_date">
    </div> -->
    <div id="container"></div>
    <!-- <div class="form-group">
        <label for="body" class="label for-content">Content</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control content"></textarea>
    </div> -->

</form>
@endsection

    @section('modular_script')
    <script src="{{asset('js/components/lomeeditor.js')}}"></script>
    @endsection
