<?php
/**
 * @var $columns array
 * @var $list IElement[]
 */

use flex\components\interfaces\IElement;
?>
<table class="table">

    <thead>
        <tr>
            <?php foreach ($columns as $column) : ?>
                <th><?= $column; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($list as $item) :
        if (!$item instanceof IElement) {
            throw new \flex\components\exceptions\NotImplementInterfaceException('Element must by `IElement` implement interface');
        }
        ?>
        <tr class="<?= $item->getElementType(); ?>">
            <?php foreach ($columns as $column) : ?>
                <td><?= $item->$column; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
