<?php
/**
 * @package Newscoop\Widgets
 * @author Petr Jasek <petr.jasek@sourcefabric.org>
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\Widgets;

/**
 * Widget Manager
 */
class WidgetRenderer
{
    private $renderer;

    public function __construct()
    {}

    public function setRenderer($render)
    {   
        $this->renderer = $render;

        return $this;
    }

    public function getRenderer()
    {
        return $this->renderer;
    }

    /**
     *  get renderer 
     *  get layout
     *  pass widget data to layout
     *  pass default controller result to layout
     * 
     *  return layout with content from default controller
     */
    public function render()
    {}
}