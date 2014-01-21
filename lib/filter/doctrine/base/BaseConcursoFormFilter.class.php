<?php

/**
 * Concurso filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConcursoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'convocatoria_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Convocatoria'), 'add_empty' => true)),
      'nombre_concurso'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'acronimo'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'monto_maximo'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'inicio_postulacion'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'termino_postulacion'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'duracion'                  => new sfWidgetFormFilterInput(),
      'porcentaje_formulacion'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'porcentaje_productividad'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maximo_isis'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maximo_proyectos_fondecyt' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maximo_proyectos_internos' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'items_list'                => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
      'tipos_profesores_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'TipoProfesor')),
      'tipo_archivos_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'TipoArchivo')),
    ));

    $this->setValidators(array(
      'convocatoria_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Convocatoria'), 'column' => 'id')),
      'nombre_concurso'           => new sfValidatorPass(array('required' => false)),
      'acronimo'                  => new sfValidatorPass(array('required' => false)),
      'monto_maximo'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'inicio_postulacion'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'termino_postulacion'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'duracion'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'porcentaje_formulacion'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'porcentaje_productividad'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'maximo_isis'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'maximo_proyectos_fondecyt' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'maximo_proyectos_internos' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'items_list'                => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
      'tipos_profesores_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'TipoProfesor', 'required' => false)),
      'tipo_archivos_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'TipoArchivo', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('concurso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addItemsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ItemConcurso ItemConcurso')
      ->andWhereIn('ItemConcurso.item_id', $values)
    ;
  }

  public function addTiposProfesoresListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.RestriccionConcurso RestriccionConcurso')
      ->andWhereIn('RestriccionConcurso.tipo_profesor_id', $values)
    ;
  }

  public function addTipoArchivosListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ConcursoTipoArchivo ConcursoTipoArchivo')
      ->andWhereIn('ConcursoTipoArchivo.tipo_archivo_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Concurso';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'convocatoria_id'           => 'ForeignKey',
      'nombre_concurso'           => 'Text',
      'acronimo'                  => 'Text',
      'monto_maximo'              => 'Number',
      'inicio_postulacion'        => 'Date',
      'termino_postulacion'       => 'Date',
      'duracion'                  => 'Number',
      'porcentaje_formulacion'    => 'Number',
      'porcentaje_productividad'  => 'Number',
      'maximo_isis'               => 'Number',
      'maximo_proyectos_fondecyt' => 'Number',
      'maximo_proyectos_internos' => 'Number',
      'created_at'                => 'Date',
      'updated_at'                => 'Date',
      'items_list'                => 'ManyKey',
      'tipos_profesores_list'     => 'ManyKey',
      'tipo_archivos_list'        => 'ManyKey',
    );
  }
}
