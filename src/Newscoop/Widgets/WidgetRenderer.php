<?php
/**
 * @package Newscoop\Widgets
 * @author Petr Jasek <petr.jasek@sourcefabric.org>
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\Widgets;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Widget Manager
 */
class WidgetRenderer
{
    private $renderer;

    private $widget;

    public function __construct($widget)
    {
        $this->widget = $widget;
    }

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
     * 
     */
    public function render()
    {
        $defaultControler = $this->widget->getDefaultController();
        $defaultAction = $this->widget->getDefaultAction(); 
        $request = Request::createFromGlobals();

        $response = call_user_func_array(array(new $defaultControler, $defaultAction), array($request));
        

        // get renderer
        // get layout
        // pass widget data to layout
        // pass default controller result to layout
        // return layout with content from default controller
    }
}