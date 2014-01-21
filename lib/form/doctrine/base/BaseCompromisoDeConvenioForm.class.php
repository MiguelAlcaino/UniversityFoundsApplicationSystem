<?php

/**
 * CompromisoDeConvenio form base class.
 *
 * @method CompromisoDeConvenio getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompromisoDeConvenioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'convenio_desempeno_postulacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConvenioDesempenoPostulacion'), 'add_empty' => false)),
      'orden'                             => new sfWidgetFormInputText(),
      'texto_compromiso'                  => new sfWidgetFormTextarea(),
      'created_at'                        => new sfWidgetFormDateTime(),
      'updated_at'                        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'convenio_desempeno_postulacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConvenioDesempenoPostulacion'))),
      'orden'                             => new sfValidatorInteger(),
      'texto_compromiso'                  => new sfValidatorString(),
      'created_at'                        => new sfValidatorDateTime(),
      'updated_at'                        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('compromiso_de_convenio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompromisoDeConvenio';
  }

}
