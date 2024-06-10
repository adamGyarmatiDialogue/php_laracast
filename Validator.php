<?php

class Validator
{
	public static function string($value, $min = 1, $max = INF): bool
	{
		$value = trim($value);
		echo $value;
		echo strlen($value);
		return strlen($value) >= $min && strlen($value) <= $max;
	}
}
