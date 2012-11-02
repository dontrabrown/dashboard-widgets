<?php
/**
 * @package Newscoop\Widgets
 * @author Petr Jasek <petr.jasek@sourcefabric.org>
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @license  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Newscoop\Widgets\Widget;

/**
 * Widget interace
 */
interface WidgetInterface
{
    /**
     * Get default route
     * @return void
     */
    public function getDefaultRoute();
}