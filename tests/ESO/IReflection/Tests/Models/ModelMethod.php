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
 * ModelMethod, a model to tests methods access.
 */
class ModelMethod
{
    /**
     * @return int
     */
    public function get()
    {
        return 5;
    }

    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    public function sub($a, $b)
    {
        return $a - $b;
    }

    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    protected function sum($a, $b)
    {
        return $a + $b;
    }
}
