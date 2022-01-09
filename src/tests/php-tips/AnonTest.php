<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class AnonTest extends TestCase
{
	// Примеры использования анонимных функций
	public function testExample() {
		$planets = ["Меркурий", "Венера", "Земля"];

		//вызов ананимной функции
		tabber(10, function(...$str){
			foreach ($str as $val) {
				echo $val."<br/>\n";
			}
		}, $planets);

		$this->expectOutputString("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Меркурий<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Венера<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Земля<br/>\n");
	}
}

//Анонимные функции
function tabber($spaces, $echo, $planets)
{
	$new = [];
	foreach ($planets as $planet) {
		$new[] = str_repeat("&nbsp;", $spaces).$planet;
	}
	$echo(...$new);
}

