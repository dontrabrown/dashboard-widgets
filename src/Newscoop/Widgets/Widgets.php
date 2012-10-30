<?php
/**
 * @package Newscoop\Widgets
 * @author Petr Jasek <petr.jasek@sourcefabric.org>
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Newscoop\Widgets;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Widgets main class
 */
class Widgets extends ContainerAware
{
    /** 
     * @var mixed 
     */
    private $user;

    public function __construct() {
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}