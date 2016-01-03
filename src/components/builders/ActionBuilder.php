<?php

namespace flex\components\builders;

use flex\components\elements\Action;

/**
 * Class ActionBuilder
 * @package flex\components\builders
 */
class ActionBuilder
{
    /**
     * @param string $type
     * @param string $baseUrl
     * @return Action
     */
    public function getAction($type, $baseUrl)
    {

        return new Action(
            [
                'type' => $type,
                'url' => $this->getUrl($type, $baseUrl),
                'image' => $this->getImage($type),
                'name' => $type
            ]
        );
    }

    /**
     * @param string $type
     * @param string $baseUrl
     * @return string
     */
    protected function getUrl($type, $baseUrl)
    {
        return $baseUrl . '/' . $type;
    }

    /**
     * @param string $type
     * @return string
     */
    protected function getImage($type)
    {
        return '/assets/images/' . $type . '.png';
    }
}
