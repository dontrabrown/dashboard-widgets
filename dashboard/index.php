<?php

require_once __DIR__.'/../vendor/autoload.php';

use Newscoop\Widgets\WidgetReader;

$loader = new Twig_Loader_Filesystem(__DIR__);
$twig = new Twig_Environment($loader);

$widgetReader = new \Newscoop\Widgets\WidgetReader();
$widgets = $widgetReader->findAllWidgets();

foreach ($widgets as $widget) {
    $renderer = new Newscoop\Widgets\WidgetRenderer($widget);
    $renderer->render();
}

print_r($widgets);

//echo $twig->render('index.html.twig', array('name' => 'Fabien'));