<header>
	<h2 class='rank'>#</h2>
	<h2 class='name'>Name</h2>
	<h2 class='level'>Level</h2>
	<h2 class='experience'>Experience</h2>
</header>
<section>
	@foreach($characters as $character)
		<div>
			<span class='rank'>{{{ ++$rank }}}</span>
			<span class='name'>{{ HTML::link(URL::route('character.show', array('skill' => $character->name)), $character->name) }}</span>
			<span class='level'>{{{ $character->level }}}</span>
			<span class='experience'>{{{ number_format($character->experience, 0, '', ',') }}}</span>
		</div>
	@endforeach
</section>
