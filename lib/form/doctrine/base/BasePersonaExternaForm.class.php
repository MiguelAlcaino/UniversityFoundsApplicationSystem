<?php

/**
 * PersonaExterna form base class.
 *
 * @method PersonaExterna getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonaExternaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                        => new sfWidgetFormInputHidden(),
      'rut'                                       => new sfWidgetFormInputText(),
      'dv'                                        => new sfWidgetFormInputText(),
      'nombre'                                    => new sfWidgetFormInputText(),
      'apellido1'                                 => new sfWidgetFormInputText(),
      'apellido2'                                 => new sfWidgetFormInputText(),
      'nombre_universidad'                        => new sfWidgetFormInputText(),
      'telefono'                                  => new sfWidgetFormInputText(),
      'email'                                     => new sfWidgetFormInputText(),
      'jerarquia'                                 => new sfWidgetFormInputText(),
      'compromiso_contractual_con_la_universidad' => new sfWidgetFormInputText(),
      'created_at'                                => new sfWidgetFormDateTime(),
      'updated_at'                                => new sfWidgetFormDateTime(),
      'persona_concursos_list'                    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso')),
    ));

    $this->setValidators(array(
      'id'                                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rut'                                       => new sfValidatorInteger(),
      'dv'                                        => new sfValidatorString(array('max_length' => 1)),
      'nombre'                                    => new sfValidatorString(array('max_length' => 255)),
      'apellido1'                                 => new sfValidatorString(array('max_length' => 255)),
      'apellido2'                                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_universidad'                        => new sfValidatorString(array('max_length' => 255)),
      'telefono'                                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                                     => new sfValidatorString(array('max_length' => 255)),
      'jerarquia'                                 => new sfValidatorString(array('max_length' => 255)),
      'compromiso_contractual_con_la_universidad' => new sfValidatorString(array('max_length' => 255)),
      'created_at'                                => new sfValidatorDateTime(),
      'updated_at'                                => new sfValidatorDateTime(),
      'persona_concursos_list'                    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PersonaExterna', 'column' => array('rut')))
    );

    $this->widgetSchema->setNameFormat('persona_externa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaExterna';
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
