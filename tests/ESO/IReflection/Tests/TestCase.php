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

use PHPUnit_Framework_TestCase;

/**
 * TestCase
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @param string $name
     *
     * @return object
     */
    public function getModel($name)
    {
        $class = $this->getModelClassName($name);

        return new $class();
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function getModelClassName($name)
    {
        return sprintf('ESO\IReflection\Tests\Models\Model%s', $name);
    }
}
