<?php

/**
 * PublicacionDePersona filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublicacionDePersonaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => true)),
      'tipo_publicacion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_revista'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'titulo_publicacion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anio'               => new sfWidgetFormFilterInput(),
      'volumen'            => new sfWidgetFormFilterInput(),
      'numero'             => new sfWidgetFormFilterInput(),
      'es_isi'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'persona_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Persona'), 'column' => 'id')),
      'tipo_publicacion'   => new sfValidatorPass(array('required' => false)),
      'nombre_revista'     => new sfValidatorPass(array('required' => false)),
      'titulo_publicacion' => new sfValidatorPass(array('required' => false)),
      'anio'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'volumen'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'es_isi'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('publicacion_de_persona_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PublicacionDePersona';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'persona_id'         => 'ForeignKey',
      'tipo_publicacion'   => 'Text',
      'nombre_revista'     => 'Text',
      'titulo_publicacion' => 'Text',
      'anio'               => 'Number',
      'volumen'            => 'Number',
      'numero'             => 'Number',
      'es_isi'             => 'Boolean',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
