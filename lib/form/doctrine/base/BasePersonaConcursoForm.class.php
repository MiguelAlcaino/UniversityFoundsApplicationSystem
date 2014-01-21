<?php

/**
 * PersonaConcurso form base class.
 *
 * @method PersonaConcurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonaConcursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'concurso_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'), 'add_empty' => false)),
      'tesista_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tesista'), 'add_empty' => true)),
      'fecha_envio'            => new sfWidgetFormDateTime(),
      'estado'                 => new sfWidgetFormInputText(),
      'titulo'                 => new sfWidgetFormInputText(),
      'categoria_arte'         => new sfWidgetFormInputText(),
      'categoria_arte_otra'    => new sfWidgetFormInputText(),
      'ruta_pdf_postulacion'   => new sfWidgetFormInputText(),
      'estado_evaluacion'      => new sfWidgetFormInputText(),
      'esta_aprobado'          => new sfWidgetFormInputCheckbox(),
      'codigo_proyecto'        => new sfWidgetFormInputText(),
      'codigo_numerico'        => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'items_concurso_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ItemConcurso')),
      'personas_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Persona')),
      'personas_externas_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaExterna')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'concurso_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'))),
      'tesista_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tesista'), 'required' => false)),
      'fecha_envio'            => new sfValidatorDateTime(array('required' => false)),
      'estado'                 => new sfValidatorInteger(array('required' => false)),
      'titulo'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'categoria_arte'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'categoria_arte_otra'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ruta_pdf_postulacion'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado_evaluacion'      => new sfValidatorInteger(array('required' => false)),
      'esta_aprobado'          => new sfValidatorBoolean(array('required' => false)),
      'codigo_proyecto'        => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'codigo_numerico'        => new sfValidatorInteger(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
      'items_concurso_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ItemConcurso', 'required' => false)),
      'personas_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Persona', 'required' => false)),
      'personas_externas_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaExterna', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_concurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaConcurso';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['items_concurso_list']))
    {
      $this->setDefault('items_concurso_list', $this->object->ItemsConcurso->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['personas_list']))
    {
      $this->setDefault('personas_list', $this->object->Personas->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['personas_externas_list']))
    {
      $this->setDefault('personas_externas_list', $this->object->PersonasExternas->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveItemsConcursoList($con);
    $this->savePersonasList($con);
    $this->savePersonasExternasList($con);

    parent::doSave($con);
  }

  public function saveItemsConcursoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['items_concurso_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ItemsConcurso->getPrimaryKeys();
    $values = $this->getValue('items_concurso_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ItemsConcurso', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ItemsConcurso', array_values($link));
    }
  }

  public function savePersonasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['personas_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Personas->getPrimaryKeys();
    $values = $this->getValue('personas_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Personas', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Personas', array_values($link));
    }
  }

  public function savePersonasExternasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['personas_externas_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->PersonasExternas->getPrimaryKeys();
    $values = $this->getValue('personas_externas_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('PersonasExternas', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('PersonasExternas', array_values($link));
    }
  }

}
