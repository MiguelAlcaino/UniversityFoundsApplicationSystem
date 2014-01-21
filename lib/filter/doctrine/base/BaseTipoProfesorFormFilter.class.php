<?php

/**
 * TipoProfesor filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTipoProfesorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_tipo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'concursos_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Concurso')),
    ));

    $this->setValidators(array(
      'tipo'           => new sfValidatorPass(array('required' => false)),
      'numero_tipo'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'concursos_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Concurso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_profesor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addConcursosListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('RestriccionConcurso.concurso_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'TipoProfesor';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'tipo'           => 'Text',
      'numero_tipo'    => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'concursos_list' => 'ManyKey',
    );
  }
}
