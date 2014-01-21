<?php

/**
 * Tesista form base class.
 *
 * @method Tesista getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTesistaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'doctorado_acreditado_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DoctoradoAcreditado'), 'add_empty' => false)),
      'rut'                     => new sfWidgetFormInputText(),
      'dv'                      => new sfWidgetFormInputText(),
      'nombre'                  => new sfWidgetFormInputText(),
      'apellido1'               => new sfWidgetFormInputText(),
      'apellido2'               => new sfWidgetFormInputText(),
      'sexo'                    => new sfWidgetFormInputText(),
      'telefono'                => new sfWidgetFormInputText(),
      'email'                   => new sfWidgetFormInputText(),
      'ruta_notas'              => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'doctorado_acreditado_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DoctoradoAcreditado'))),
      'rut'                     => new sfValidatorInteger(),
      'dv'                      => new sfValidatorString(array('max_length' => 1)),
      'nombre'                  => new sfValidatorString(array('max_length' => 255)),
      'apellido1'               => new sfValidatorString(array('max_length' => 255)),
      'apellido2'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sexo'                    => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'telefono'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                   => new sfValidatorString(array('max_length' => 255)),
      'ruta_notas'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Tesista', 'column' => array('rut')))
    );

    $this->widgetSchema->setNameFormat('tesista[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tesista';
  }

}
