<?php

/**
 * Evaluacion filter form base class.
 *
 * @package    postulacion_interna
 * @subpackage filter
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEvaluacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_sistema_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaSistema'), 'add_empty' => true)),
      'persona_concurso_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'), 'add_empty' => true)),
      'nota'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario'              => new sfWidgetFormFilterInput(),
      'recomiendo_adjudicacion' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'persona_sistema_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PersonaSistema'), 'column' => 'id')),
      'persona_concurso_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PersonaConcurso'), 'column' => 'id')),
      'nota'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario'              => new sfValidatorPass(array('required' => false)),
      'recomiendo_adjudicacion' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('evaluacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evaluacion';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'persona_sistema_id'      => 'ForeignKey',
      'persona_concurso_id'     => 'ForeignKey',
      'nota'                    => 'Number',
      'estado'                  => 'Number',
      'comentario'              => 'Text',
      'recomiendo_adjudicacion' => 'Boolean',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
