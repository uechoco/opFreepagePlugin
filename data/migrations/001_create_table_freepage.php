<?php

class opFreepagePluginMigrationVersion1 extends Doctrine_Migration_Base
{
  public function up()
  {
    if (!Doctrine_Manager::connection()->import->tableExists('freepage'))
    {
      $this->createTable('freepage',
        array(
          'id'         => array('type' => 'integer', 'length' => 4, 'primary' => true, 'autoincrement' => true),
          'title'      => array('type' => 'string', 'notnull' => true),
          'body'       => array('type' => 'string', 'notnull' => true),
          'app_type'   => array('type' => 'string', 'length' => 16, 'notnull' => true, 'default' => 'pc'),
          'auth'       => array('type' => 'boolean', 'notnull' => true, 'default' => true),
          'created_at' => array('type' => 'timestamp', 'length' => 25, 'notnull' => true),
          'updated_at' => array('type' => 'timestamp', 'length' => 25, 'notnull' => true),
        ),
        array(
          'charset' => 'utf8',
        ));
    }
  }
}
