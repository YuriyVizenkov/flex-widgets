<?php

namespace flex\components;

use flex\components\interfaces\IClientManager;

/**
 * Class ClientManager
 * @package flex\components
 */
class ClientManager implements IClientManager
{
    /**
     * @var string
     */
    protected $APP_URL = '';


    /**
     * @var string
     */
    protected $assetsJS = '';

    /**
     * @var string
     */
    protected $assetsCSS = '';

    /**
     * @var array
     */
    protected static $packageJS = array();

    /**
     * @var array
     */
    protected static $packageCSS = array();

    /**
     * @param bool|string $baseUrl
     */
    public function __construct($baseUrl = false)
    {
        $this->APP_URL = ($baseUrl === false) ? $_SERVER['HTTP_HOST'] : $baseUrl;

        $this->assetsJS = 'http://' . $this->APP_URL;
    }

    /**
     * @param array $scripts
     */
    public function registerCore(array $scripts = [])
    {
        foreach ($scripts as $type => $s)
        {
            if (is_array($s)) {
                foreach ($s as $url) {
                    if ($type === 'css') {
                        $this->registerCSS($url);
                    } elseif ($type === 'js') {
                        $this->registerJS($url);
                    }
                }
            }
        }
    }

    /**
     * @param string $newAssetsJS
     */
    public function setAssetsJS($newAssetsJS)
    {
        $this->assetsJS = $newAssetsJS;
    }

    /**
     * @return string
     */
    public function getAppUrl()
    {
        return $this->APP_URL;
    }

    /**
     * @param string $file
     * @param array $params
     */
    public function registerJS($file, $params = array())
    {
        if (!isset(self::$packageJS[$file])) {
            self::$packageJS[$file] = $this->makeJSTag($file, $params);
        }
    }

    /**
     * @param string $file
     * @param array $params
     * @param bool $isIncludeAssets
     * @return string
     */
    private function makeJSTag($file, array $params = array(), $isIncludeAssets = true)
    {
        $assets = ($isIncludeAssets === true) ? $this->assetsJS : '';
        $tag = '<script type="text/javascript" src="' . $assets . $file . '.js" {params}></script>';

        $paramsString = '';
        foreach ($params as $attribute => $value) {
            $paramsString .= $attribute . '="' . $value . '"';
        }

        return str_replace('{params}', $paramsString, $tag);
    }

    /**
     * @param string $file
     * @param array $params
     */
    public function registerCSS($file, $params = array())
    {
        if (!isset(self::$packageCSS[$file])) {
            self::$packageCSS[$file] = $this->makeCSSTag($file, $params);
        }
    }

    /**
     * @return void
     */
    public function includeJS()
    {
        $result = '';
        foreach (self::$packageJS as $file => $script) {
            $result .= $script . "\r\n";
        }

        echo $result;
    }

    /**
     * @return void
     */
    public function includeCSS()
    {
        $result = '';
        foreach (self::$packageCSS as $file => $css) {
            $result .= $css . "\r\n";
        }

        echo $result;
    }

    /**
     * @param string $file
     * @param array $params
     * @param bool $isIncludeAssets
     * @return mixed
     */
    private function makeCSSTag($file, array $params, $isIncludeAssets = true)
    {
        $assets = ($isIncludeAssets === true) ? $this->assetsCSS : '';
        $tag = '<link rel="stylesheet" type="text/css" href="' . $assets . $file . '.css" {params}>';

        $paramsString = '';
        foreach ($params as $attribute => $value) {
            $paramsString .= $attribute . '="' . $value . '"';
        }

        return str_replace('{params}', $paramsString, $tag);
    }
}
