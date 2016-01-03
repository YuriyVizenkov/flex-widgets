<?php

namespace flex\components;

use flex\components\collection\Actions;
use flex\components\interfaces\IAction;

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
        return ($this->actions instanceof Actions && count($this->actions) > 0);
    }

    /**
     * @return IAction[]
     */
    public function getActions()
    {
        if ($this->actions === false) {
            $this->actions = new Actions([], '');
        }
        return $this->actions->getActions();
    }
}
