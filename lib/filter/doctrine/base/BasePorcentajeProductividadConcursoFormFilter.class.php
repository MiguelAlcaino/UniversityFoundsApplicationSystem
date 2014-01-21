<?php

/**
 * PorcentajeProductividadConcurso filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePorcentajeProductividadConcursoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'concurso_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'), 'add_empty' => true)),
      'tipo_productividad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'porcentaje'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'concurso_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Concurso'), 'column' => 'id')),
      'tipo_productividad' => new sfValidatorPass(array('required' => false)),
      'porcentaje'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('porcentaje_productividad_concurso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PorcentajeProductividadConcurso';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'concurso_id'        => 'ForeignKey',
      'tipo_productividad' => 'Text',
      'porcentaje'         => 'Number',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
