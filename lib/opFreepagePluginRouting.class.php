<?php
class opFreepagePluginRouting
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $routing = $event->getSubject();

    $routes = array(
      'freepage_id' => new sfPropelRoute(
        '/freepage/:id',
        array('module' => 'freepage', 'action' => 'index'),
        array('id' => '\d+'),
        array('model' => 'Freepage', 'type' => 'object')
      ),
    );

    $routes = array_reverse($routes);
    foreach ($routes as $name => $route)
    {
      $routing->prependRoute($name, $route);
    }
  }
}