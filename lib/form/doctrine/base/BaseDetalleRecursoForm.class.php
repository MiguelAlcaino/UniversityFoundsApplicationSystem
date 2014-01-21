<?php

/**
 * DetalleRecurso form base class.
 *
 * @method DetalleRecurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetalleRecursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'recurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Recurso'), 'add_empty' => false)),
      'periodo'    => new sfWidgetFormInputText(),
      'monto'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'recurso_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Recurso'))),
      'periodo'    => new sfValidatorInteger(),
      'monto'      => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('detalle_recurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleRecurso';
  }

}
