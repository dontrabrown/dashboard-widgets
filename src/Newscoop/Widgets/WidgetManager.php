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
class WidgetManager
{
    private $defaultWidgets = array();
    private $widgets = array();

    public function __construct()
    {
        $this->defaultWidgets = $this->getDafaultsWidgets();
    }

    public function getDafaultsWidgets()
    {   
        // get defaults widget list

        $widgets = array();

        return $widgets;
    }

    public function getAvailableWidgets()
    {
        // get all widgets in "widgets" directory
    }

    public function addWidget()
    {
        // add new widget to user widget list
    }

    public function getWidgetsByContext($context)
    {
        // get widgets by context
    }

    public function setWidgetsByContext($context, array $widgets)
    {
        // set widgets by context
    }

    public function addWidgetToContext($context, $widget)
    {
        // add widget to conext
    }
}