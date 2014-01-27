@extends('layouts.master')

@section('content')
	@foreach($news as $n)
		<div class='panel panel-default'>
			<div class='panel-heading'>
				<h1 class='panel-title'>{{ $n->title }}</h1>
			</div>
			<div class='panel-body'>{{ $n->content }}</div>
			<div class='panel-footer'>
				<div class='text-right'>Posted on {{ date('F jS, Y \a\t h:i A O', strtotime($n->created_at)) }}</div>
			</div>
		</div>
	@endforeach
@stop
