@extends('admin.admin')

@section('content')

@if(count($errors))
    <ul class="alert alert-info">
    @foreach($errors as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif
{!! Breadcrumbs::render('info') !!}
<form action="" method="POST">
    <!-- <input type="hidden" name="_method" value="PATCH"> -->
    {{csrf_field()}}
    <div class="form-group">
        <label for="title" class="label">MMSI</label>
        <input type="text" class="form-control" name="title" id="title" value="">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Get Location">
    </div>

</form>
@endsection