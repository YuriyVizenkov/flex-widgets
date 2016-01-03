<?php

namespace flex\components\collection;

use flex\components\builders\ActionBuilder;
use flex\components\elements\Action;
use flex\components\interfaces\IActions;

class Actions implements IActions
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
     * @var string
     */
    protected $imageUrl = '';

    /**
     * @var Action[]
     */
    protected $actions = [];

    /**
     * @param array $types
     * @param string $baseUrl
     * @param string $imageUrl
     */
    public function __construct(array $types = [], $baseUrl = '', $imageUrl = '')
    {
        $this->actionsTypes = $types;
        $this->baseUrl = $baseUrl;
        $this->imageUrl = $imageUrl;

        $this->init();
    }

    protected function init()
    {
        $builderAction = new ActionBuilder();
        foreach ($this->actionsTypes as $actionType) {
            $this->actions[] = $builderAction->getAction($actionType, $this->baseUrl, $this->imageUrl);
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
     * @return int
     */
    public function count()
    {
        return count($this->actionsTypes);
    }
}
