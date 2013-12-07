<?php

/*
 * This file is a part of the IReflection library.
 *
 * (c) 2013 Eduardo Oliveira <entering@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ESO\IReflection;

/**
 * ReflClass
 *
 * @author Eduardo Oliveira <entering@gmail.com>
 */
class ReflClass extends \ReflectionClass
{
    /**
     * @var object|null
     */
    protected $object;

    /**
     * @param mixed $argument Either a string containing the name of the class to reflect, or an object.
     */
    public function __construct($argument)
    {
        parent::__construct($argument);

        if (is_object($argument)) {
            $this->object = $argument;
        }
    }

    /**
     * @return bool
     */
    protected function hasObject()
    {
        return is_object($this->object);
    }

    /**
     * @param mixed $argument
     *
     * @return ReflClass
     */
    public static function create($argument)
    {
        return new static($argument);
    }

    /**
     * Gets value from property
     *
     * @param string      $name   Property name
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     *
     * @return mixed
     */
    public function getPropertyValue($name, $object = null)
    {
        return $this->getProperty($name)->getValue($this->getObject($object));
    }

    /**
     * Set property value
     *
     * @param string     $name   Property name
     * @param mixed       $value  The value to set
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     */
    public function setPropertyValue($name, $value, $object = null)
    {
        $this->getProperty($name)->setValue($this->getObject($object), $value);
    }

    /**
     * @param object|null $object
     *
     * @return null|object
     */
    protected function getObject($object = null)
    {
        return !is_object($object) ? $this->object : $object;
    }
}
