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
  public function executeIndex($request)
  {
    $this->redirect('opFreepagePlugin/list');
  }

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
    $this->form = new FreepageForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $freepage = $this->getRoute()->getObject();
    $this->form = new FreepageForm($freepage);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $freepage = $this->getRoute()->getObject();
    $this->form = new FreepageForm($freepage);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $freepage = $this->getRoute()->getObject();
    $freepage->delete();

    $this->redirect('opFreepagePlugin/list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $form->save();
      $this->redirect('opFreepagePlugin/list');
    }
  }
}
