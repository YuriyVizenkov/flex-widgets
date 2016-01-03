<?php

namespace flex\components;

/**
 * Class ActiveColumn
 * @package flex\components
 */
class ActiveColumn
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $call = '';

    public function __construct(array $properties)
    {
        foreach ($properties as $prop => $value) {
            if (property_exists($this, $prop)) {
                $this->$prop = $value;
            }
        }
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCall()
    {
        return $this->call;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}
