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
abstract class ReflClassPropertyTest extends TestCase
{
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
