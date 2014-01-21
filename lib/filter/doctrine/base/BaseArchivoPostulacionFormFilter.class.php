<?php

/**
 * ArchivoPostulacion filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArchivoPostulacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo_archivo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoArchivo'), 'add_empty' => true)),
      'id_persona_concurso' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'), 'add_empty' => true)),
      'ruta'                => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_tipo_archivo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoArchivo'), 'column' => 'id')),
      'id_persona_concurso' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PersonaConcurso'), 'column' => 'id')),
      'ruta'                => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('archivo_postulacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoPostulacion';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'id_tipo_archivo'     => 'ForeignKey',
      'id_persona_concurso' => 'ForeignKey',
      'ruta'                => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
