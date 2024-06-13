<?php


class Validator
{
	public static function string($value, $min = 2, $max = INF): bool
	{
		$value = trim($value);
		return strlen($value) >= $min && strlen($value) <= $max;
	}

	public static function email($value): bool
	{
		return str_contains($value, "@");
	}
}
