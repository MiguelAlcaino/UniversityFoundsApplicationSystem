<?php

/**
 * PersonaSistema filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePersonaSistemaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'perfil'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rut'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dv'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido1'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido2'                => new sfWidgetFormFilterInput(),
      'telefono'                 => new sfWidgetFormFilterInput(),
      'email'                    => new sfWidgetFormFilterInput(),
      'password'                 => new sfWidgetFormFilterInput(),
      'token_recuperar_password' => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'perfil'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rut'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dv'                       => new sfValidatorPass(array('required' => false)),
      'nombre'                   => new sfValidatorPass(array('required' => false)),
      'apellido1'                => new sfValidatorPass(array('required' => false)),
      'apellido2'                => new sfValidatorPass(array('required' => false)),
      'telefono'                 => new sfValidatorPass(array('required' => false)),
      'email'                    => new sfValidatorPass(array('required' => false)),
      'password'                 => new sfValidatorPass(array('required' => false)),
      'token_recuperar_password' => new sfValidatorPass(array('required' => false)),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('persona_sistema_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaSistema';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'perfil'                   => 'Number',
      'rut'                      => 'Number',
      'dv'                       => 'Text',
      'nombre'                   => 'Text',
      'apellido1'                => 'Text',
      'apellido2'                => 'Text',
      'telefono'                 => 'Text',
      'email'                    => 'Text',
      'password'                 => 'Text',
      'token_recuperar_password' => 'Text',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
