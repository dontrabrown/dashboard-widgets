<?php
/**
 * @package Newscoop\Widgets
 * @author Petr Jasek <petr.jasek@sourcefabric.org>
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @license  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Newscoop\Widgets\Widget;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Widget data holder
 */
class Widget
{
    /** 
     * @var array widget info
     */
    private $info = array();

    /**
     * @var  array widget metadata
     */
    private $meta = array();

    /**
     * @var  array widget configuration
     */
    private $config = array();

    public function getDefaultRoute() {
        if (count($this->config) > 0) {
            if (array_key_exists('defaultRoute', $this->config)) {
                return $this->config['defaultRoute'];
            }
        }
    }

    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }
}