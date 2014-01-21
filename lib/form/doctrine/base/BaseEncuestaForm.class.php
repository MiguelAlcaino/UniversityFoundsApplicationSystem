<?php

/**
 * Encuesta form base class.
 *
 * @method Encuesta getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEncuestaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nombre'         => new sfWidgetFormInputText(),
      'fecha_inicio'   => new sfWidgetFormDateTime(),
      'fecha_termino'  => new sfWidgetFormDateTime(),
      'esta_publicada' => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'         => new sfValidatorString(array('max_length' => 255)),
      'fecha_inicio'   => new sfValidatorDateTime(),
      'fecha_termino'  => new sfValidatorDateTime(),
      'esta_publicada' => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('encuesta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Encuesta';
  }

}
