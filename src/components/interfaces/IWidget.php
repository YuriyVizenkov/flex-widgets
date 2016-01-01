<?php

namespace flex\components\interfaces;

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
}
