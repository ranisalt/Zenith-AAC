<?php namespace App\Modules\Server\Controllers;

use App\Modules\Server\Models\Character;
use App\Modules\Server\Models\House;
use App\Modules\Server\Models\HouseBid;
use Auth, Redirect, View;
class HouseBidsController extends \BaseController {
	protected $layout = 'public.master';
	
	public function create($id) {
		if (ctype_digit($id)) {
			$house = House::find($id);
			if ($house->highest_bidder) {
				$house->highest_bidder = Character::find($house->highest_bidder);
			}
			return View::make('housebids.create', array(
				'house' => $house,
			));
		} else {
			App::abort(404);
		}
	}

	public function store($id) {
		if (ctype_digit($id)) {
		
		} else {
			App::abort(404);
		}
	}
}
