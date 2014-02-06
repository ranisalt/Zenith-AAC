<div class='modal-body' data-action='create-character'>
	<fieldset>
		<div class='form-group'>
			{{ Form::label('character_name', 'Character name:', array('class' => 'col-sm-3 control-label')) }}
			<div class='col-sm-9'>{{ Form::text('character_name', null, $attributes = array('class' => 'form-control')) }}</div>
		</div>
		<div class='row'>
			<div class='col-sm-3 form-group'>
				{{ Form::label('character_sex', 'Sex:', array('class' => 'control-label')) }}
				<div class='radio'>
					<label>
						{{ Form::radio('character_male', 'male', true) }} Male
					</label>
				</div>
				<div class='radio'>
					<label>
						{{ Form::radio('character_female', 'female') }} Female
					</label>
				</div>
			</div>
			<div class='col-sm-3 form-group'>
				{{ Form::label('character_world', 'World:', array('class' => 'control-label')) }}
				@foreach (Config::get('otserv.worlds') as $id => $world)
				<div class='radio'>
					<label>
						{{ Form::radio($id, $world) }}{{ $world }}
					</label>
				</div>
				@endforeach
			</div>
			<div class='col-sm-3 form-group'>
				{{ Form::label('character_sex', 'City:', array('class' => 'control-label')) }}
				@foreach (Config::get('otserv.cities') as $id => $city)
				<div class='radio'>
					<label>
						{{ Form::radio($id, $city['name']) }}{{ $city['name'] }}
					</label>
				</div>
				@endforeach
			</div>
		</div>
	</fieldset>
</div>