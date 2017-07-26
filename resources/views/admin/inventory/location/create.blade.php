@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('new_warehouse') !!}
{!! Form::open(['route' => 'Warehouse_store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', NULL, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', NULL, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', NULL, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone_1', 'Phone 1') }}
        {{ Form::text('phone_1', NULL, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone_2', 'Phone 2') }}
        {{ Form::text('phone_2', NULL, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
@stop
