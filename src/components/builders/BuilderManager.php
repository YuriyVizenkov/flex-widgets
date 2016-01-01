<?php

namespace flex\components\builders;

use flex\components\ClientManager;
use flex\components\interfaces\IClientManager;

/**
 * Class BuilderManager
 * @package flex\components\builders
 */
class BuilderManager
{
    /**
     * @return IClientManager
     */
    public function getClientManager()
    {
        $clientManager = new ClientManager();

        return $clientManager;
    }
}
