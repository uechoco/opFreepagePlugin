<?php

/**
 * PluginFreepage form.
 *
 * @package    opFreepagePlugin
 * @subpackage form
 * @author     uechoco
 * @author     Rimpei Ogawa <ogawa@tejimaya.com>
 */
abstract class PluginFreepageForm extends BaseFreepageForm
{
  protected static $auths = array('0' => 'なし', '1' => 'あり');
  protected static $app_types = array('pc' => 'pc', 'mobile' => 'mobile');

  public function setup()
  {
    parent::setup();

    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['title'] = new sfWidgetFormInputText(array(), array('class' => 'input_text', 'size' => 30));
    $this->widgetSchema['body']  = new sfWidgetFormTextarea(array(), array('cols' => 72, 'rows' => 20));

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
