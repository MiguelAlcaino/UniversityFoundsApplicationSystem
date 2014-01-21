<?php

/**
 * PersonaSistema form base class.
 *
 * @method PersonaSistema getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonaSistemaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'perfil'                   => new sfWidgetFormInputText(),
      'rut'                      => new sfWidgetFormInputText(),
      'dv'                       => new sfWidgetFormInputText(),
      'nombre'                   => new sfWidgetFormInputText(),
      'apellido1'                => new sfWidgetFormInputText(),
      'apellido2'                => new sfWidgetFormInputText(),
      'telefono'                 => new sfWidgetFormInputText(),
      'email'                    => new sfWidgetFormInputText(),
      'password'                 => new sfWidgetFormInputText(),
      'token_recuperar_password' => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'perfil'                   => new sfValidatorInteger(array('required' => false)),
      'rut'                      => new sfValidatorInteger(),
      'dv'                       => new sfValidatorString(array('max_length' => 1)),
      'nombre'                   => new sfValidatorString(array('max_length' => 255)),
      'apellido1'                => new sfValidatorString(array('max_length' => 255)),
      'apellido2'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'password'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token_recuperar_password' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'PersonaSistema', 'column' => array('rut'))),
        new sfValidatorDoctrineUnique(array('model' => 'PersonaSistema', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('persona_sistema[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaSistema';
  }

}
