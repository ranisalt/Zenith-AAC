<?php namespace App\Modules\Server\Models;

class HouseList extends \Eloquent {
	protected $primaryKey = null;
	
	public $incrementing = false;
	public $timestamps = false;
	
	public function house() {
		return $this->belongsTo('App\\Modules\\Server\\Models\\House', 'house_id', 'id');
	}
}
