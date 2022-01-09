<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class Ex1Test extends TestCase
{
	// Приведение объектов к массиву
	public function testExample() {
		$x = (array)new Bar();
		$this->assertFalse(array_key_exists("a", $x));
		$this->assertTrue(array_key_exists("c", $x));
	}

	// Пример фабиночи
	// Тут работает скоуп функции
	public function testExample2() {
		$res = "";
		for ($i = 0; $i < 10; $i++) {
			$res .= fibonacci() . ',';
		}
		$this->assertTrue($res == "1,1,1,1,1,1,1,1,1,1,");
	}

	// Работа с stdClass и указателями
	public function testExample3() {
		$z = new \stdClass;
		f($z);

		$this->assertTrue($z == 42);
	}

	// Работа с указателями
	// Скоуп видимости указателей
	public function testExample4() {
		$a = 1;
		$res = increment2($a);
		$res2 = increment2($a);

		// Не меняет переменную при при вызове выражения и возвращаемом значении
		$this->assertTrue($res == 2);
		$this->assertTrue($res2 == 2);
		$this->assertTrue(1 === $a);
	}

	// Пример конкатинаци и приведения типов
	public function  testExample5() {
		echo "0.2" , "23 . 1";

		$this->expectOutputString("0.223 . 1");

		$this->assertTrue(boolval(-1)); // true

		$res =  "4" + 05 + 011 + ord('a');
		// ((int)4 + 5 + 9 + 97)
		$this->assertTrue($res == 115);

		$res = 016;
		$this->assertTrue($res == 14);

	}

}


class Bar {
	private $a = 'b';
	public $c = 'd';
}

function fibonacci(&$x1 = 0, &$x2 = 1) {
	$result = $x1 + $x2;
	$x1 = $x2;
	$x2 = $result;

	return $result;
}


function f(\stdClass &$x = NULL) {
	$x = 42;
}

function increment2(&$val) {
	return $val + 1;
}


