<?php

/**
 * CapituloLibroDePersona form base class.
 *
 * @method CapituloLibroDePersona getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCapituloLibroDePersonaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'persona_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'), 'add_empty' => false)),
      'nombre_libro'    => new sfWidgetFormInputText(),
      'nombre_capitulo' => new sfWidgetFormInputText(),
      'editorial'       => new sfWidgetFormInputText(),
      'anio'            => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'persona_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Persona'))),
      'nombre_libro'    => new sfValidatorString(array('max_length' => 255)),
      'nombre_capitulo' => new sfValidatorString(array('max_length' => 255)),
      'editorial'       => new sfValidatorString(array('max_length' => 255)),
      'anio'            => new sfValidatorInteger(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('capitulo_libro_de_persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CapituloLibroDePersona';
  }

}
