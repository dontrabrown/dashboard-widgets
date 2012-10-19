<?php
/**
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\HelloWorld;

use Newscoop\Widgets\Widget;

/**
 * HelloWorld widget
 */
class HelloWorld extends Widget
{
    public function getDefaultController()
    {
        // return default controller name
        // can be set in config

        return 'Newscoop\HelloWorld\Controller\HelloWorldController';
    } 

    public function getDefaultAction()
    {
        // return default controller action name
        // can be set in config

        return 'indexAction';
    }
}