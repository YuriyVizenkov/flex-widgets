<?php

namespace flex\components\interfaces;

/**
 * Interface IElement
 * @package flex\components\interfaces
 */
interface IElement
{
    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name);

    /**
     * @return string
     */
    public function  __toString();

    /**
     * @return string
     */
    public function getElementType();
}
