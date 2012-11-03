<?php
/**
 * @package Newscoop\Widgets
 * @author Paweł Mikołajczuk <pawel.mikolajczuk@sourcefabric.org>
 * @license  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Newscoop\Widgets\Widget;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Widget reader
 */
class WidgetReader
{
    private $widgetsDirectory;
    private $widgets = array();

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
        $finder = new Finder();
        $elements = $finder->depth('== 0')->in($this->widgetsDirectory);

        foreach ($elements as $element) {
            if (count($elements) > 0) {
                $vendorName = $element->getFileName();

                $secondFinder = new Finder();  
                $directories = $secondFinder->depth('== 0')->in($element->getPathName());
                foreach ($directories as $directory) { 
                    $widgetName = $directory->getFileName();
                    $className = $vendorName.'\\'.$widgetName.'\\'.$widgetName.'Widget';
                    if (class_exists($className)) {
                        $widgetClass = new $className;

                        $widgetClass->setInfo(array(
                            'dir' => $this->widgetsDirectory.'/'.$vendorName.'/'.$widgetName,
                            'vendor' => $vendorName,
                            'widgetName' => $widgetName
                        ));
                        $widgetClass->setMeta($this->readMetadata($widgetClass));
                        $widgetClass->setConfig($this->readConfig($widgetClass));


                        $this->widgets[$className] = $widgetClass;
                    }
                }
            }
        }

        return $this->widgets;
    }

    public function registerRoutings($routingLoader, $containerFactory)
    {
        $this->findAllWidgets();
        $routesCollection = new \Symfony\Component\Routing\RouteCollection();

        foreach ($this->widgets as $key => $widget) {
            $widgetInfo = $widget->getInfo();
            $file = $widgetInfo['dir'].'/Resources/config/routing.yml';
            if (file_exists($file)) {
                $routesCollection->addCollection($routingLoader->load($file), strtolower($widgetInfo['vendor'].'_'.$widgetInfo['widgetName']));
            }
        }

        $containerFactory->setRouter($routesCollection);
    }

    protected function readMetadata($widget)
    {   
        $meta = array();
        $widgetInfo = $widget->getInfo();
        $configFile = $widgetInfo['dir'] . '/Resources/config/config.yml';

        if (file_exists($configFile)) {
            $configContent = Yaml::parse($configFile);
            if (array_key_exists($widgetInfo['widgetName'], $configContent)) {
                if (array_key_exists('meta', $configContent[$widgetInfo['widgetName']])) {
                    $meta = $configContent[$widgetInfo['widgetName']]['meta']; 
                }
            }
        }

        return $meta;
    }

    protected function readConfig($widget)
    {   
        $config = array();
        $widgetInfo = $widget->getInfo();
        $configFile = $widgetInfo['dir'] . '/Resources/config/config.yml';

        if (file_exists($configFile)) {
            $configContent = Yaml::parse($configFile);
            if (array_key_exists($widgetInfo['widgetName'], $configContent)) {
                if (array_key_exists('config', $configContent[$widgetInfo['widgetName']])) {
                    $config = $configContent[$widgetInfo['widgetName']]['config']; 
                }
            }
        }

        return $config;
    }
}