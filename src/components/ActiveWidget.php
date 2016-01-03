<?php

namespace flex\components;

use flex\components\collection\Actions;
use flex\components\elements\Action;

/**
 * Class ActiveWidget
 * @package flex\components
 */
abstract class ActiveWidget extends FlexWidget
{
    /**
     * @var bool|Actions
     */
    public $actions = false;

    /**
     * @return bool
     */
    public function hasActions()
    {
        return $this->actions === false || ($this->actions instanceof Actions && count($this->actions) > 0);
    }

    /**
     * @return Action[]
     */
    public function getActions()
    {
        if ($this->actions === false) {
            $this->actions = new Actions([], '');
        }
        return $this->actions->getActions();
    }
}
