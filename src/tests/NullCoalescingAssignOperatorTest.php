<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

/**
 *
 * Оператор нулевого слияния (??) это логический оператор, который возвращает значение правого операнда
 * когда значение левого операнда равно null или undefined, в противном случае будет возвращено значение левого операнда.
 *
 * Class NullCoalescingAssignOperatorTest
 * @package Tests\Feature\PHP74
 */
class NullCoalescingAssignOperatorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data["data"] = 123;
        $data["data"] = $data["data"] ?? false;

        $this->assertIsInt($data["data"]);
        $this->assertTrue($data["data"] === 123);

        $data["data"] ??= false;

        $this->assertTrue($data["data"] === 123);

        $data["xxx"] ??= false;

        $this->assertTrue($data["xxx"] === false);

    }
}
