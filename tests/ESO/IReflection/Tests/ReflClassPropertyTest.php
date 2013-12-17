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
class ReflClassPropertyTest extends TestCase
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

    public function testSetPropertyValue()
    {
        $newValue = 30;
        $model = $this->getModel();

        ReflClass::create($model)->setPropertyValue('prop1', $newValue);
        $this->assertEquals($newValue, $model->prop1);
    }

    public function testSetPropertyValueNoObject()
    {
        $newValue = 30;
        $modelClassName = $this->getModelClassName();
        $model = $this->getModel();

        ReflClass::create($modelClassName)->setPropertyValue('prop1', $newValue, $model);
        $this->assertEquals($newValue, $model->prop1);
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

    public function testSetAnyPropertyValuePublicProperty()
    {
        $newValue = 30;
        $model = $this->getModel();

        ReflClass::create($model)->setAnyPropertyValue('prop1', $newValue);

        $this->assertEquals($newValue, $model->prop1);
    }

    public function testSetAnyPropertyValueProtectedProperty()
    {
        $newValue = 40;
        $model = $this->getModel();

        ReflClass::create($model)->setAnyPropertyValue('prop2', $newValue);
        $this->assertEquals($newValue, $model->getProp2());
    }

    public function testSetAnyPropertiesValues()
    {
        $model = $this->getModel();

        ReflClass::create($model)->setAnyPropertiesValues(array('prop1' => 20, 'prop2' => 30));

        $this->assertEquals(20, $model->prop1);
        $this->assertEquals(30, $model->getProp2());
    }

    public function testSetChaining()
    {
        $model = $this->getModel();

        ReflClass::create($model)->setPropertyValue('prop1', 30)
                                 ->setAnyPropertyValue('prop2', 40);

        $this->assertEquals(30, $model->prop1);
        $this->assertEquals(40, $model->getProp2());
    }

    public function testSetGetAnyStaticPropertyValue()
    {
        $newValue = 10;
        $refl = ReflClass::create($this->getModelClassName());
        $this->assertEquals(5, $refl->getAnyStaticPropertyValue('prop3'));
        $refl->setAnyStaticPropertyValue('prop3', $newValue);
        $this->assertEquals($newValue, $refl->getAnyStaticPropertyValue('prop3'));
    }

    /**
     * @return ModelProperty
     */
    protected function getModel()
    {
        return $this->getModelByName('property');
    }

    /**
     * @return string
     */
    public function getModelClassName()
    {
        return $this->getModelClassNameByName('property');
    }
}
