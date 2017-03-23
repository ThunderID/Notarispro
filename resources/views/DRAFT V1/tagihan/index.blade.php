@extends('layout')

@section('navigation')
	{!!$navbar!!}
@stop

@section('content')
	<div class="row">
		<div class="col-sm-6">
			{!!$akta!!}
		</div>
		<div class="col-sm-6">
			{!!$klien!!}
		</div>
	</div>
@stop