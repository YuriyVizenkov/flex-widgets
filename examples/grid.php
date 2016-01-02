<?php
/**
 * Example grid widget
 *
 * @author Greg
 * @package examples
 */

use flex\widgets\GridWidget;

require_once(__DIR__.'/bootstrap.php');

$content = GridWidget::widget([]);

render('Example of Bootstrap 3 Tables with Borders', $content, GridWidget::$clientManager);