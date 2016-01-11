<?php

namespace flex\widgets;

use flex\components\ActiveWidget;
use flex\components\elements\ActiveField;
use flex\components\interfaces\IElement;

/**
 * Class FormWidget
 * @package flex\widgets
 */
class FormWidget extends ActiveWidget
{
    /**
     * @var string
     */
    public $action = '';

    /**
     * @var string
     */
    public $method = 'post';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->render(
            'form/main',
            [
                'action' => $this->action,
                'method' => $this->method
            ]
        );
    }

    protected function runEnd()
    {
        $this->render('form/end', []);
    }

    /**
     * @param IElement $el
     * @param string $property
     * @param string $label
     * @param array $htmlOptions
     * @return string|void
     */
    public function input(IElement $el, $property, $label = '', array $htmlOptions = [])
    {
        $field = new ActiveField($el, $property, $label, ActiveField::TEXT_TYPE, $htmlOptions);
       return $this->render('form/input', ['field' => $field], true);
    }

    /**
     * @param IElement $el
     * @param string $property
     * @param string $label
     * @param array $htmlOptions
     * @return string|void
     */
    public function email(IElement $el, $property, $label = '', array $htmlOptions = [])
    {
        $field = new ActiveField($el, $property, $label, ActiveField::EMAIL_TYPE, $htmlOptions);
        return $this->render('form/input', ['field' => $field], true);
    }
}
