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
     * @param string|object $argument Either a string containing the name of the class to reflect, or an object.
     */
    public function __construct($argument)
    {
        parent::__construct($argument);

        if (is_object($argument)) {
            $this->object = $argument;
        }
    }

    /**
     * @param string|object $argument Either a string containing the name of the class to reflect, or an object.
     *
     * @return ReflClass
     */
    public static function create($argument)
    {
        return new static($argument);
    }

    /**
     * Gets value from property.
     *
     * @param string      $name   Property name
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     *
     * @return mixed Property value
     */
    public function getPropertyValue($name, $object = null)
    {
        return $this->getProperty($name)->getValue($this->getObject($object));
    }

    /**
     * Set property value
     *
     * @param string      $name   Property name
     * @param mixed       $value  The new value to set
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     */
    public function setPropertyValue($name, $value, $object = null)
    {
        $this->getProperty($name)->setValue($this->getObject($object), $value);
    }

    /**
     * Get property value in any case, if the property is not accessible, it will change the accessibility and restore
     * it before return.
     *
     * @param string      $name   Property name
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     *
     * @return mixed Property value
     */
    public function getAnyPropertyValue($name, $object = null)
    {
        $property = $this->getProperty($name);

        $changedAccessibility = false;
        if (!$property->isPublic()) {
            $property->setAccessible(true);
            $changedAccessibility = true;
        }

        $value = $property->getValue($this->getObject($object));

        if ($changedAccessibility) {
            $property->setAccessible(false);
        }

        return $value;
    }

    /**
     * Set property value in any case, if the property is not accessible, it will change the accessibility and restore
     * it before return.
     *
     * @param string      $name
     * @param mixed       $value  The new value to set
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     */
    public function setAnyPropertyValue($name, $value, $object = null)
    {
        $property = $this->getProperty($name);

        $changedAccessibility = false;
        if (!$property->isPublic()) {
            $property->setAccessible(true);
            $changedAccessibility = true;
        }

        $property->setValue($this->getObject($object), $value);

        if ($changedAccessibility) {
            $property->setAccessible(false);
        }
    }

    /**
     * @param string      $name   Method name
     * @param array       $args   The parameters to be passed to the function, as an array
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     *
     * @return mixed
     */
    public function invokeMethod($name, array $args = array(), $object = null)
    {
        return $this->getMethod($name)->invokeArgs($this->getObject($object), $args);
    }

    /**
     * Invoke method in any case, if the method is not accessible, it will change the accessibility and restore
     * it before return.
     *
     * @param string      $name   Method name
     * @param array       $args   The parameters to be passed to the function, as an array
     * @param object|null $object If object was not given at construction time, it needs to be passed here
     *
     * @return mixed
     */
    public function invokeAnyMethod($name, array $args = array(), $object = null)
    {
        $method = $this->getMethod($name);

        $changedAccessibility = false;
        if (!$method->isPublic()) {
            $method->setAccessible(true);
            $changedAccessibility = true;
        }

        $value = $method->invokeArgs($this->getObject($object), $args);

        if ($changedAccessibility) {
            $method->setAccessible(false);
        }

        return $value;
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
