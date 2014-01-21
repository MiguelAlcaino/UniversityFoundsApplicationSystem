<?php

/**
 * AjusteRecurso form base class.
 *
 * @method AjusteRecurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAjusteRecursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'evaluacion_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Evaluacion'), 'add_empty' => false)),
      'recurso_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Recurso'), 'add_empty' => false)),
      'monto_aprobado' => new sfWidgetFormInputText(),
      'comentario'     => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'evaluacion_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Evaluacion'))),
      'recurso_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Recurso'))),
      'monto_aprobado' => new sfValidatorInteger(),
      'comentario'     => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ajuste_recurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AjusteRecurso';
  }

}
