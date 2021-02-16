<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;

class CovariantAndContravariantExtendsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
    	$this->assertTrue(true);
    }


}

/**
 * Пример контравариантного аргумента:
 *
 * Interface Concatable
 * @package Tests\Feature\PHP74
 */
interface Concatable {
    function concat(\Iterator $input);

}

class Collection implements Concatable {
    function concat(iterable $input) {/* . . . */}
}


/**
 * Пример использования ковариантного возвращаемого типа:
 *
 * Interface Factory
 * @package Tests\Feature\PHP74
 */
interface Factory {
    function make(): object ;
}

class UserFactory implements Factory {

    function make(): User {
        return new User();
    }
}
class User {

}
