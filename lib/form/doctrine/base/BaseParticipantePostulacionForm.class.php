<?php

/**
 * ParticipantePostulacion form base class.
 *
 * @method ParticipantePostulacion getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParticipantePostulacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'persona_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
      'persona_concurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'), 'add_empty' => false)),
      'email'               => new sfWidgetFormInputText(),
      'tipo_participante'   => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
      'persona_concurso_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'))),
      'email'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo_participante'   => new sfValidatorInteger(),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('participante_postulacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParticipantePostulacion';
  }

}
