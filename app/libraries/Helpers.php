<?php
class Helpers {
	public static function createDepartmentKey($name) {
		$string = preg_replace('/\s+/', '', $name);
		return strtolower($string);
	}
}