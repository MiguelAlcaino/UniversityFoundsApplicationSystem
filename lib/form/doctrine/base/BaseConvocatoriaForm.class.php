<?php

/**
 * Convocatoria form base class.
 *
 * @method Convocatoria getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConvocatoriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'anio'                   => new sfWidgetFormInputText(),
      'nombre'                 => new sfWidgetFormInputText(),
      'esta_vigente'           => new sfWidgetFormInputCheckbox(),
      'fecha_firma_convenio'   => new sfWidgetFormDateTime(),
      'fecha_termino_convenio' => new sfWidgetFormDateTime(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'anio'                   => new sfValidatorInteger(),
      'nombre'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'esta_vigente'           => new sfValidatorBoolean(array('required' => false)),
      'fecha_firma_convenio'   => new sfValidatorDateTime(array('required' => false)),
      'fecha_termino_convenio' => new sfValidatorDateTime(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('convocatoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Convocatoria';
  }

}
