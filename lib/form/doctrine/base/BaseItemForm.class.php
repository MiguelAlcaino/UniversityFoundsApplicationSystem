<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nombre_item'    => new sfWidgetFormInputText(),
      'acronimo'       => new sfWidgetFormInputText(),
      'tiene_subitem'  => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'concursos_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Concurso')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre_item'    => new sfValidatorString(array('max_length' => 255)),
      'acronimo'       => new sfValidatorString(array('max_length' => 255)),
      'tiene_subitem'  => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'concursos_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Concurso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['concursos_list']))
    {
      $this->setDefault('concursos_list', $this->object->Concursos->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveConcursosList($con);

    parent::doSave($con);
  }

  public function saveConcursosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['concursos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Concursos->getPrimaryKeys();
    $values = $this->getValue('concursos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Concursos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Concursos', array_values($link));
    }
  }

}
