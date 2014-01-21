<?php

/**
 * ItemConcurso filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseItemConcursoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'concurso_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'), 'add_empty' => true)),
      'item_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'monto_maximo'           => new sfWidgetFormFilterInput(),
      'porcentaje_maximo'      => new sfWidgetFormFilterInput(),
      'acronimo_recurso'       => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'persona_concursos_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso')),
    ));

    $this->setValidators(array(
      'concurso_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Concurso'), 'column' => 'id')),
      'item_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'id')),
      'monto_maximo'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'porcentaje_maximo'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'acronimo_recurso'       => new sfValidatorPass(array('required' => false)),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'persona_concursos_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item_concurso_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.Recurso Recurso')
      ->andWhereIn('Recurso.persona_concurso_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ItemConcurso';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'concurso_id'            => 'ForeignKey',
      'item_id'                => 'ForeignKey',
      'monto_maximo'           => 'Number',
      'porcentaje_maximo'      => 'Number',
      'acronimo_recurso'       => 'Text',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'persona_concursos_list' => 'ManyKey',
    );
  }
}
