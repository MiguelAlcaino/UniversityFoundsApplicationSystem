<?php

/**
 * NotaFormulacion form base class.
 *
 * @method NotaFormulacion getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotaFormulacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'evaluacion_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Evaluacion'), 'add_empty' => false)),
      'porcentaje_evaluacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PorcentajeEvaluacion'), 'add_empty' => false)),
      'nota'                     => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'evaluacion_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Evaluacion'))),
      'porcentaje_evaluacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PorcentajeEvaluacion'))),
      'nota'                     => new sfValidatorInteger(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('nota_formulacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaFormulacion';
  }

}
