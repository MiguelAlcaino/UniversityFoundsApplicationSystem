<?php

/**
 * PorcentajeEvaluacion form base class.
 *
 * @method PorcentajeEvaluacion getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePorcentajeEvaluacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'concurso_tipo_archivo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConcursoTipoArchivo'), 'add_empty' => false)),
      'numero'                   => new sfWidgetFormInputText(),
      'porcentaje_evaluacion'    => new sfWidgetFormInputText(),
      'nombre_nota'              => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'concurso_tipo_archivo_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConcursoTipoArchivo'))),
      'numero'                   => new sfValidatorInteger(array('required' => false)),
      'porcentaje_evaluacion'    => new sfValidatorInteger(array('required' => false)),
      'nombre_nota'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('porcentaje_evaluacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PorcentajeEvaluacion';
  }

}
