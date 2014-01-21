<?php

/**
 * ArchivoPostulacion form base class.
 *
 * @method ArchivoPostulacion getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArchivoPostulacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'id_tipo_archivo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoArchivo'), 'add_empty' => false)),
      'id_persona_concurso' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'), 'add_empty' => false)),
      'ruta'                => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_tipo_archivo'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoArchivo'))),
      'id_persona_concurso' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonaConcurso'))),
      'ruta'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('archivo_postulacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoPostulacion';
  }

}
