@extends('public.master')

@section('content')
	<div class='city-list'>
		<h3>Cities</h3>
	</div>
	<div class='house-list'>
		{{{ dd($houses->first()) }}}
	</div>
@stop
