<?php

namespace flex\components\interfaces;

/**
 * Interface IRendering
 * @package flex\components\interfaces
 */
interface IRendering
{
    /**
     * @param $view
     * @param array $params
     * @param bool|false $isGetBuffer
     * @return void|string
     */
    public function render($view, array $params = [], $isGetBuffer = false);
}
