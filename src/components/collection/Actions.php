<?php

namespace flex\components\collection;

use flex\components\builders\ActionBuilder;
use flex\components\elements\Action;
use flex\components\interfaces\IAction;
use flex\components\interfaces\IActions;

class Actions implements IActions
{
    /**
     * @var array
     */
    protected $actionsTypes = [];

    /**
     * @var Action[]
     */
    protected $actions = [];

    /**
     * @param array $types
     */
    public function __construct(array $types = [])
    {
        $this->actionsTypes = $types;

        $this->init();
    }

    protected function init()
    {
        $builderAction = new ActionBuilder();
        foreach ($this->actionsTypes as $action) {
            if ($action instanceof IAction) {
                $this->actions[] = $action;
            } else {
                $this->actions[] = $builderAction->getAction($action);
            }
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
        return count($this->actions);
    }
}
