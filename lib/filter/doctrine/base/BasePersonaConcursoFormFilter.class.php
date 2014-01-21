<?php

/**
 * PersonaConcurso filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePersonaConcursoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'concurso_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'), 'add_empty' => true)),
      'tesista_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tesista'), 'add_empty' => true)),
      'fecha_envio'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'estado'                 => new sfWidgetFormFilterInput(),
      'titulo'                 => new sfWidgetFormFilterInput(),
      'categoria_arte'         => new sfWidgetFormFilterInput(),
      'categoria_arte_otra'    => new sfWidgetFormFilterInput(),
      'ruta_pdf_postulacion'   => new sfWidgetFormFilterInput(),
      'estado_evaluacion'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'esta_aprobado'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'codigo_proyecto'        => new sfWidgetFormFilterInput(),
      'codigo_numerico'        => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'items_concurso_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ItemConcurso')),
      'personas_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Persona')),
      'personas_externas_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaExterna')),
    ));

    $this->setValidators(array(
      'concurso_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Concurso'), 'column' => 'id')),
      'tesista_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tesista'), 'column' => 'id')),
      'fecha_envio'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'estado'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'titulo'                 => new sfValidatorPass(array('required' => false)),
      'categoria_arte'         => new sfValidatorPass(array('required' => false)),
      'categoria_arte_otra'    => new sfValidatorPass(array('required' => false)),
      'ruta_pdf_postulacion'   => new sfValidatorPass(array('required' => false)),
      'estado_evaluacion'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'esta_aprobado'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'codigo_proyecto'        => new sfValidatorPass(array('required' => false)),
      'codigo_numerico'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'items_concurso_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ItemConcurso', 'required' => false)),
      'personas_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Persona', 'required' => false)),
      'personas_externas_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaExterna', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_concurso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addItemsConcursoListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.Recurso Recurso')
      ->andWhereIn('Recurso.item_concurso_id', $values)
    ;
  }

  public function addPersonasListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ParticipantePostulacion.persona_id', $values)
    ;
  }

  public function addPersonasExternasListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ParticipanteExterno.persona_externa_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'PersonaConcurso';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'concurso_id'            => 'ForeignKey',
      'tesista_id'             => 'ForeignKey',
      'fecha_envio'            => 'Date',
      'estado'                 => 'Number',
      'titulo'                 => 'Text',
      'categoria_arte'         => 'Text',
      'categoria_arte_otra'    => 'Text',
      'ruta_pdf_postulacion'   => 'Text',
      'estado_evaluacion'      => 'Number',
      'esta_aprobado'          => 'Boolean',
      'codigo_proyecto'        => 'Text',
      'codigo_numerico'        => 'Number',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'items_concurso_list'    => 'ManyKey',
      'personas_list'          => 'ManyKey',
      'personas_externas_list' => 'ManyKey',
    );
  }
}
