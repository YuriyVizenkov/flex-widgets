<?php

namespace flex\components\collection;

use flex\components\builders\ActionBuilder;
use flex\components\elements\Action;

class Actions implements \Countable
{
    /**
     * @var array
     */
    protected $actionsTypes = [];

    /**
     * @var string
     */
    protected $baseUrl = '';

    /**
     * @var Action[]
     */
    protected $actions = [];

    /**
     * @param array $types
     * @param string $baseUrl
     */
    public function __construct(array $types = [], $baseUrl = '')
    {
        $this->actionsTypes = $types;
        $this->baseUrl = $baseUrl;

        $this->init();
    }

    protected function init()
    {
        $builderAction = new ActionBuilder();
        foreach ($this->actionsTypes as $actionType) {
            $this->actions[] = $builderAction->getAction($actionType, $this->baseUrl);
        }
    }

    /**
     * @return Action[]
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @return bool
     */
    public function count()
    {
        return count($this->actionsTypes) > 0;
    }
}
