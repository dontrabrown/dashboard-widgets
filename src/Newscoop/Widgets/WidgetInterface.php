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
 * Widget interace
 */
interface WidgetInterface
{
    /**
     * Get default controller name
     * @return void
     */
    public function getDefaultController();

    /**
     * Get default controller action name
     * @return void
     */
    public function getDefaultAction();
}