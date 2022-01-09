<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class AssociationsTest extends TestCase
{
	public function testExample() {

	}
}

//композиция классов
class Engine
{
	public $power;

	public function __construct(int $p) {
		$this->power = $p;
	}
}

class Car
{
	public $model;
	public $engine;

	public function __construct() {
		$this->model = "Porshe";
		$this->engine = new Engine(360);
	}
}



//агрегация классов
class Engine2 {
	public $power;

	public function __construct(int $p) {
		$this->power = $p;
	}
}

class Car2
{
	public $model;
	public $engine;

	public function __construct(Engine2 $someEngine)
	{
		$this->model = "Porshe";
		$this->engine = $someEngine;
	}
}


$goodEngine = new Engine2(360);
$porshe = new Car2($goodEngine);
