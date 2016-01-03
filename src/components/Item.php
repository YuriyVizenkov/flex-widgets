<?php

namespace flex\components;

use flex\components\interfaces\IElement;

/**
 * Class Item
 * @package flex\components
 */
class Item implements IElement
{
    protected $properties = [];

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        } elseif (isset($this->properties[$name])) {
            return $this->properties[$name];
        } else {
            return null;
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * @return string
     */
    public function getElementType()
    {
        return (isset($this->properties['type'])) ? $this->properties['type'] : '';
    }

    /**
     * @return string
     */
    public function  __toString()
    {
        return get_class($this);
    }
}
