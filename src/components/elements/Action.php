<?php

namespace flex\components\elements;

use flex\components\interfaces\IAction;
use flex\components\SetPropertiesBehavior;

/**
 * Class Action
 * @package flex\components\elements
 */
class Action implements IAction
{
    use SetPropertiesBehavior;

    const VIEW = 'view';
    const UPDATE = 'update';
    const DELETE = 'delete';

    /**
     * @var string
     */
    protected $image = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $url = '';

    /**
     * @var string
     */
    protected $type = '';

    public function __construct(array $properties = [])
    {
        $this->setProperties($properties);
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
