<?php

/**
 * RespuestaAlternativa filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRespuestaAlternativaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sesion_encuesta_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SesionEncuesta'), 'add_empty' => true)),
      'alternativa_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alternativa'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'sesion_encuesta_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SesionEncuesta'), 'column' => 'id')),
      'alternativa_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alternativa'), 'column' => 'id')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('respuesta_alternativa_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RespuestaAlternativa';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'sesion_encuesta_id' => 'ForeignKey',
      'alternativa_id'     => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
