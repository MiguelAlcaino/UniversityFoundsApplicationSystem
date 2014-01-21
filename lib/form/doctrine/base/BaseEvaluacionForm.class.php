<?php

/**
 * Evaluacion form base class.
 *
 * @method Evaluacion getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEvaluacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'persona_sistema_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaSistema'), 'add_empty' => false)),
      'persona_concurso_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'), 'add_empty' => false)),
      'nota'                    => new sfWidgetFormInputText(),
      'estado'                  => new sfWidgetFormInputText(),
      'comentario'              => new sfWidgetFormTextarea(),
      'recomiendo_adjudicacion' => new sfWidgetFormInputCheckbox(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_sistema_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaSistema'))),
      'persona_concurso_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'))),
      'nota'                    => new sfValidatorInteger(array('required' => false)),
      'estado'                  => new sfValidatorInteger(array('required' => false)),
      'comentario'              => new sfValidatorString(array('required' => false)),
      'recomiendo_adjudicacion' => new sfValidatorBoolean(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('evaluacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evaluacion';
  }

}
