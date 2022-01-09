<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class YieldTest extends TestCase
{
	// Пример оптимизации памяти с помощью оператора Yield
	public function testExample() {
		// Простая реализация
		$range = crange(10000);
		$first = memory_get_usage()."\n";

		unset($range);

		$range = crange2(10000);
		foreach ($range as $val) continue;

		$second = memory_get_usage();

		echo $first."\n";
		echo $second."\n";

		$this->assertTrue($first > $second);

	}

}

function crange($size)
{
	$arr = [];
	for ($i = 0; $i < $size; $i++) {
		$arr[] = $i;
	}
	return $arr;

}

//экономие памяти
function crange2($size)
{
	for ($i = 0; $i < $size; $i++) {
		yield $i;
	}

}
