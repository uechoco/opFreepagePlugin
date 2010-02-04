<?php

/**
 * base actions class for the opFreepagePlugin.
 *
 * @package    OpenPNE
 * @subpackage freepage
 * @author     Rimpei Ogawa <ogawa@tejimaya.com>
 */
class opFreepagePluginActions extends sfActions
{
  public function initialize($context, $moduleName, $actionName)
  {
    parent::initialize($context, $moduleName, $actionName);

    $this->freepage = $this->getRoute()->getObject();
    if ($this->freepage->auth)
    {
      $this->security[$actionName] = array('is_secure' => true, 'credentials' => 'SNSMember');
    }
  }

  public function executeIndex($request)
  {
    $this->getResponse()->setTitle($this->freepage->getTitle());
  }
}
