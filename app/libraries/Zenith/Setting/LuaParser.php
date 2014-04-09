<?php namespace Zenith\Setting;

use Illuminate\Filesystem\Filesystem;
use Cache;
use Config;

class LuaParser extends Parser {
	static $expr = array(
		'bool' => '/^(\"yes\"|\"no\"|true|false)$/',
		'float' => '/^(\d*\.\d+)$/',
		'int' => '/^(\d+)$/',
		'string' => '/^\"(.*)\"$/',
	);

	public static function parse($content) {
		$content = preg_replace('/\s*[-]{2,}.*/', '', $content);
		preg_match_all('/\s*(\w+)\s*[=]\s*(.*)/', $content, $matches);
		return array_combine($matches[1], $matches[2]);
	}

	/**
	 * Sanitizes the key => value array passed as parameter, changing the
	 * type of the variable whether it is a string, an integer, an expression
	 * or whatever may be set on config.lua
	 */
	public static function sanitize(array $array) {
		foreach ($array as $key => $value) {
			/**
			 * Check if it is a boolean value. Booleans have different
			 * representation in older versions of OpenTibia, so we
			 * check both :D there's no need to cast it also.
			 */
			if (preg_match(self::$expr['bool'], $value, $match)) {
				$array[$key] = in_array($match[1], array('"yes"', 'true'));
			}

			/**
			 * Check if it is a numeric value, either integer or float.
			 */
			elseif (preg_match(self::$expr['float'], $value, $match)) {
				$array[$key] = (float)$match[1];
			} elseif (preg_match(self::$expr['int'], $value, $match)) {
                                $array[$key] = (int)$match[1];
                        }

			/**
			 * Last but not least, parse strings.
			 */
                        elseif (preg_match(self::$expr['string'], $value, $match)) {
                                $array[$key] = $match[1];
                        }
		}
		return $array;
	}

	public static function push($sanitized) {
		$decamelize = function($camel) {
			return preg_replace_callback('/([A-Z]+)/', function($matches) {
				return '_' . strtolower($matches[1]);
			}, $camel);
		};
		$decamelized = null;
		foreach ($sanitized as $key => $value) {
			$decamelized = /*Str::snake($key);*/$decamelize($key);
			dd($sanitized);
			if (Config::has("zenith.$decamelized")) {
				$setting = Setting::where('key', $decamelized)->first();
				$setting->last = $setting->value;
				$setting->value = $value;
				if ($setting->save()) {}
			}
		}
		Cache::forget('zenith');
	}
}
