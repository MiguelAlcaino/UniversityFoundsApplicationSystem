<?php

/**
 * NotaProductividad form base class.
 *
 * @method NotaProductividad getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotaProductividadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                   => new sfWidgetFormInputHidden(),
      'evaluacion_id'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Evaluacion'), 'add_empty' => true)),
      'porcentaje_productividad_concurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PorcentajeProductividadConcurso'), 'add_empty' => true)),
      'nota'                                 => new sfWidgetFormInputText(),
      'created_at'                           => new sfWidgetFormDateTime(),
      'updated_at'                           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'evaluacion_id'                        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Evaluacion'), 'required' => false)),
      'porcentaje_productividad_concurso_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PorcentajeProductividadConcurso'), 'required' => false)),
      'nota'                                 => new sfValidatorInteger(array('required' => false)),
      'created_at'                           => new sfValidatorDateTime(),
      'updated_at'                           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('nota_productividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaProductividad';
  }

}
