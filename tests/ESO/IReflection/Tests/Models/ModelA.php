<?php

/*
 * This file is a part of the IReflection library.
 *
 * (c) 2013 Eduardo Oliveira <entering@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ESO\IReflection\Tests\Models;

/**
 * ModelA
 */
class ModelA
{
    public $prop1 = 5;
    protected $prop2 = 6;

    public function getProp2()
    {
        return $this->prop2;
    }
}