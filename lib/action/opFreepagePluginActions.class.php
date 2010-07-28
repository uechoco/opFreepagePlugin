<?php

/**
 * base actions class for the opFreepagePlugin.
 *
 * @package    OpenPNE
 * @subpackage freepage
 * @author     Rimpei Ogawa <ogawa@tejimaya.com>
 * @author     uechoco
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

 /**
  * Executes index action
  *
  * @param      sfRequest $request A request object
  * @author     uechoco
  * @see        sfOpenPNEMailSend::getMailTemplate()
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->getResponse()->setTitle($this->freepage->getTitle());

    $context = sfContext::getInstance();
    $params['sf_config'] = sfConfig::getAll();

    // The renderer name is twig.
    // The template name ,which is the first argument of opFreepageTemplateLoaderDoctrine::doLoad(), is Freepage::id.
    $view = new sfTemplatingComponentPartialView($context, 'freepage', 'twig:'.$this->freepage->getId(), '');
    $context->set('view_instance', $view);

    $view->setPartialVars($params);
    $view->setAttribute('renderer_config', array('twig' => 'opTemplateRendererTwig'));
    $view->setAttribute('rule_config', array('twig' => array(
      array('loader' => 'opFreepageTemplateLoaderDoctrine', 'renderer' => 'twig', 'model' => 'Freepage')
    )));
    $view->execute();

    $this->body = $view->render();
  }
}
