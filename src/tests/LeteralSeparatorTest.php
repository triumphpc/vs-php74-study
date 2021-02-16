<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class LeteralSeparatorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $intSeparator = 100_333_444_5555;

        $this->assertIsInt($intSeparator);


    }
}
