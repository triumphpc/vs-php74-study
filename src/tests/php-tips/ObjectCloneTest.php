<?php

namespace Tests\Feature\PHP74;

use Closure;
use PHPUnit\Framework\TestCase;

// Примеры клонирования объектов
class ObjectCloneTest extends TestCase {

	public function testExample() {

		$a = new MathComp;
		$a->m = 1;
		$a->r = 2;

		$c = $a; //ссылка

		$b = new MathComp;
		$b->m = 123;
		$b->r = 555;

		echo $a;
		echo $b."\n";

		$a->add($b);
		echo $a;
		echo $b."\n";
		echo $c."\n";

		$a->m = 4;
		$a->r = 6;

		echo $c;
		$this->expectOutputString("(2, 1)(555, 123)\n(555, 123)(555, 123)\n(555, 123)\n(6, 4)");

	}
}


class MathComp
{
	public $r, $m;

	public function add(MathComp $m){
		$this->r = $m->r;
		$this->m = $m->m;
	}

	function __toString()
	{
		return "($this->r, $this->m)";
	}
}

