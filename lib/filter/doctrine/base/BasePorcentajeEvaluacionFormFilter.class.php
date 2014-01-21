<?php

/**
 * PorcentajeEvaluacion filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePorcentajeEvaluacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'concurso_tipo_archivo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConcursoTipoArchivo'), 'add_empty' => true)),
      'numero'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'porcentaje_evaluacion'    => new sfWidgetFormFilterInput(),
      'nombre_nota'              => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'concurso_tipo_archivo_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ConcursoTipoArchivo'), 'column' => 'id')),
      'numero'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'porcentaje_evaluacion'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre_nota'              => new sfValidatorPass(array('required' => false)),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('porcentaje_evaluacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PorcentajeEvaluacion';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'concurso_tipo_archivo_id' => 'ForeignKey',
      'numero'                   => 'Number',
      'porcentaje_evaluacion'    => 'Number',
      'nombre_nota'              => 'Text',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
