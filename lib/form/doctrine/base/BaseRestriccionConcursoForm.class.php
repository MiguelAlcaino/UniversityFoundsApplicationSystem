<?php

/**
 * RestriccionConcurso form base class.
 *
 * @method RestriccionConcurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRestriccionConcursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'tipo_profesor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoProfesor'), 'add_empty' => true)),
      'concurso_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'), 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tipo_profesor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoProfesor'), 'required' => false)),
      'concurso_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'))),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('restriccion_concurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RestriccionConcurso';
  }

}
