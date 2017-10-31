<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Menu extends AbstractHelper
{
    /**
     * Menu items array.
     * @var array
     */
    protected $items = [];

    private $template;

    /**
     * Active item's ID.
     * @var string
     */
    protected $activeItemId = '';

    /**
     * Constructor.
     * @param array $items Menu items.
     */
    public function __construct($items=[])
    {
        $this->items = $items;
    }

    /**
     * Sets menu items.
     * @param array $items Menu items.
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Sets ID of the active items.
     * @param string $activeItemId
     */
    public function setActiveItemId($activeItemId)
    {
        $this->activeItemId = $activeItemId;
    }

    /**
     * Renders the menu.
     * @return string HTML code of the menu.
     */
    public function render()
    {
        return empty($this->items)
            ? ''
            : $this->getView()->render($this->template, ['items' => $this->items]);
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }
    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}