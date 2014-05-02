@extends('public.master')

@section('content')
	{{ Form::open(array('route' => array('housebid.store', $house->id))) }}
		<p>The house <strong>{{{ $house->name }}}</strong> is currently being auctioned. 
		@if($house->bid_end->isFuture())
			The auction will end at <strong>{{{ $house->bid_end->format(Config::get('zenith.long_datetime_format')) }}}</strong>. The highest bid so far is <strong>{{{ $house->bid }}} gold</strong> and has been submitted by {{ HTML::link(route('character.show', $house->highest_bidder->name), $house->highest_bidder->name) }}.
		@else
			There is no bid so far.
		@endif
		</p>
		<div class='house-bid'>
			<h1>Enter bid</h1>
			<div>
				<span class='title'>Your limit:</span>
				<span class='value'>{{ Form::text('limit', Input::old('limit'), array('placeholder' => trans('housebid.forms.limit'))) }}</span>
			</div>
			<div>
				<span class='title'>Your character:</span>
				<span class='value'>
					@foreach(Auth::user()->characters as $character)
						<span class='radio-option'>
							{{ Form::radio('character', $character->name, Input::old('character') === $character->name) }} {{{ $character->name }}}
						</span>
					@endforeach
				</span>
			</div>
		</div>
		<p>Bids increase in steps of 1 gold. You will automatically outbid the current bid by 1 gold until your specified limit is reached.</p>
		<p>When the auction ends, the <strong>winning bid plus the rent of {{{ $house->rent }}} gold</strong> for the first month will be debited to your bank account.</p>
		{{ Form::submit() }}
	{{ Form::close() }}
@stop
