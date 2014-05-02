@extends('public.master')

@section('content')
	@foreach($houses_by_city as $city => $houses)
		<div class='house-list'>
			<h1>{{{ Config::get('zenith.cities')[$city]['name'] }}}</h1>
			@foreach($houses as $house)
				<div>
					<span class='name'>{{ HTML::link(route('house.show', $house->id), $house->name) }}</span>
					<span class='size'>{{{ $house->size }}} sqm</span>
					<span class='rent'>{{{ $house->rent }}} gold</span>
					<span class='status'>{{{ $house->status }}}</span>
				</div>
			@endforeach
		</div>
	@endforeach
@stop
