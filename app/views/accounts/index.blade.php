@extends('layouts.master')

@section('scripts')
{{ HTML::script('js/account.js'); }}
@stop

@section('content')
	@include('accounts._general_info')
	@include('accounts._characters_info')
	
	@include('accounts.modals.master')
@stop
