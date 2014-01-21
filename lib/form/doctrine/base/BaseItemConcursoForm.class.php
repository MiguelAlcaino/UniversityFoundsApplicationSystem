<?php

/**
 * ItemConcurso form base class.
 *
 * @method ItemConcurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemConcursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'concurso_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'), 'add_empty' => false)),
      'item_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => false)),
      'monto_maximo'           => new sfWidgetFormInputText(),
      'porcentaje_maximo'      => new sfWidgetFormInputText(),
      'acronimo_recurso'       => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'persona_concursos_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'concurso_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'))),
      'item_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'))),
      'monto_maximo'           => new sfValidatorInteger(array('required' => false)),
      'porcentaje_maximo'      => new sfValidatorInteger(array('required' => false)),
      'acronimo_recurso'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
      'persona_concursos_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PersonaConcurso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item_concurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ItemConcurso';
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
