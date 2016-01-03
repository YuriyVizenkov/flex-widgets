<?php
/**
 * Example grid widget
 *
 * @author Greg
 * @package examples
 */

use flex\components\collection\Actions;
use flex\components\elements\Action;
use flex\components\elements\ActiveColumn;
use flex\components\enums\TypeElementEnum;
use flex\widgets\TableWidget;

require_once(__DIR__.'/bootstrap.php');

$one = new \flex\components\Item();
$one->row = 1;
$one->bill = 'Credit Card';
$one->payment_date = '04/07/2014';
$one->payment_status = 'Call in to confirm';
$one->type = TypeElementEnum::ACTIVE;

$two = new \flex\components\Item();
$two->row = 2;
$two->bill = 'Water';
$two->payment_date = '01/07/2014';
$two->payment_status = 'Paid';
$two->type = TypeElementEnum::SUCCESS;

$three = new \flex\components\Item();
$three->row = 3;
$three->bill = 'Internet';
$three->payment_date = '05/07/2014';
$three->payment_status = 'Change plan';
$three->type = TypeElementEnum::INFO;

$four = new \flex\components\Item();
$four->row = 4;
$four->bill = 'Electricity';
$four->payment_date = '03/07/2014';
$four->payment_status = 'Pending';
$four->type = TypeElementEnum::WARNING;

$five = new \flex\components\Item();
$five->row = 5;
$five->bill = 'Telephone';
$five->payment_date = '06/07/2014';
$five->payment_status = 'Due';
$five->type = TypeElementEnum::DANGER;

$content = TableWidget::widget(
    [
        'list' => [$one, $two, $three, $four, $five],
        'columns' => [
            new ActiveColumn(['title' => 'Row', 'call' => 'row']),
            new ActiveColumn(['title' => 'Bill', 'call' => 'bill']),
            new ActiveColumn(['title' => 'Payment Date', 'call' => 'payment_date']),
            new ActiveColumn(['title' => 'Payment Status', 'call' => 'payment_status']),
        ],
        'actions' => new Actions([Action::DELETE, Action::EDIT, Action::VIEW], '/')
    ]
);

render('Example of Bootstrap 3 Tables with Borders', $content, TableWidget::$clientManager);