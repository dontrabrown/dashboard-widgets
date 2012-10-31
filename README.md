Dashboard Widgets
================

Dashboard Widgets system builded on top of Symfony components. Allow 3d party developer to build widets for your application dashboard. Each widgets can have controllers, views, entities, each widget must have repository and can be installed with Composer.

This library is based on Petr Jasek code form [Newscoop][3].

## Goals:

* Quickly create simple widgets
* Create more complex widgets with own controllers
* Create views for your widgets with templates system (Twig, Smarty)
* Simple widgets settings system (as in previous version)
* Use Doctrine2 entities to use database in your widgets
* Fully namespaced code
* Simple interface to manage your widgets (per user or per predefined contexts)

## As base we use components like:

* Symfony/Routing
* Symfony/Config
* Symfony/Http-Kernel
* Symfony/Http-Foundation
* Symfony/Finder
* Symfony/Dependency-Injection
* Symfony/Event-Dispatcher
* Symfony/Yaml
* Twig/Twig

# Widgets

#### Where widget lives?

Like any other amazing php stuff, widgets lives in their repositories on Github.
And like rest of best ever libraries they have composer.json file and are listed on Packagist.

#### How to install widgets?

Just find it on packagist and add to composer require section.

#### What should have widget in his composer.json file for proper install?

    "type": "newscoop-dashboard-widget",
    "require": {
        "newscoop/dashboard-widgets-installer": "*"
    }

## System elements:

* [Dashboard for widgets][4]
* [Composer widgets installer] [1]
* [Sample Hello World widget] [2]

## TODO:

* Create base layout for widgets dashboard
* Load metadata from configuration into widget object (maybe add BaseWidget class for keeping this data)
* Create layout for single widget container
* Create JavaScript library for:
 * loading widget controllers content
 * settings management
* Add doctrine entity manager into container
* Widget Manager (manage widgets per user or per context)

[1]: https://github.com/ahilles107/newscoop-dashboard-widget-installer
[2]: https://github.com/ahilles107/hello-world-dashboard-widget
[3]: https://github.com/sourcefabric/Newscoop
[4]: https://github.com/ahilles107/dashboard-widgets-dashboard