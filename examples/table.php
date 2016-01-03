<?php
/**
 * Example grid widget
 *
 * @author Greg
 * @package examples
 */

use flex\components\enums\TypeElementEnum;
use flex\widgets\TableWidget;

require_once(__DIR__.'/bootstrap.php');

$one = new \flex\components\Item();
$one->Row = 1;
$one->Bill = 'Credit Card';
$one->PaymentDate = '04/07/2014';
$one->PaymentStatus = 'Call in to confirm';
$one->type = TypeElementEnum::ACTIVE;

$two = new \flex\components\Item();
$two->Row = 2;
$two->Bill = 'Water';
$two->PaymentDate = '01/07/2014';
$two->PaymentStatus = 'Paid';
$two->type = TypeElementEnum::SUCCESS;

$three = new \flex\components\Item();
$three->Row = 3;
$three->Bill = 'Internet';
$three->PaymentDate = '05/07/2014';
$three->PaymentStatus = 'Change plan';
$three->type = TypeElementEnum::INFO;

$four = new \flex\components\Item();
$four->Row = 4;
$four->Bill = 'Electricity';
$four->PaymentDate = '03/07/2014';
$four->PaymentStatus = 'Pending';
$four->type = TypeElementEnum::WARNING;

$five = new \flex\components\Item();
$five->Row = 5;
$five->Bill = 'Telephone';
$five->PaymentDate = '06/07/2014';
$five->PaymentStatus = 'Due';
$five->type = TypeElementEnum::DANGER;

$content = TableWidget::widget(
    [
        'columns' => [
            'Row',
            'Bill',
            'PaymentDate',
            'PaymentStatus'
        ],
        'list' => [$one, $two, $three, $four, $five]
    ]
);

render('Example of Bootstrap 3 Tables with Borders', $content, TableWidget::$clientManager);