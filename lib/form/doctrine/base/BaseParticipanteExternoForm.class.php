<?php

/**
 * ParticipanteExterno form base class.
 *
 * @method ParticipanteExterno getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParticipanteExternoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'persona_externa_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaExterna'), 'add_empty' => false)),
      'persona_concurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'), 'add_empty' => false)),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_externa_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaExterna'))),
      'persona_concurso_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'))),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('participante_externo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParticipanteExterno';
  }

}
