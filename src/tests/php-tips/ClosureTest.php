<?php

namespace Tests\Feature\PHP74;

use Closure;
use PHPUnit\Framework\TestCase;




class ClosureTest extends TestCase
{
	// Пример статического вызова замыкания в области видимости класса
	public function testExample() {
		$one = new Number(1);
		$closure = $one->mul();
		$result = ($closure(5));

		$this->assertTrue($result == 50);

		$two = new Number(2);
		$double = $two->mul();
		$closure = Closure::bind($double, null, Number::class);
		$result = $closure(5);

		$this->assertTrue($result == 50);
	}

	// Пример использования замыкания
	public function testExample2() {
		$a = new A(2);
		$a->mul = function ($x) {
			return $x * $x;
		};
		$m = $a->mul();
		$result =  $m(3);

		$this->assertTrue($result == 6);
	}

	// Примеры использования замыкания
	public function testExample3() {
		$message = "Работа не может быть продолжена из-за ошибок";

		$check = function (array $errors) use ($message) {
			if (isset($errors) && count($errors) > 0) {

				echo $message;

				foreach ($errors as $er) {
					echo $er . "\n";
				}
			}
		};

		$result = $check([]);
		$this->assertNull($result);

		$errors[] = "Вот новая ошибка";
		$check($errors);

		$errors = ["111". "222", "3333"];
		$check($errors);

		$this->expectOutputString("Работа не может быть продолжена из-за ошибокВот новая ошибка\nРабота не может быть продолжена из-за ошибок111222\n3333\n");
	}

	// Примеры использования замыкания
	// Использование область видимости передаваемого объекта
	public function testExample4() {
		$obj = new Foo();

		$cl = function () {
			echo $this->a, $this->b, $this->c, "\n";
		};

		// Выполнится сразу. call - позволяет замыканию запуститься в определенной области видимости.
		// В данном случае область видимости передаваемого объекта
		$cl->call($obj);

		$this->expectOutputString("abc\n");

	}

	// Примеры использования замыкания
	// Обвязка замыкания
	public function testExample5() {
		$obj = new Foo();

		$cl = function () {
			return $this->a . $this->b . $this->c;
		};
		// создаст новый объект Closure, привяжет его к объекту $obj и
		// выставит область видимости private и protected класс Foo
		$cl1 = $cl->bindTo($obj, Foo::class);

		$result = $cl1();
		$this->assertTrue($result === "abc");

		//забайндит объект obj для функции cl и областью видимости Foo2
		$cl1_2 = $cl->bindTo($obj, Foo2::class);

		$this->expectErrorMessage("Cannot access private property Tests\Feature\PHP74\Foo::\$c");
		$cl1_2();
	}

	// Использование и вызов обвязок статически
	public function testExample6() {
		$obj = new Foo();

		$cl = function () {
			return $this->a . $this->b . $this->c;
		};

		// то-же самое, но статически
		// Разница bind() и bindTo() в том, что bindTo() - это метод инстанцированного класса Closure, а bind() - статический его метод.
		$cl2 = Closure::bind($cl, $obj, Foo::class);
		$result = $cl2();
		$this->assertTrue($result === "abc");

		$cl2_2 = Closure::bind($cl, $obj, Foo2::class);
		$this->expectErrorMessage("Cannot access private property Tests\Feature\PHP74\Foo::\$c");
		$cl2_2();
	}

	// Обьвязка замыкания
	public function testExample7() {
		// создаст новый Closure, привяжет к нему public объекта $obj,
		// private и protected же останутся текущими. так как не указаны области видимости (второй аргумент
		$obj = new Foo();

		$cl = function () {
			return $this->a . $this->b . $this->c;
		};
		$cl3 = $cl->bindTo($obj);
		$this->expectErrorMessage("Cannot access protected property Tests\Feature\PHP74\Foo::\$b");
		$cl3();

	}

}

class Number {
	private $v;
	private static $sv = 10;

	public function __construct($v) {
		$this->v = $v;
	}

	public function mul() {
		return static function ($x) {
			return isset($this) ? $this->v * $x : self::$sv * $x;
		};
	}
}


class A {
	public $a = 1;

	public function __construct($a) {
		$this->a = $a;
	}

	public function mul() {
		return function ($x) {
			return $this->a * $x;
		};
	}
}


class Foo {
	public $a = "a";
	protected $b = "b";
	private $c = "c";
}

class Foo2 extends Foo {

}





