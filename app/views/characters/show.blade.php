@extends('public.master')

@section('content')
	<div class='character-data'>
		<header>
			<h2>Character information</h2>
		</header>
		<div>
			<span class='title'>{{{ trans('character.spans.name') }}}:</span>
			<span class='value'>
				@if($character->deletion->isFuture())
					{{{ $character->name }}}, {{{ trans('character.spans.deletion-message', array('date' => $character->deletion->format(Config::get('zenith.long_datetime_format')))) }}}
				@else
					{{{ $character->name }}}
				@endif
			</span>
		</div>
		<div>
			<span class='title'>{{{ trans('character.spans.sex') }}}:</span>
			<span class='value'>{{{ Config::get('zenith.sexes')[$character->sex] }}}</span>
		</div>
		<div>
			<span class='title'>{{{ trans('character.spans.vocation') }}}:</span>
			<span class='value'>{{{ Config::get('zenith.vocations')[$character->vocation] }}}</span>
		</div>
		<div>
			<span class='title'>{{{ trans('character.spans.level') }}}:</span>
			<span class='value'>{{{ $character->level }}}</span>
		</div>
		@if(count(Config::get('zenith.worlds')))
			<div>
				<span class='title'>{{{ trans('character.spans.world') }}}:</span>
				<span class='value'>Forgotten</span>
			</div>
		@endif
		@if(count(Config::get('zenith.cities')))
			<div>
				<span class='title'>{{{ trans('character.spans.residence') }}}:</span>
				<span class='value'>{{{ Config::get('zenith.cities')[$character->town_id]['name'] }}}</span>
			</div>
		@endif
		@if($character->house)
			<div>
				<span class='title'>{{{ trans('character.spans.house') }}}:</span>
				<span class='value'>{{ HTML::link(route('house.show', $character->house->id), $character->house->name) }} ({{{ Config::get('zenith.cities')[$character->house->town_id]['name'] }}}) is paid until {{{ $character->house->paid->format(Config::get('zenith.long_date_format')) }}}</span>
			</div>
		@endif
		<div>
			<span class='title'>{{{ trans('character.spans.last-login') }}}:</span>
			<span class='value'>{{{ $character->lastlogin->timestamp ? $character->lastlogin->format(Config::get('zenith.long_datetime_format')) : trans('character.spans.never-logged-in') }}}</span>
		</div>
		@unless(empty($character->comment))
		<div>
			<span class='title'>{{{ trans('character.spans.comment') }}}:</span>
			<span class='value'>{{{ $character->comment }}}</span>
		</div>
		@endif
		<div>
			<span class='title'>{{{ trans('account.spans.status') }}}:</span>
			<span class='value {{{ $account->premend->isFuture() ? 'green' : 'red' }}}'>
				<strong>{{{ $account->premend->isFuture() ? 'premium' : 'free' }}} account</strong>
			</span>
		</div>
	</div>
	@unless($character->is_hidden)
		<div class='account-info'>
		<header>
			<h2>Account information</h2>
		</header>
		@if($current_ban = $account->bans->last())
			@unless($current_ban->expires_at->isPast())
				<div class='red'>
					<span class='title'>Banished:</span>
					<span class='value'>until {{{ $current_ban->expires_at->format(Config::get('zenith.long_datetime_format')) }}} because of {{{ $current_ban->reason }}}</span>
				</div>
			@endunless
		@endif
		<div>
			<span class='title'>Created:</span>
			<span class='value'>{{{ $account->creation->format(Config::get('zenith.long_datetime_format')) }}}</span>
		</div>
	</div>
	
	<div class='characters-info'>
		<header>
			<h2>Characters</h2>		
		</header>
		@foreach($account->characters as $character)
			@unless($character->is_hidden)
				<div>
					<span class='information'>
						<strong>{{ HTML::link(URL::route('character.show', array('name' => $character->name)), $character->name) }}</strong>
						<br/>
						<small>{{{ Config::get('zenith.vocations')[$character->vocation] }}} - {{{ trans('character.spans.level') }}} {{{ $character->level }}}</small>
					</span>
					<span class='world'>Forgotten</span>
					<span class='status'>{{{ implode('', $character->status) }}}</span>
				</div>
			@endunless
		@endforeach
	</div>
	@endunless
@stop
