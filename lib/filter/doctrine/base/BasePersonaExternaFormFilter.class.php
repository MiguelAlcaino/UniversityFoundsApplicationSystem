<?php

/**
 * PersonaExterna filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePersonaExternaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rut'                                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dv'                                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'                                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido1'                                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido2'                                 => new sfWidgetFormFilterInput(),
      'nombre_universidad'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'                                  => new sfWidgetFormFilterInput(),
      'email'                                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'jerarquia'                                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'compromiso_contractual_con_la_universidad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'persona_concursos_list'                    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso')),
    ));

    $this->setValidators(array(
      'rut'                                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dv'                                        => new sfValidatorPass(array('required' => false)),
      'nombre'                                    => new sfValidatorPass(array('required' => false)),
      'apellido1'                                 => new sfValidatorPass(array('required' => false)),
      'apellido2'                                 => new sfValidatorPass(array('required' => false)),
      'nombre_universidad'                        => new sfValidatorPass(array('required' => false)),
      'telefono'                                  => new sfValidatorPass(array('required' => false)),
      'email'                                     => new sfValidatorPass(array('required' => false)),
      'jerarquia'                                 => new sfValidatorPass(array('required' => false)),
      'compromiso_contractual_con_la_universidad' => new sfValidatorPass(array('required' => false)),
      'created_at'                                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'persona_concursos_list'                    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_externa_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.ParticipanteExterno ParticipanteExterno')
      ->andWhereIn('ParticipanteExterno.persona_concurso_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'PersonaExterna';
  }

  public function getFields()
  {
    return array(
      'id'                                        => 'Number',
      'rut'                                       => 'Number',
      'dv'                                        => 'Text',
      'nombre'                                    => 'Text',
      'apellido1'                                 => 'Text',
      'apellido2'                                 => 'Text',
      'nombre_universidad'                        => 'Text',
      'telefono'                                  => 'Text',
      'email'                                     => 'Text',
      'jerarquia'                                 => 'Text',
      'compromiso_contractual_con_la_universidad' => 'Text',
      'created_at'                                => 'Date',
      'updated_at'                                => 'Date',
      'persona_concursos_list'                    => 'ManyKey',
    );
  }
}
