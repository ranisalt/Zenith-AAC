<?php namespace Zenith\Setting;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Setting extends Eloquent {
	protected $table = 'zenith_settings';

	public $timestamps = false;

	public function getValueAttribute() {
		return unserialize($this->attributes['value']);
	}
	
	public function setValueAttribute($value) {
		$this->attributes['value'] = serialize($value);
	}

	public function getLastAttribute() {
                return unserialize($this->attributes['last']);
        }

        public function setLastAttribute($last) {
                $this->attributes['last'] = serialize($last);
        }
}
