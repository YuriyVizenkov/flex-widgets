<?php

namespace flex\components;

use flex\components\exceptions\NotDefinedPropertyException;
use flex\components\exceptions\NotImplementInterfaceException;
use flex\components\interfaces\IWidget;
use flex\components\traits\UIDGenerator;

/**
 * Class FlexWidget
 *
 * @package flex\components
 */
abstract class FlexWidget implements IWidget
{
    use UIDGenerator;

    /**
     * @var string
     */
    public $uid = '';

    /**
     * @var string
     */
    protected $lang = '';

    /**
     * @var bool|int
     */
    public $cityId = false;

    /**
     * @var bool
     */
    public $isShow = null;

    public function __construct()
    {
        $this->uid = $this->genUuid();
        $this->init();
    }

    /**
     * @return void
     */
    public function init()
    {

    }

    /**
     * @param array $params
     * @return string
     * @throws NotImplementInterfaceException, NotDefinedPropertyException
     */
    public static function widget(array $params = [])
    {
        $nameWidget = get_called_class();
        $widget = new $nameWidget();

        if (!($widget instanceof IWidget)) {
            throw new NotImplementInterfaceException('Widget `' . $nameWidget . '` must be `IWidget` implement interface');
        }

        foreach ($params as $property => $value) {
            if (!property_exists($nameWidget, $property)) {
                throw new NotDefinedPropertyException(
                    'Property `' . $property . '` not defined in class widget `' . $nameWidget . '`'
                );
            }

            $widget->$property = $value;
        }

        $content = '';
        if ($widget->isShow()) {
            $widget->init();
            $widget->actionBeforeRun();
            ob_start();
            $widget->run();
            $content = ob_get_clean();
        }
        else {
            $widget->stop();
        }

        return $content;
    }

    /**
     * @param array $params
     * @return IWidget
     * @throws NotImplementInterfaceException, NotDefinedPropertyException
     */
    public static function beginWidget(array $params = [])
    {
        $nameWidget = get_called_class();
        $widget = new $nameWidget();

        if (!($widget instanceof IWidget)) {
            throw new NotImplementInterfaceException('Widget `' . $nameWidget . '` must be `IWidget` implement interface');
        }

        foreach ($params as $property => $value) {
            if (!property_exists($nameWidget, $property)) {
                throw new NotDefinedPropertyException(
                    'Property `' . $property . '` not defined in class widget `' . $nameWidget . '`'
                );
            }

            $widget->$property = $value;
        }

        ob_start();
        if ($widget->isShow()) {
            $widget->init();
            $widget->actionBeforeRun();
            $widget->run();
        } else {
            ob_clean();
            $widget->stop();
        }

        return $widget;
    }

    public function endWidget()
    {
        if ($this->isShow()) {
            $content = ob_get_clean();
            ob_start();
            $this->runEnd();
            $content .= ob_get_clean();

            echo $content;
        } else {
            ob_clean();
        }
    }

    protected function runEnd()
    {

    }

    /**
     * TODO: Реализовать
     * @param string $view
     * @param array $params
     * @param bool $isGetBuffer
     * @return string|void
     */
    public function render($view, array $params = [], $isGetBuffer = false)
    {
        return '';
    }

    /**
     * @return string
     */
    public function __toString(){
        return __CLASS__;
    }

    /**
     * @return bool
     */
    public function actionBeforeRun()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return '';
    }

    /**
     * @return bool
     */
    public function isShow()
    {
        return (is_null($this->isShow)) ? true : $this->isShow;
    }

    /**
     * @return void
     */
    public function stop(){}
}
