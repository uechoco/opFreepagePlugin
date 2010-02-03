<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * freepage actions.
 *
 * @package    OpenPNE
 * @subpackage freepage
 * @author     uechoco
 * @author     Rimpei Ogawa <ogawa@tejimaya.com>
 */
class freepageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    // forward 404 page unless freepage does exist
    $this->forward404Unless($this->freepage = Doctrine::getTable('Freepage')->find($request->getParameter('id')), sprintf('Object freepage does not exist (%s).', $request->getParameter('id')));

    if ($this->freepage->getAuth()) {
      if (($member = $this->getUser()->getMember()) && $member->getIsActive()) {
        // ok
      } else {
        $this->forward404('This page is for sns members.');
      }
    }

    // forward 404 page unless app_type is 'pc';
    $this->forward404Unless($this->freepage->getAppType() == 'pc', sprintf('This page is for %s application.', $this->freepage->getAppType()));

    $this->getResponse()->setTitle($this->freepage->getTitle());
  }
}
