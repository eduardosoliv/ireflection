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
use ESO\IReflection\Tests\Models\ModelA;

/**
 * ReflClassTest
 */
class ReflClassTest extends TestCase
{
    public function testGetPropertyValue()
    {
        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');
        $this->assertEquals(
            $modelA->prop1,
            ReflClass::create($modelA)->getPropertyValue('prop1')
        );
    }

    public function testGetPropertyValueNoObject()
    {
        $modelAClassName = $this->getModelClassName('A');
        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');
        $this->assertEquals(
            $modelA->prop1,
            ReflClass::create($modelAClassName)->getPropertyValue('prop1', $modelA)
        );
    }

    public function testSetPropertyValue()
    {
        $newValue = 30;

        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');

        ReflClass::create($modelA)->setPropertyValue('prop1', $newValue);
        $this->assertEquals($newValue, $modelA->prop1);
    }

    public function testSetPropertyValueNoObject()
    {
        $newValue = 30;

        $modelAClassName = $this->getModelClassName('A');
        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');

        ReflClass::create($modelAClassName)->setPropertyValue('prop1', $newValue, $modelA);
        $this->assertEquals($newValue, $modelA->prop1);
    }

    public function testGetAnyPropertyValuePublicProperty()
    {
        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');
        $this->assertEquals(
            $modelA->prop1,
            ReflClass::create($modelA)->getAnyPropertyValue('prop1')
        );
    }

    public function testGetAnyPropertyValueProtectedProperty()
    {
        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');
        $this->assertEquals(
            $modelA->getProp2(),
            ReflClass::create($modelA)->getAnyPropertyValue('prop2')
        );
    }

    public function testSetAnyPropertyValuePublicProperty()
    {
        $newValue = 30;

        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');

        ReflClass::create($modelA)->setAnyPropertyValue('prop1', $newValue);

        $this->assertEquals($newValue, $modelA->prop1);
    }

    public function testSetAnyPropertyValueprotectedProperty()
    {
        $newValue = 40;

        /** @var ModelA $modelA */
        $modelA = $this->getModel('A');

        ReflClass::create($modelA)->setAnyPropertyValue('prop2', $newValue);

        $this->assertEquals($newValue, $modelA->getProp2());
    }
}
