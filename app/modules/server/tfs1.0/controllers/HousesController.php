<?php namespace App\Modules\Server\Controllers;

use App\Modules\Server\Models\Character;
use App\Modules\Server\Models\House;
use View;
class HousesController extends \BaseController {

	protected $layout = 'public.master';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$houses_by_city = array();
		foreach(House::orderBy('name')->orderBy('town_id')->get() as $house) {
			$houses_by_city[$house->town_id][] = $house;
		}
		return View::make('houses.index', array(
			'houses_by_city' => $houses_by_city,
		));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  mixed  $id
	 * @return Response
	 */
	public function show($id) {
		/**
		 * PHP is really a bizarre language. I can't rely on 'is_num' since it only
		 * checks the type, and for REST parameters, it is always string. On the
		 * other hand, I can't rely on 'is_numeric' too since it allows octal and
		 * hexadecimal values. That's why I use 'ctype_digit', which allows only
		 * characters in the range 0-9.
		 */
		if (ctype_digit($id)) {
			$house = House::find($id);
			if ($house->owner) {
				$house->owner = Character::find($house->owner);
			} else if ($house->highest_bidder) {
				$house->highest_bidder = Character::find($house->highest_bidder);
			}
			return View::make('houses.show', array(
				'house' => $house,
			));
		} else {
			App::abort(404);
		}
	}
}
