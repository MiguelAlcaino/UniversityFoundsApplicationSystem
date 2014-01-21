<?php

/**
 * ProyectoDePersona form base class.
 *
 * @method ProyectoDePersona getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProyectoDePersonaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'persona_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
      'tipo_proyecto'      => new sfWidgetFormInputText(),
      'fuente'             => new sfWidgetFormInputText(),
      'tipo_participacion' => new sfWidgetFormInputText(),
      'concurso'           => new sfWidgetFormInputText(),
      'codigo'             => new sfWidgetFormInputText(),
      'titulo'             => new sfWidgetFormInputText(),
      'es_valido'          => new sfWidgetFormInputCheckbox(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
      'tipo_proyecto'      => new sfValidatorInteger(),
      'fuente'             => new sfValidatorString(array('max_length' => 255)),
      'tipo_participacion' => new sfValidatorInteger(),
      'concurso'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'codigo'             => new sfValidatorString(array('max_length' => 255)),
      'titulo'             => new sfValidatorString(array('max_length' => 255)),
      'es_valido'          => new sfValidatorBoolean(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('proyecto_de_persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoDePersona';
  }

}
