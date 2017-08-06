@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($domsrc as $src)
		<div class="table">
			<tr>
				<td><p>{{$src}}</p></td>
			</tr>
		</div>
	@endforeach
</div>
@stop
