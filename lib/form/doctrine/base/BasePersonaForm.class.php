<?php

/**
 * Persona form base class.
 *
 * @method Persona getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'tipo_profesor_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoProfesor'), 'add_empty' => false)),
      'unidad_academica_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadAcademica'), 'add_empty' => false)),
      'rut'                      => new sfWidgetFormInputText(),
      'dv'                       => new sfWidgetFormInputText(),
      'nombre'                   => new sfWidgetFormInputText(),
      'apellido1'                => new sfWidgetFormInputText(),
      'apellido2'                => new sfWidgetFormInputText(),
      'sexo'                     => new sfWidgetFormInputText(),
      'telefono'                 => new sfWidgetFormInputText(),
      'email'                    => new sfWidgetFormInputText(),
      'password'                 => new sfWidgetFormInputText(),
      'token_recuperar_password' => new sfWidgetFormInputText(),
      'estado_login'             => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'persona_concursos_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tipo_profesor_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoProfesor'))),
      'unidad_academica_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadAcademica'))),
      'rut'                      => new sfValidatorInteger(),
      'dv'                       => new sfValidatorString(array('max_length' => 1)),
      'nombre'                   => new sfValidatorString(array('max_length' => 255)),
      'apellido1'                => new sfValidatorString(array('max_length' => 255)),
      'apellido2'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sexo'                     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'telefono'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'password'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token_recuperar_password' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado_login'             => new sfValidatorInteger(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'persona_concursos_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Persona', 'column' => array('rut'))),
        new sfValidatorDoctrineUnique(array('model' => 'Persona', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['persona_concursos_list']))
    {
      $this->setDefault('persona_concursos_list', $this->object->PersonaConcursos->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePersonaConcursosList($con);

    parent::doSave($con);
  }

  public function savePersonaConcursosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['persona_concursos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->PersonaConcursos->getPrimaryKeys();
    $values = $this->getValue('persona_concursos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('PersonaConcursos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('PersonaConcursos', array_values($link));
    }
  }

}
