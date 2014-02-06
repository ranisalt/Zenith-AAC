@extends('layouts.master')

@section('scripts')
{{ HTML::script('js/character.js'); }}
@stop

@section('content')
	@include('characters._general_data')
	@include('characters._general_info')
@stop
