<?php

namespace Tests\Feature\PHP74;

use PHPUnit\Framework\TestCase;
use WeakReference;

class WeakReferencesTest extends TestCase
{
    /**
     * Слабые ссылки позволяют сохранить ссылку на объект, которая не препятствует уничтожению этого объекта.
     * Например, они полезны для реализации кэш-подобных структур.
     *
     * @return void
     */
    public function testExample()
    {
        $obj = new \stdClass();
        $weakref = WeakReference::create($obj);
        $this->assertTrue($weakref->get() instanceof \stdClass);
        unset($obj);
        $this->assertTrue($weakref->get() == null);
    }
}
