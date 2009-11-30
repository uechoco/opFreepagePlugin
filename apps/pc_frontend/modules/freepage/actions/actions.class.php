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
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
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
    $this->forward404Unless($this->freepage = FreepagePeer::retrieveByPk($request->getParameter('id')), sprintf('Object freepage does not exist (%s).', $request->getParameter('id')));

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
