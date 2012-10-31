<?php
/**
 * @package Newscoop\Widgets
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @license  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Newscoop\Widgets\Container;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Routing\Loader\YamlFileLoader as RoutingYamlFileLoader;
use Newscoop\Widgets\Routing\Router;

/**
 * Container Factory.
 */
class ContainerFactory
{   
    private $container;

    private $cacheDir;
    private $dashboardDir;
    private $widgetsDir;

    public function __construct($dashboardDir, $cacheDir, $widgetsDir)
    {
        $this->dashboardDir = $dashboardDir;
        $this->cacheDir = $cacheDir;
        $this->widgetsDir = $widgetsDir;

        $this->container = new ContainerBuilder();
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__ . '/../Resources/config/'));
        $loader->load('services.yml');

        $this->container->setParameter('dashboard.dashboard_dir', $dashboardDir);
        $this->container->setParameter('dashboard.cache_dir', $cacheDir);
        $this->container->setParameter('dashboard.widgets_dir', $widgetsDir);

        $this->setView($dashboardDir);
        $this->setRouting($dashboardDir, $cacheDir);
    }

    private function setView($dashboardDir)
    {
        $loader = new \Twig_Loader_Filesystem($dashboardDir);

        // TODO: add cache with env discovering 
        // array(
        //     'cache' => __DIR__ .'/../../../../dashboard/cache'
        // )
        $twig = new \Twig_Environment($loader);
        $this->container->set('dashboard.view', $twig);
    }

    private function setRouting($dashboardDir, $cacheDir)
    {
        $locator = new FileLocator($dashboardDir.'/app/config/');
        $loader = new RoutingYamlFileLoader($locator);

        $this->container->set('dashboard.routing.yml_loader', $loader);
    }

    public function setRouter($collection){
        $router = new Router(
            $collection,
            array('cache_dir' => $this->cacheDir)
        );
        $this->container->set('dashboard.router', $router);

        return $router;
    }

    public function getContainer()
    {
        return $this->container;
    }
}