<?php

/**
 * AjusteDetalleRecursoGastosOperacion filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAjusteDetalleRecursoGastosOperacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ajuste_detalle_recurso_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AjusteDetalleRecurso'), 'add_empty' => true)),
      'detalle_recurso_gastos_operacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DetalleRecursoGastosOperacion'), 'add_empty' => true)),
      'monto_aprobado'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'ajuste_detalle_recurso_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AjusteDetalleRecurso'), 'column' => 'id')),
      'detalle_recurso_gastos_operacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('DetalleRecursoGastosOperacion'), 'column' => 'id')),
      'monto_aprobado'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ajuste_detalle_recurso_gastos_operacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AjusteDetalleRecursoGastosOperacion';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'ajuste_detalle_recurso_id'           => 'ForeignKey',
      'detalle_recurso_gastos_operacion_id' => 'ForeignKey',
      'monto_aprobado'                      => 'Number',
      'created_at'                          => 'Date',
      'updated_at'                          => 'Date',
    );
  }
}
