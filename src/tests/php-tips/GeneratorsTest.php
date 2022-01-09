<?php

namespace Tests\Feature\PHP74;

use Generator;
use PHPUnit\Framework\TestCase;

class GeneratorsTest extends TestCase {
	// Примеры парсера с использованием дженерика
	public function testExample() {
		$input = <<<'EON'
1;PHP;Любить знаки доллара
2;Rython;Любить пробелы
3;Ruby;Блоки
EON;
		foreach (inputParser($input) as $id => $fields) {
			echo $id . ":\n";
		}

		$this->expectOutputString("1:\n2:\n3:\n");
	}

	// Пример делегирования дженерика
	public function testExample2() {
		$arr = [1, 2, 3, 4];
		foreach (even_square($arr) as $item) echo "$item ";

		$this->expectOutputString("0 6 ");
	}

	// Отправка денных дженерику методом send
	public function testExample3() {
		$block = block();
		$block->send("Hhhh");
		$block->send("Hello PHP");

		$this->expectOutputString("HhhhHello PHP");
	}

	// Отложенные вычисления
	public function testExample4() {
		foreach (gen_one_to_three() as $value) {
			echo "$value";
		}

		$this->expectOutputString("123");
	}

	// Работа с объектом дженерика
	public function testExample5() {
		$obj = simple(1,5);

		$this->assertTrue($obj instanceof Generator);

		while ($obj->valid()) {
			echo $obj->current() * $obj->current();
			$obj->next();
		}

		$this->expectOutputString("14916");

	}
}

function inputParser($input) {
	foreach (explode("\n", $input) as $line) {
		$fields = explode(";", $line);
		$id = array_shift($fields);

		yield $id => $fields;
	}
}

//делегирование генератора
function square($value) {
	yield $value ^ 2;

}

function even_square($arr) {
	foreach ($arr as $val) {
		if ($val % 2 == 0) yield from square($val);
	}
}

function block() {
	while (true) {
		$str = yield;
		echo $str;
	}
}

function gen_one_to_three() {
	for ($i = 1; $i <= 3; $i++) {
		// Обратите внимание, что $i сохраняет свое значение между вызовами.
		yield $i;
	}
}

function simple($from = 0, $to = 100) {
	for ($i = $from; $i < $to; $i++) {
		yield $i;
	}
}


