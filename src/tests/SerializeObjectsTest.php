<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class SerializeObjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $obj = new B([1,2,3,4,5]);

        $ser = serialize($obj);
        $ser = unserialize($ser);

        $this->assertTrue($ser->arr === [
                1, 2, 3, 4, 5
            ]);

    }
}



//class A implements \Serializable {
//
//    private array $arr;
//
//    public function __construct(array $arr = []) {
//        $this->arr = $arr;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function serialize() {
//        return $this->arr;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function unserialize($serialized) {
//        $this->arr = unserialize($serialized);
//    }
//}

class B {

    public array $arr = [];

    public function __construct(array $arr = []) {
        $this->arr = $arr;
    }

    public function __sleep() {
        return ["arr"];
    }

    public function __wakeup() {
//        $this->arr = [1,2,3];
    }

}
