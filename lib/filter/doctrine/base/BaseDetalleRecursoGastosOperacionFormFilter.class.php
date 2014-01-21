<?php

/**
 * DetalleRecursoGastosOperacion filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetalleRecursoGastosOperacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'detalle_recurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DetalleRecurso'), 'add_empty' => true)),
      'tipo_de_gasto'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'monto'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'detalle_recurso_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('DetalleRecurso'), 'column' => 'id')),
      'tipo_de_gasto'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'monto'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('detalle_recurso_gastos_operacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleRecursoGastosOperacion';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'detalle_recurso_id' => 'ForeignKey',
      'tipo_de_gasto'      => 'Number',
      'monto'              => 'Number',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
