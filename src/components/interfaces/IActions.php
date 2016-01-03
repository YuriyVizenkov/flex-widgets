<?php

namespace flex\components\interfaces;

/**
 * Interface IActions
 * @package flex\components\interfaces
 */
interface IActions extends \Countable
{
    /**
     * @return IAction[]
     */
    public function getActions();

    /**
     * @return int
     */
    public function count();
}
