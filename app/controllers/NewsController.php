<?php

class NewsController extends \BaseController {
	
	protected $layout = 'public.master';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($page = 0) {
		$tickers = Newsticker::orderBy('published_at', 'desc')->take(5)->get();

		$news = News::where('published_at', '<=', DB::raw('NOW()'))->orderBy('published_at', 'desc')->skip($page * 10)->take(10)->get();
		foreach ($news as $n) {
			$cut_content = preg_split('/\s*<!--\s*more\s*-->/i', $n->content, 2);
			$n->lead = array_shift($cut_content);
			$n->rest = $cut_content ?: null;
		}
		
		return View::make('news.index', array(
			'tickers' => $tickers,
			'news' => $news,
		));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug) {
		$news = News::where('slug', $slug)->first();
		return View::make('news.show', array(
			'news' => $news
		));
	}

}
