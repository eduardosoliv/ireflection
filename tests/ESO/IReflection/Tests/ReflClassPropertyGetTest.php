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
use ESO\IReflection\Tests\Models\ModelProperty;

/**
 * ReflClassPropertyTest
 *
 * @author Eduardo Oliveira <entering@gmail.com>
 */
class ReflClassPropertyGetTest extends ReflClassPropertyTest
{
    public function testGetPropertyValue()
    {
        $model = $this->getModel();
        $this->assertEquals(
            $model->prop1,
            ReflClass::create($model)->getPropertyValue('prop1')
        );
    }

    public function testGetPropertyValueNoObject()
    {
        $modelClassName = $this->getModelClassName();
        $model = $this->getModel();
        $this->assertEquals(
            $model->prop1,
            ReflClass::create($modelClassName)->getPropertyValue('prop1', $model)
        );
    }

    public function testGetAnyPropertyValuePublicProperty()
    {
        $model = $this->getModel();
        $this->assertEquals(
            $model->prop1,
            ReflClass::create($model)->getAnyPropertyValue('prop1')
        );
    }

    public function testGetAnyPropertyValueProtectedProperty()
    {
        $model = $this->getModel();
        $this->assertEquals(
            $model->getProp2(),
            ReflClass::create($model)->getAnyPropertyValue('prop2')
        );
    }
}
