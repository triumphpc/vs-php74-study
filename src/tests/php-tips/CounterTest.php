<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

// Пример счетчика файлового
class CounterTest extends TestCase {
	public function testExample() {
		$file = "counter.dat";
		fclose(fopen($file, "a+b")); //пустой файл
		$f = fopen($file, "r+t");
		flock($f, LOCK_EX);
		$count = fread($f, 100);
		$count = (int)$count + 1;
		ftruncate($f, 0);
		fseek($f, 0, SEEK_SET);
		fwrite($f, $count);
		fclose($f);

		$this->assertIsNumeric($count);

	}


}