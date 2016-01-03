<?php
/**
 * @var $this \flex\widgets\TableWidget
 * @var $columns array
 * @var $list IElement[]
 */

use flex\components\elements\ActiveColumn;
use flex\components\interfaces\IAction;
use flex\components\interfaces\IElement;
?>
<table class="table <?= $this->getTableClasses(); ?>" <?= $this->getTableHtmlOptionsAsString(); ?>>

    <thead>
        <tr>
            <?php
            /* @var $column ActiveColumn */
            foreach ($columns as $column) : ?>
                <th <?= $column->getHtmlOptionsAsString(); ?>><?= $column; ?></th>
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
        <tr class="<?= $item->getElementType(); ?> <?= $this->getRowClasses(); ?>" <?= $this->getHtmlOptionsAsString(); ?>>
            <?php foreach ($columns as $column) :
                $call = $column;
                if ($column instanceof \flex\components\elements\ActiveColumn) {
                    $call = $column->getCall();
                }
                ?>
                <td <?= $column->getHtmlOptionsAsString(); ?>><?= $item->$call; ?></td>
            <?php endforeach; ?>

            <?php if ($this->hasActions()) :  ?>
                <td>
                    <?php
                    /* @var $action IAction */
                    foreach ($this->getActions() as $action) : ?>
                        <a href="<?= $action->getUrl(); ?>"><img src="<?= $action->getImage(); ?>"></a>
                    <?php endforeach; ?>
                </td>
            <?php endif; ?>

        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
