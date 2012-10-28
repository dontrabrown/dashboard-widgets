<?php
/**
 * @package Newscoop\Widgets
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\Widgets\Container;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Container Factory.
 */
class ContainerFactory
{   
    private $container;

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__ . '/../Resources/config/'));
        $loader->load('services.yml');

        $loader = new \Twig_Loader_Filesystem(__DIR__ .'/../../../../'. $this->container->getParameter('widgets.view.templates_dir'));
        $loader->addPath(__DIR__ .'/../../../../dashboard');

        // TODO: add cache with env discovering 
        // array(
        //     'cache' => __DIR__ .'/../../../../dashboard/cache'
        // )
        $twig = new \Twig_Environment($loader);
        $this->container->set('view', $twig);
    }

    public function getContainer()
    {
        return $this->container;
    }
}