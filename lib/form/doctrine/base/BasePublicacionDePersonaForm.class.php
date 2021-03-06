<?php

/**
 * PublicacionDePersona form base class.
 *
 * @method PublicacionDePersona getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublicacionDePersonaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'persona_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
      'tipo_publicacion'   => new sfWidgetFormInputText(),
      'nombre_revista'     => new sfWidgetFormInputText(),
      'titulo_publicacion' => new sfWidgetFormInputText(),
      'anio'               => new sfWidgetFormInputText(),
      'volumen'            => new sfWidgetFormInputText(),
      'numero'             => new sfWidgetFormInputText(),
      'es_isi'             => new sfWidgetFormInputCheckbox(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
      'tipo_publicacion'   => new sfValidatorString(array('max_length' => 20)),
      'nombre_revista'     => new sfValidatorString(array('max_length' => 255)),
      'titulo_publicacion' => new sfValidatorString(array('max_length' => 255)),
      'anio'               => new sfValidatorInteger(array('required' => false)),
      'volumen'            => new sfValidatorInteger(array('required' => false)),
      'numero'             => new sfValidatorInteger(array('required' => false)),
      'es_isi'             => new sfValidatorBoolean(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('publicacion_de_persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PublicacionDePersona';
  }

}
