<?php

/**
 * Freepage form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class FreepageForm extends BaseFreepageForm
{
  protected static $auths = array('0' => 'なし', '1' => 'あり');
  protected static $app_types = array('pc' => 'pc', 'mobile' => 'mobile');

  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['body'] = new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 20));

    $this->widgetSchema['app_type'] = new sfWidgetFormSelect(array('choices' => self::$app_types));
    $this->validatorSchema['app_type'] = new sfValidatorChoice(array('choices' => array_keys(self::$app_types)));

    $this->widgetSchema['auth'] = new sfWidgetFormChoice(array('choices' => self::$auths, 'multiple' => false, 'expanded' => true));
    $this->validatorSchema['auth'] = new sfValidatorChoice(array('choices' => array_keys(self::$auths)));

    $this->widgetSchema->setLabels(array(
      'app_type' => 'アプリケーションタイプ',
      'auth'     => '認証が必要',
    ));
  }
}
