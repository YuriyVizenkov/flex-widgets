<?php

namespace flex\components\interfaces;
use flex\components\exceptions\NotImplementInterfaceException;

/**
 * Interface IWidget
 * @package flex\components\interfaces
 */
interface IWidget extends IRendering
{
    /**
     * @return void
     */
    public function init();

    /**
     * @return void
     */
    public function run();

    /**
     * @return void
     */
    public function actionBeforeRun();

    /**
     * @return bool
     */
    public function isShow();

    /**
     * @return void
     */
    public function stop();

    /**
     * @return string
     */
    public function __toString();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param array $params
     * @return string
     * @throws NotImplementInterfaceException, NotDefinedPropertyException
     */
    public static function widget(array $params = []);

    /**
     * @param array $params
     * @return IWidget
     * @throws NotImplementInterfaceException, NotDefinedPropertyException
     */
    public static function beginWidget(array $params = []);

    /**
     * @return void
     */
    public function endWidget();
}
