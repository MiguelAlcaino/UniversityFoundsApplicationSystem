<?php

/**
 * NotaFormulacion filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotaFormulacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'evaluacion_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Evaluacion'), 'add_empty' => true)),
      'porcentaje_evaluacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PorcentajeEvaluacion'), 'add_empty' => true)),
      'nota'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'evaluacion_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Evaluacion'), 'column' => 'id')),
      'porcentaje_evaluacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PorcentajeEvaluacion'), 'column' => 'id')),
      'nota'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('nota_formulacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaFormulacion';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'evaluacion_id'            => 'ForeignKey',
      'porcentaje_evaluacion_id' => 'ForeignKey',
      'nota'                     => 'Number',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
