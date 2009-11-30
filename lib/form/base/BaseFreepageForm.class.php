<?php

/**
 * Freepage form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseFreepageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormTextarea(),
      'body'       => new sfWidgetFormTextarea(),
      'app_type'   => new sfWidgetFormInput(),
      'auth'       => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Freepage', 'column' => 'id', 'required' => false)),
      'title'      => new sfValidatorString(array('required' => false)),
      'body'       => new sfValidatorString(array('required' => false)),
      'app_type'   => new sfValidatorString(array('max_length' => 16)),
      'auth'       => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('freepage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Freepage';
  }


}
