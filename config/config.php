<?php
$this->dispatcher->connect('routing.load_configuration', array('opFreepagePluginRouting', 'listenToRoutingLoadConfigurationEvent'));
