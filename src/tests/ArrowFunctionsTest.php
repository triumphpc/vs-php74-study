<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class ArrowFunctionsTest extends TestCase
{
    /**
     * Стрелочные функции
     *
     * @return void
     */
    public function testExample()
    {

        $array = [
            1,2,3,4,5
        ];

        $newArray = array_map(fn(int $element) => $element + 1, $array);

        $compare = [
            2,3,4,5,6
        ];

        $this->assertTrue($newArray == $compare);

    }
}
