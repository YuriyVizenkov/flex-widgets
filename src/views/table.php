<?php
/**
 * @var $this \flex\widgets\TableWidget
 * @var $columns array
 * @var $list IElement[]
 */

use flex\components\elements\Action;
use flex\components\interfaces\IElement;
?>
<table class="table">

    <thead>
        <tr>
            <?php foreach ($columns as $column) : ?>
                <th><?= $column; ?></th>
            <?php endforeach; ?>

            <?php if ($this->hasActions()) :  ?>
                <th>Действия</th>
            <?php endif; ?>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($list as $item) :
        if (!$item instanceof IElement) {
            throw new \flex\components\exceptions\NotImplementInterfaceException('Element must by `IElement` implement interface');
        }
        ?>
        <tr class="<?= $item->getElementType(); ?>">
            <?php foreach ($columns as $column) :
                $call = $column;
                if ($column instanceof \flex\components\elements\ActiveColumn) {
                    $call = $column->getCall();
                }
                ?>
                <td><?= $item->$call; ?></td>
            <?php endforeach; ?>

            <?php if ($this->hasActions()) :  ?>
                <td>
                    <?php
                    /* @var $action Action */
                    foreach ($this->getActions() as $action) : ?>
                        <a href="<?= $action->getUrl(); ?>"><img src="<?= $action->getImage(); ?>"></a>
                    <?php endforeach; ?>
                </td>
            <?php endif; ?>

        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
