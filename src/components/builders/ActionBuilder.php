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
     * @param string $imageUrl
     * @return Action
     */
    public function getAction($type, $baseUrl, $imageUrl)
    {

        return new Action(
            [
                'type' => $type,
                'url' => $this->getUrl($type, $baseUrl),
                'image' => $this->getImage($type, $imageUrl),
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
        return $type;
    }

    /**
     * @param string $type
     * @param string $imageUrl
     * @return string
     */
    protected function getImage($type, $imageUrl)
    {
        return ($imageUrl) ? $imageUrl . $type . '.png' : '/assets/images/' . $type . '.png';
    }
}
