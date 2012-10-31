<?php
/**
 * @package Newscoop\Widgets
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @license  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Newscoop\Widgets;

use Symfony\Component\Finder\Finder;

/**
 * Widget reader
 */
class WidgetReader
{
    private $widgetsDirectory;
    private $widgetsMeta = array();

    public function __construct($widgetsDirectory)
    {
        $this->widgetsDirectory = $widgetsDirectory;
    }

    public function getWidgetsDirectory()
    {
        return $this->widgetsDirectory;
    }

    public function findAllWidgets()
    {
        $widgets = array();
        $finder = new Finder();
        $elements = $finder->depth('== 0')->in($this->widgetsDirectory);

        foreach ($elements as $element) {
            if (count($elements) > 0) {
                $vendorName = $element->getFileName();

                $secondFinder = new Finder();  
                $directories = $secondFinder->depth('== 0')->in($element->getPathName());
                foreach ($directories as $directory) { 
                    $widgetName = $directory->getFileName();
                    $class = $vendorName.'\\'.$widgetName.'\\'.$widgetName.'Widget';
                    if (class_exists($class)) {
                        $widgets[$class] = new $class;
                        $this->widgetsMeta[$class] = array(
                            'dir' => $this->widgetsDirectory.'/'.$vendorName.'/'.$widgetName,
                            'vendor' => $vendorName,
                            'widgetName' => $widgetName
                        );
                    }
                }
            }
        }

        return $widgets;
    }

    public function registerRoutings($routingLoader, $containerFactory)
    {
        $this->findAllWidgets();
        $routesCollection = new \Symfony\Component\Routing\RouteCollection();

        foreach ($this->widgetsMeta as $key => $widget) {
            $file = $widget['dir'].'/Resources/config/routing.yml';
            if (file_exists($file)) {
                $routesCollection->addCollection($routingLoader->load($file), strtolower($widget['vendor'].'_'.$widget['widgetName']));
            }
        }

        $containerFactory->setRouter($routesCollection);
    }
}