<?php namespace App\Modules\Server\Controllers;

use App\Modules\Server\Models\Character;
use Config, Input, Redirect, View;

class HighscoresController extends \BaseController {		
	static $columns = array(
		'level' => array('level', 'Level',),
		'mlevel' => array('maglevel', 'Magic Level',),
		'fist' => array('skill_fist', 'Fist Fighting',),
		'club' => array('skill_club', 'Club Fighting',),
		'sword' => array('skill_sword', 'Sword Fighting',),
		'axe' => array('skill_axe', 'Axe Fighting',),
		'distance' => array('skill_dist', 'Distance Fighting',),
		'shielding' => array('skill_shielding', 'Shielding',),
		'fishing' => array('skill_fishing', 'Fishing',),
	);

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($skill = 'level') {
		/**
		 * We will guess the highscores page the user is trying to reach. If it is
		 * not set, we can assume it is the first one. Also, we limit highscores
		 * to a maximum of configured pages.
		 */
		$page = Input::has('page') ? Input::get('page') : 1;
		if ($page > Config::get('zenith.highscores_max_pages')) {
			return Redirect::route('highscores.index');
		}
		
		/**
		 * The skill highscore the user is trying to reach must exist, else we
		 * redirect to the index page for correct selection.
		 */
		if (array_key_exists($skill, self::$columns)) {
			$characters = Character::withTrashed()
				->orderBy(self::$columns[$skill][0], 'desc')
				->take(Config::get('zenith.highscores_max_pages') * Config::get('zenith.highscores_per_page'))
				->remember(60)
				->paginate(Config::get('zenith.highscores_per_page'));
			if ($characters->isEmpty()) {
				return Redirect::route('highscores.index');
			}
			return View::make('highscores.show', array(
				'characters' => $characters,
				'rank' => ($page - 1) * Config::get('zenith.highscores_per_page'),
				'skill' => $skill,
				'skills' => self::$columns,
			));
		} else {
			/**
			 * We throw a 404 error since the selected skill does not exist.
			 */
			App::abort(404);
		}
	}
}
