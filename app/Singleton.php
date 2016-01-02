<?php

namespace App;

trait Singleton
{
	private function __construct() {}
	private function __clone() {}
	public static function instance(){
		static $inst = null;
		if (null === $inst) {
			$inst = new static;
		}
		return $inst;
	}
}