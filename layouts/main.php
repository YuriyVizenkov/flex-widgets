<?php
/**
 * @var $title string
 * @var $clientManager \flex\components\ClientManager
 * @var $content string
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>

    <?php $clientManager->includeCSS(); ?>
    <?php $clientManager->includeJS(); ?>

    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
    </style>
</head>
<body>
<div class="bs-example">
    <?= $content; ?>
</div>
</body>
</html>  