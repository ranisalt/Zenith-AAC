<?php namespace App\Modules\Server\Models;

use Carbon\Carbon;
use Config;
class House extends \Eloquent {
	protected $guarded = array('id');
	protected $fillable = [];
    
	public $timestamps = false;
	
	public function houseLists() {
		return $this->hasMany('App\\Modules\\Server\\Models\\HouseList', 'house_id', 'id');
	}
	
	public function getBidEndAttribute() {	
		return Carbon::createFromTimeStamp($this->attributes['bid_end']);
	}
	
	public function getLastBidAttribute() {	
		return Carbon::createFromTimeStamp($this->attributes['last_bid']);
	}
	
	/**
	 * Actually, `paid` is not true or false, it's a date I still don't know what
	 */
	public function getPaidAttribute() {	
		return Carbon::createFromTimeStamp($this->attributes['paid']);
	}
	
	public function getRentAttribute() {	
		return $this->attributes['rent'] ?: $this->attributes['size'] * Config::get('zenith.house_price_each_sqm');
	}
	
	public function getStatusAttribute() {
		$status = '';
		if ($this->owner) {
			$status = 'rented';
		} else {
			$status = 'auctioned ';
			if ($this->bid) {
				$status .= "({$this->bid} gold; {$this->bid_end->diffInDays()} days left)";
			} else {
				$status .= '(no bid yet)';
			}
		}
		return $status;
	}
}
