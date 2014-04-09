<?php namespace Zenith\Setting;

interface ParserInterface {
	public static function parse($content);
	public static function sanitize(array $parsed);
	public static function push($sanitized);
	public static function zenithify($file);
}
