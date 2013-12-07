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

use ESO\IReflection\Tests\Models\ModelMethod;
use ESO\IReflection\ReflClass;

/**
 * ReflClassMethodTest
 */
class ReflClassMethodTest extends TestCase
{
    public function testInvokeMethod()
    {
        $model = $this->getModel();

        $this->assertEquals($model->get(), ReflClass::create($model)->invokeMethod('get'));
    }

    public function testInvokeMethodWithArgs()
    {
        $this->assertEquals(7, ReflClass::create($this->getModel())->invokeMethod('sub', array(10, 3)));
    }

    public function testInvokeAnyMethodPublic()
    {
        $model = $this->getModel();

        $this->assertEquals($model->get(), ReflClass::create($model)->invokeAnyMethod('get'));
    }

    public function testInvokeAnyMethodPublicWithArgs()
    {
        $this->assertEquals(7, ReflClass::create($this->getModel())->invokeAnyMethod('sub', array(10, 3)));
    }

    public function testInvokeAnyMethodProtectedWithArgs()
    {
        $this->assertEquals(13, ReflClass::create($this->getModel())->invokeAnyMethod('sum', array(10, 3)));
    }

    /**
     * @return ModelMethod
     */
    protected function getModel()
    {
        return $this->getModelByName('method');
    }

    /**
     * @return string
     */
    public function getModelClassName()
    {
        return $this->getModelClassNameByName('method');
    }
}
