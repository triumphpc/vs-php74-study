<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class Ex2Test extends TestCase
{
	public function testExample() {
		// Примеры объектного вызова
		$p1 = new Point2(1, 2);
		$p1->draw("first", 100);
		$p2 = new Point2(3, 4);
		$p2->draw("second", 100);
		$this->expectOutputString("first12100second34100");

		// Примеры при статических вызовах
		$x = new C2("h");
		$f = $x->c;
		$result = $f($x->m);
		$this->assertNull($result);



	}
}

abstract class Graphics {
	abstract function draw($im, $col);
}

abstract class Point1 extends Graphics {
	public $x, $y;

	function __construct($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}

	function draw($im, $col) {
		ImageSetPixel($im, $this->x, $this->y, $col);
	}
}

class Point2 extends Point1 {
}

abstract class Point3 extends Point2 {
}

function ImageSetPixel($im, $x, $y, $col) {
	print_r($im);
	print_r($x);
	print_r($y);
	print_r($col);
}


class C2 {
	public $ello = 'ello';
	public $c;
	public $m;

	function __construct($y) {
		$this->c = static function ($f) {
			// INSERT LINE OF CODE HERE};
		};
		$this->m = function () {
			return "h";
		};}
}

