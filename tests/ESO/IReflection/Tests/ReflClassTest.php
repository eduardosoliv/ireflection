<?php

/*
 * This file is a part of the IReflection library.
 *
 * (c) 2013 Eduardo Oliveira <entering@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ESO\IReflection\Tests;

use ESO\IReflection\ReflClass;
use ESO\IReflection\Tests\Models\ClassA;

/**
 * ReflClassTest
 */
class ReflClassTest extends TestCase
{
    public function testGetPropertyValue()
    {
        /** @var ClassA $modelA */
        $modelA = $this->getModel('A');
        $this->assertEquals($modelA->a, ReflClass::create($modelA)->getPropertyValue('a'));
    }
}
