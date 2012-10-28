<?php

require_once __DIR__.'/../vendor/autoload.php';

$containerFactory = new \Newscoop\Widgets\Container\ContainerFactory();
$container = $containerFactory->getContainer();

$view = $container->get('view');
$widgetReader = new \Newscoop\Widgets\WidgetReader();
$allWidgets = $widgetReader->findAllWidgets();

echo $view->render('widgetsDashboard.html.twig', array('allWidgets' => $allWidgets));