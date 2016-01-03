<?php

namespace flex\components\elements;

use flex\components\SetPropertiesBehavior;

/**
 * Class ActiveColumn
 * @package flex\components
 */
class ActiveColumn
{
    use SetPropertiesBehavior;

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $call = '';

    /**
     * @var array
     */
    protected $htmlOptions = [];

    public function __construct(array $properties)
    {
        $this->setProperties($properties);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return ($this->title) ? $this->title : $this->getCall();
    }

    /**
     * @return string
     */
    public function getCall()
    {
        return $this->call;
    }

    public function getClasses()
    {
        return ($this->hasClasses()) ? 'class="' . $this->htmlOptions['class'] . '"' : '';
    }

    /**
     * @return bool
     */
    public function hasClasses()
    {
        return isset($this->htmlOptions['class']);
    }

    /**
     * @return string
     */
    public function getHtmlOptionsAsString()
    {
        $out = '';
        foreach ($this->htmlOptions as $option => $value) {
            $out .= $option . '="' . $value . '"';
        }
        return $out;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}
