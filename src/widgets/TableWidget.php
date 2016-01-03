<?php

namespace flex\widgets;

use flex\components\FlexWidget;
use flex\components\interfaces\IElement;

/**
 * Class TableWidget
 * @package flex\widgets
 */
class TableWidget extends FlexWidget
{
    /**
     * @var IElement[]
     */
    public $list = [];

    /**
     * @var array
     */
    public $columns = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->render(
            'table',
            [
                'list' => $this->list,
                'columns' => $this->columns
            ]
        );
    }
}
