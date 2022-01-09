<?php

namespace Tests\Feature\PHP74;

use Closure;
use PHPUnit\Framework\TestCase;


class Ex4Test extends TestCase {
	// Примеры работы с Unicode
	// Пример занятием символом 2 бита
	public function testExample() {
		$data = '$1Ä2';
		$count = strlen($data);

		$this->assertTrue(5 === $count);
	}
}

