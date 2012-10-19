Newscoop Widgets
================

This library is based on Petr Jasek code form Newscoop.

Goals:

* Quickly create simple widgets
* Create more complex widgets with own controllers
* Create views for your widgets with templates system (Twig, Smarty)
* Simple widgets settings system (as in previous version)
* Use Doctrine2 entities to use database in your widgets
* Fully namespaced code
* Simple interface to manage your widgets (per user or per predefined contexts)

As base we use Symfony2 components like:

* Routing
* Config
* Http-kernel
* Http-foundation
* Event-dispatcher
* Yaml

TODO:

* Widget Manager (manage widgets per user or per context)
* Widget Renderer - use tamplating system to render widget container + metadata + widget controller respose (widget content)