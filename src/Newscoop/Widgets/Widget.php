<?php
/**
 * @package Newscoop\Widgets
 * @author Petr Jasek <petr.jasek@sourcefabric.org>
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\Widgets;

use Newscoop\Widgets\WidgetInterface;

/**
 * Abstract class for widgets
 */
abstract class Widget implements WidgetInterface
{
    const FULLSCREEN_VIEW = 'fullscreen';
    const DEFAULT_VIEW = 'default';

    /** 
     * @var string 
     */
    private $view = self::DEFAULT_VIEW;

    private $user;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Set view
     * @param string $view
     * @return Widget
     */
    public function setView($view = self::DEFAULT_VIEW)
    {
        $this->view = (string) $view;
        
        return $this;
    }

    /**
     * Get view
     * @return string
     */
    final public function getView()
    {
        return $this->view;
    }

    /**
     * Is view fullscreen?
     * @return bool
     */
    public function isFullscreen()
    {
        return $this->getView() == self::FULLSCREEN_VIEW;
    }
}