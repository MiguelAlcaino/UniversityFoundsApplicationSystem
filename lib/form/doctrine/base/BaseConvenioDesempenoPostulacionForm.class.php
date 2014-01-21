<?php

/**
 * ConvenioDesempenoPostulacion form base class.
 *
 * @method ConvenioDesempenoPostulacion getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConvenioDesempenoPostulacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'persona_concurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'), 'add_empty' => false)),
      'fecha_convenio'      => new sfWidgetFormDateTime(),
      'ruta_convenio'       => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_concurso_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'))),
      'fecha_convenio'      => new sfValidatorDateTime(array('required' => false)),
      'ruta_convenio'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ConvenioDesempenoPostulacion', 'column' => array('persona_concurso_id')))
    );

    $this->widgetSchema->setNameFormat('convenio_desempeno_postulacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConvenioDesempenoPostulacion';
  }

}
