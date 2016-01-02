<?php
/**
 * bootstrap widget configs
 *
 * @author Greg
 * @package
 */

/**
 * @param $title
 * @param $content
 * @param \flex\components\interfaces\IClientManager $clientManager
 */
function render($title, $content, \flex\components\interfaces\IClientManager $clientManager)
{
    require_once(__DIR__ . '/../layouts/main.php');
}

require_once(__DIR__ . '/../vendor/autoload.php');

$clientManager = new \flex\components\ClientManager();
$clientManager->registerCore();

\flex\components\FlexWidget::setClientManager($clientManager);