@extends('public.master')

@section('content')
	<div class='house-data'>
		<h1>{{{ $house->name }}}</h1>
		<p>This house has {{{ $house->beds }}} beds.</p>
		<p>The house has a size of <strong>{{{ $house->size }}} square meters</strong>. The {{{ Config::get('zenith.house_rent_period') }}} rent is <strong>{{{ $house->rent }}} gold</strong> and will be debited to the bank account.</p>
		@if($house->owner)
			<p>The house has been rented by {{ HTML::link(route('character.show', $house->owner->name), $house->owner->name) }}. He has paid the rent until <strong>{{{ $house->paid->format(Config::get('zenith.long_datetime_format')) }}}</strong>.</p>
		@else
			@if($house->highest_bidder)
				<p>The house is currently being auctioned. The auction will end at <strong>{{{ $house->bid_end->format(Config::get('zenith.long_datetime_format')) }}}</strong>. The highest bid so far is <strong>{{{ $house->bid }}} gold</strong> and has been submitted by {{ HTML::link(route('character.show', $house->highest_bidder->name), $house->highest_bidder->name) }}.</p>
			@else
				<p>The house is currently being auctioned. No bid has been submitted so far.</p>
			@endif
			<a href='{{{ route('housebid.create', $house->id) }}}' class='bid-house'>Bid</a>
		@endif
	</div>
@stop
