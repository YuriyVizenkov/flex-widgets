<?php

namespace flex\components;

/**
 * Class SetPropertiesBehavior
 * @package flex\components
 */
trait SetPropertiesBehavior
{
    /**
     * @param array $properties
     */
    protected function setProperties(array $properties = [])
    {
        foreach ($properties as $prop => $value) {
            if (property_exists($this, $prop)) {
                $this->$prop = $value;
            }
        }
    }
}
