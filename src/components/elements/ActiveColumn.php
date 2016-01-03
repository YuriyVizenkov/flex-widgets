<?php

namespace flex\components\elements;

use flex\components\SetPropertiesBehavior;

/**
 * Class ActiveColumn
 * @package flex\components
 */
class ActiveColumn
{
    use SetPropertiesBehavior;

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
        $this->setProperties($properties);
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
