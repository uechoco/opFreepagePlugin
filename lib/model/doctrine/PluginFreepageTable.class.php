<?php
/**
 */
class PluginFreepageTable extends Doctrine_Table
{
  public function findForPcRoute($params)
  {
    return $this->findOneByIdAndAppType($params['id'], 'pc');
  }

  public function findForMobileRoute($params)
  {
    return $this->findOneByIdAndAppType($params['id'], 'mobile');
  }
}
