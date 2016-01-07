<?php
/**
/**
 * Example form widget
 *
 * @author Greg
 * @package
 */

require_once(__DIR__.'/bootstrap.php');

use flex\components\enums\TypeElementEnum;
use flex\widgets\FormWidget;

$model = new \flex\components\Item();
$model->row = 1;
$model->bill = 'Credit Card';
$model->email = '';
$model->payment_date = '04/07/2014';
$model->payment_status = 'Call in to confirm';
$model->type = TypeElementEnum::ACTIVE;

ob_start();
/* @var $formWidget FormWidget */
$formWidget = FormWidget::beginWidget();

    $formWidget->input($model, 'bill', 'Тип оплаты', ['placeholder' => 'Credit Card']);

    $formWidget->email($model, 'email', 'Email', ['placeholder' => 'Email', 'id' => 'inputEmail']);

    echo <<<EOF
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
EOF;
$formWidget->endWidget();
$content = ob_get_clean();

render('Example form widget', $content, FormWidget::$clientManager);