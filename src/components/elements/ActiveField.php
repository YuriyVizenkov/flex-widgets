<?php

namespace flex\components\elements;

use flex\components\interfaces\IElement;
use flex\components\traits\UIDGenerator;

/**
 * Class ActiveField
 * @package flex\components\elements
 */
class ActiveField
{
    use UIDGenerator;

    const TEXT_TYPE = 'text';
    const EMAIL_TYPE = 'email';

    /**
     * @var IElement
     */
    protected $el = false;

    /**
     * @var string
     */
    protected $type = '';

    /**
     * @var string
     */
    protected $property = '';

    /**
     * @var string
     */
    protected $label = '';

    /**
     * @var array
     */
    protected $htmlOptions = [];

    /**
     * @var string
     */
    protected $id = '';

    public function __construct(IElement $el, $property, $label, $type, array $htmlOptions = [])
    {
        $this->el = $el;
        $this->type = $type;
        $this->property = $property;
        $this->label = $label;
        $this->htmlOptions = $htmlOptions;

        $this->id = (isset($this->htmlOptions['id'])) ? $this->htmlOptions['id'] : $this->genUuid();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        $prop = $this->property;
        return $this->el->$prop;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return ($this->hasNameAttributeInHtmlOptions())
            ? $this->htmlOptions['name'] : $this->el . '[' . $this->property . ']';
    }

    public function hasNameAttributeInHtmlOptions()
    {
        return isset($this->htmlOptions['name']);
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPlaceholder()
    {
        return (isset($this->htmlOptions['placeholder'])) ? $this->htmlOptions['placeholder'] : '';
    }
}
