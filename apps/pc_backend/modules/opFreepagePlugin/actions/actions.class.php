<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opFreepagePlugin actions.
 *
 * @package    OpenPNE
 * @subpackage opFreepagePlugin
 * @author     uechoco
 * @author     Rimpei Ogawa <ogawa@tejimaya.com>
 */
class opFreepagePluginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    $this->redirect('opFreepagePlugin/list');
  }

 /**
  * Executes list action
  *
  * @param sfRequest $request A request object
  */
  public function executeList($request)
  {
    $this->freepage_list = Doctrine::getTable('Freepage')->findAll();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FreepageForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new FreepageForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($freepage = Doctrine::getTable('Freepage')->find($request->getParameter('id')), sprintf('Object freepage does not exist (%s).', $request->getParameter('id')));
    $this->form = new FreepageForm($freepage);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($freepage = Doctrine::getTable('Freepage')->find($request->getParameter('id')), sprintf('Object freepage does not exist (%s).', $request->getParameter('id')));
    $this->form = new FreepageForm($freepage);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($freepage = Doctrine::getTable('Freepage')->find($request->getParameter('id')), sprintf('Object freepage does not exist (%s).', $request->getParameter('id')));
    $freepage->delete();

    $this->redirect('opFreepagePlugin/list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $freepage = $form->save();
      $this->redirect('opFreepagePlugin/list');
    }
  }
}
