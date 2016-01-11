<?php

namespace flex\components\builders;

use flex\components\elements\Action;
use flex\components\FlexWidget;

/**
 * Class ActionBuilder
 * @package flex\components\builders
 */
class ActionBuilder
{
    /**
     * @param string $type
     * @return Action
     */
    public function getAction($type)
    {
        return new Action(
            [
                'type' => $type,
                'url' => $this->getActionUrl($type),
                'image' => $this->getImageUrl($type),
                'name' => $type
            ]
        );
    }

    /**
     * @param string $type
     * @return string
     */
    protected function getActionUrl($type)
    {
        return  $this->genActionUrl($type);
    }

    /**
     * @param string $type
     * @return string
     */
    protected function getImageUrl($type)
    {
        return $this->getClientManager()->getFlexAssetsImage() . $type . '.png';
    }

    /**
     * @return \flex\components\interfaces\IClientManager
     */
    protected function getClientManager()
    {
        return FlexWidget::$clientManager;
    }

    /**
     * @param string $type
     * @return string
     */
    protected function genActionUrl($type)
    {
        $url = $this->getFullUrl();

        if (mb_strpos($url, '?') === false) {
            $url .= '?';
        } else {
            $url .= '&';
        }

        $url .= 'action=' . $type;

        return $url;
    }

    /**
     * @return string
     */
    protected function getFullUrl()
    {
        return 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
}
