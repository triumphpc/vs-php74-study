<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class UnpackingOperatorInArrayTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $arrayA = [1, 2, 3];
        $arrayB = [4, 5];
        $result = [0, ...$arrayA, ...$arrayB, 6 ,7];

        $this->assertTrue($result === [
                0, 1, 2, 3, 4, 5, 6, 7
            ]);

    }
}
