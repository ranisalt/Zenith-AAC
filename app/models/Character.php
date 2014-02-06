<?php
class Character extends Eloquent {
	protected $guarded = array();
	protected $softDelete = true;
	protected $table = 'players';

	public static $rules = array(
		'name' => 'required|unique:players|alpha_dash|between:4,30',
	);

	public $timestamps = false;

	public function account() {
		return $this->belongsTo('Account', 'account_id', 'id');
	}
}
