<?php

namespace flex\components\interfaces;

/**
 * Interface IClientManager
 * @package flex\components\interfaces
 */
interface IClientManager
{
    /**
     * @return void
     */
    public function registerCoreJS();

    /**
     * @param string $file
     * @param array $params
     */
    public function registerJS($file, $params = array());

    /**
     * @param string $file
     * @param array $params
     */
    public function registerCSS($file, $params = array());
}
