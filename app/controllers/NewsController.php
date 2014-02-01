<?php

class NewsController extends BaseController {
	protected $layout = 'layouts.master';

	public function index() {
		$news = News::where('hidden', 0)->orderBy('id', 'desc')->take(10)->get();
		return View::make('news.index', array('news' => $news));
	}

	public function create() {
		return View::make('news.create');
	}
}
