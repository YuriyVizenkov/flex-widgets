<?php

namespace flex\components\interfaces;

/**
 * Interface IAction
 * @package flex\components\interfaces
 */
interface IAction
{
    /**
     * @return string
     */
    public function getImage();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getUrl();
}
