<?php

namespace flex\widgets;

use flex\components\ActiveWidget;
use flex\components\elements\ActiveColumn;
use flex\components\interfaces\IElement;

/**
 * Class TableWidget
 * @package flex\widgets
 */
class TableWidget extends ActiveWidget
{
    /**
     * @var IElement[]
     */
    public $list = [];

    /**
     * @var ActiveColumn[]
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
