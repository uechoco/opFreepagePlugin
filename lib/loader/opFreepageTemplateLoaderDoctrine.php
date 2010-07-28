<?php

/**
 * template loader class for the opFreepagePlugin.
 *
 * @package    OpenPNE
 * @subpackage freepage
 * @author     uechoco
 * @see        sfTemplateSwitchableLoaderDoctrine
 */
class opFreepageTemplateLoaderDoctrine extends sfTemplateAbstractSwitchableLoader
{
  public function doLoad($id, $renderer = 'twig')
  {
    $model = $this->getParameter('model', 'Freepage');
    $q = Doctrine::getTable($model)->createQuery()
      ->addSelect('body')
      ->where('id = ?', $id);

    $string = $q->fetchOne()->getBody();
    if (!(string)$string)
    {
      return false;
    }

    $result = new sfTemplateStorageString((string)$string, $renderer);

    return $result;
  }
}
