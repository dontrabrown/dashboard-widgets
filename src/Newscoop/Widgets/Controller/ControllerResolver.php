<?php
/**
 * @package Newscoop\Widgets
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @copyright 2012 Sourcefabric o.p.s.
 * @license  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Newscoop\Widgets\Controller;

use Symfony\Component\HttpKernel\Controller\ControllerResolver as BaseControllerResolver;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * ControllerResolver.
 */
class ControllerResolver extends BaseControllerResolver
{
    protected $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface   $container A ContainerInterface instance
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct();
    }


    /**
     * Returns a callable for the given controller.
     *
     * @param string $controller A Controller string
     *
     * @return mixed A PHP callable
     *
     * @throws \LogicException When the name could not be parsed
     * @throws \InvalidArgumentException When the controller class does not exist
     */
    protected function createController($controller)
    {
        if (false === strpos($controller, '::')) {
            throw new \InvalidArgumentException(sprintf('Unable to find controller "%s".', $controller));
        }

        list($class, $method) = explode('::', $controller, 2);

        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf('Class "%s" does not exist.', $class));
        }

        $controller = new $class();
        if ($controller instanceof ContainerAwareInterface) {
            $controller->setContainer($this->container);
        }

        if ($this->container->has('view')) {
            $view = $this->container->get('view');
            $loader = $view->getLoader();
            if ($path = $this->getViewsPath($controller)) {
                $loader->addPath($path);
                $view->setLoader($loader);
                $this->container->set('view', $view);
            }
        }

        /// if $this->container->has('view') get loader (getLoader from view)  
        //  then parse controller path (get vendor and widget name) and add vendor/widget/Resources/views for loader 
        //  if directory exists.

        return array($controller, $method);
    }

    private function getViewsPath($controller) {
        $elements = explode('\\', get_class($controller));
        if (count($elements == 4)) {
            $path = __DIR__ . '/../../../../widgets/' . $elements[0] . '/' . $elements[1] . '/Resources/views';

            if (is_dir($path)) {
                return $path;
            }
        }

        return false;
    }
}