<?php
/**
 * @package Newscoop\Widgets
 * @author Petr Jasek <petr.jasek@sourcefabric.org>
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\Widgets\Controller;

use Newscoop\Widgets\Widgets;

/**
 * Parrent conctroller for widgets controllers
 */
class WidgetController extends Widgets
{
    const FULLSCREEN_VIEW = 'fullscreen';
    const DEFAULT_VIEW = 'default';

    /**
     * Is view fullscreen?
     * @return bool
     */
    public function getSize()
    {
        return self::DEFAULT_VIEW;
    }
}