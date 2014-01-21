<?php

/**
 * RespuestaAlternativa form base class.
 *
 * @method RespuestaAlternativa getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRespuestaAlternativaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'sesion_encuesta_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SesionEncuesta'), 'add_empty' => false)),
      'alternativa_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alternativa'), 'add_empty' => false)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sesion_encuesta_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SesionEncuesta'))),
      'alternativa_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alternativa'))),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('respuesta_alternativa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RespuestaAlternativa';
  }

}
