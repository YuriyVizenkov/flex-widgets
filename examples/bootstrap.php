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

$coreScripts = [
    'css' => [
        '/src/assets/css/bootstrap.3.3.6.min',
        '/src/assets/css/bootstrap-theme.3.3.6.min'
    ],
    'js' => [
        '/src/assets/js/jquery.1.11.3.min',
        '/src/assets/js/bootstrap.3.3.6.min'
    ]
];

$clM = new \flex\components\ClientManager();
$clM->registerCore($coreScripts);

\flex\components\FlexWidget::setClientManager($clM);