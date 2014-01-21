<?php

/**
 * AjusteDetalleRecurso form base class.
 *
 * @method AjusteDetalleRecurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAjusteDetalleRecursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'ajuste_recurso_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AjusteRecurso'), 'add_empty' => false)),
      'detalle_recurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DetalleRecurso'), 'add_empty' => false)),
      'monto_aprobado'     => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'ajuste_recurso_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AjusteRecurso'))),
      'detalle_recurso_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DetalleRecurso'))),
      'monto_aprobado'     => new sfValidatorInteger(),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ajuste_detalle_recurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AjusteDetalleRecurso';
  }

}
