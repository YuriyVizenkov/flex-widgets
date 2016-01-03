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

    /**
     * @var array
     */
    public $htmlOptions = [];

    /**
     * @var array
     */
    public $tableHtmlOptions = [];

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

    /**
     * @return string
     */
    public function getRowClasses()
    {
        return (isset($this->htmlOptions['class'])) ? $this->htmlOptions['class'] : '';
    }

    /**
     * @return string
     */
    public function getTableClasses()
    {
        return (isset($this->tableHtmlOptions['class'])) ? $this->tableHtmlOptions['class'] : '';
    }


    /**
     * @return string
     */
    public function getHtmlOptionsAsString()
    {
        $out = '';
        foreach ($this->htmlOptions as $option => $value) {
            if ($option !== 'class') {
                $out .= $option . '="' . $value . '"';
            }
        }
        return $out;
    }

    /**
     * @return string
     */
    public function getTableHtmlOptionsAsString()
    {
        $out = '';
        foreach ($this->tableHtmlOptions as $option => $value) {
            if ($option !== 'class') {
                $out .= $option . '="' . $value . '"';
            }
        }
        return $out;
    }
}
