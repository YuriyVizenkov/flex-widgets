<?php

namespace flex\components\interfaces;

/**
 * Interface IClientManager
 * @package flex\components\interfaces
 */
interface IClientManager
{
    /**
     * @param array $scripts
     */
    public function registerCore(array $scripts = []);

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

    /**
     * @return string
     */
    public function getAppUrl();

    /**
     * @return string
     */
    public function getFlexAssetsImage();

    /**
     * @return string
     */
    public function getFlexAssetsJs();

    /**
     * @return string
     */
    public function getFlexAssetCss();
}
