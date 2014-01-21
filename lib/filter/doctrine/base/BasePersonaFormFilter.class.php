<?php

/**
 * Persona filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePersonaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_profesor_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoProfesor'), 'add_empty' => true)),
      'unidad_academica_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadAcademica'), 'add_empty' => true)),
      'rut'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dv'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido1'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido2'                => new sfWidgetFormFilterInput(),
      'sexo'                     => new sfWidgetFormFilterInput(),
      'telefono'                 => new sfWidgetFormFilterInput(),
      'email'                    => new sfWidgetFormFilterInput(),
      'password'                 => new sfWidgetFormFilterInput(),
      'token_recuperar_password' => new sfWidgetFormFilterInput(),
      'estado_login'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'persona_concursos_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso')),
    ));

    $this->setValidators(array(
      'tipo_profesor_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoProfesor'), 'column' => 'id')),
      'unidad_academica_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UnidadAcademica'), 'column' => 'id')),
      'rut'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dv'                       => new sfValidatorPass(array('required' => false)),
      'nombre'                   => new sfValidatorPass(array('required' => false)),
      'apellido1'                => new sfValidatorPass(array('required' => false)),
      'apellido2'                => new sfValidatorPass(array('required' => false)),
      'sexo'                     => new sfValidatorPass(array('required' => false)),
      'telefono'                 => new sfValidatorPass(array('required' => false)),
      'email'                    => new sfValidatorPass(array('required' => false)),
      'password'                 => new sfValidatorPass(array('required' => false)),
      'token_recuperar_password' => new sfValidatorPass(array('required' => false)),
      'estado_login'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'persona_concursos_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPersonaConcursosListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ParticipantePostulacion ParticipantePostulacion')
      ->andWhereIn('ParticipantePostulacion.persona_concurso_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Persona';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'tipo_profesor_id'         => 'ForeignKey',
      'unidad_academica_id'      => 'ForeignKey',
      'rut'                      => 'Number',
      'dv'                       => 'Text',
      'nombre'                   => 'Text',
      'apellido1'                => 'Text',
      'apellido2'                => 'Text',
      'sexo'                     => 'Text',
      'telefono'                 => 'Text',
      'email'                    => 'Text',
      'password'                 => 'Text',
      'token_recuperar_password' => 'Text',
      'estado_login'             => 'Number',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'persona_concursos_list'   => 'ManyKey',
    );
  }
}
