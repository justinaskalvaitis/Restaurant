<?php
namespace App;

class Price {
	public static function getWithoutVat($value)
	{
		return number_format($value/1.21, 2);
	}

	public static function getVat($value)
	{
		return ($value - sels::getWithoutVat($value),
		2
		);
	}
}