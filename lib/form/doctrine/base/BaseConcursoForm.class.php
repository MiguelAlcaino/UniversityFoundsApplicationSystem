<?php

/**
 * Concurso form base class.
 *
 * @method Concurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConcursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'convocatoria_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Convocatoria'), 'add_empty' => true)),
      'nombre_concurso'           => new sfWidgetFormInputText(),
      'acronimo'                  => new sfWidgetFormInputText(),
      'monto_maximo'              => new sfWidgetFormInputText(),
      'inicio_postulacion'        => new sfWidgetFormDateTime(),
      'termino_postulacion'       => new sfWidgetFormDateTime(),
      'duracion'                  => new sfWidgetFormInputText(),
      'porcentaje_formulacion'    => new sfWidgetFormInputText(),
      'porcentaje_productividad'  => new sfWidgetFormInputText(),
      'maximo_isis'               => new sfWidgetFormInputText(),
      'maximo_proyectos_fondecyt' => new sfWidgetFormInputText(),
      'maximo_proyectos_internos' => new sfWidgetFormInputText(),
      'created_at'                => new sfWidgetFormDateTime(),
      'updated_at'                => new sfWidgetFormDateTime(),
      'items_list'                => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
      'tipos_profesores_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'TipoProfesor')),
      'tipo_archivos_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'TipoArchivo')),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'convocatoria_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Convocatoria'), 'required' => false)),
      'nombre_concurso'           => new sfValidatorString(array('max_length' => 255)),
      'acronimo'                  => new sfValidatorString(array('max_length' => 255)),
      'monto_maximo'              => new sfValidatorInteger(),
      'inicio_postulacion'        => new sfValidatorDateTime(array('required' => false)),
      'termino_postulacion'       => new sfValidatorDateTime(array('required' => false)),
      'duracion'                  => new sfValidatorInteger(array('required' => false)),
      'porcentaje_formulacion'    => new sfValidatorInteger(array('required' => false)),
      'porcentaje_productividad'  => new sfValidatorInteger(array('required' => false)),
      'maximo_isis'               => new sfValidatorInteger(array('required' => false)),
      'maximo_proyectos_fondecyt' => new sfValidatorInteger(array('required' => false)),
      'maximo_proyectos_internos' => new sfValidatorInteger(array('required' => false)),
      'created_at'                => new sfValidatorDateTime(),
      'updated_at'                => new sfValidatorDateTime(),
      'items_list'                => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
      'tipos_profesores_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'TipoProfesor', 'required' => false)),
      'tipo_archivos_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'TipoArchivo', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('concurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Concurso';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['items_list']))
    {
      $this->setDefault('items_list', $this->object->Items->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['tipos_profesores_list']))
    {
      $this->setDefault('tipos_profesores_list', $this->object->TiposProfesores->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['tipo_archivos_list']))
    {
      $this->setDefault('tipo_archivos_list', $this->object->TipoArchivos->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveItemsList($con);
    $this->saveTiposProfesoresList($con);
    $this->saveTipoArchivosList($con);

    parent::doSave($con);
  }

  public function saveItemsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['items_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Items->getPrimaryKeys();
    $values = $this->getValue('items_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Items', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Items', array_values($link));
    }
  }

  public function saveTiposProfesoresList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tipos_profesores_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->TiposProfesores->getPrimaryKeys();
    $values = $this->getValue('tipos_profesores_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('TiposProfesores', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('TiposProfesores', array_values($link));
    }
  }

  public function saveTipoArchivosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tipo_archivos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->TipoArchivos->getPrimaryKeys();
    $values = $this->getValue('tipo_archivos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('TipoArchivos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('TipoArchivos', array_values($link));
    }
  }

}
