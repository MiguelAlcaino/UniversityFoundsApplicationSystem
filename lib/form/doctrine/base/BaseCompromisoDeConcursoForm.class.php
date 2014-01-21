<?php

/**
 * CompromisoDeConcurso form base class.
 *
 * @method CompromisoDeConcurso getObject() Returns the current form's model object
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompromisoDeConcursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'concurso_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'), 'add_empty' => false)),
      'tipo'        => new sfWidgetFormInputText(),
      'orden'       => new sfWidgetFormInputText(),
      'texto'       => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'concurso_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Concurso'))),
      'tipo'        => new sfValidatorInteger(array('required' => false)),
      'orden'       => new sfValidatorInteger(),
      'texto'       => new sfValidatorString(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('compromiso_de_concurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompromisoDeConcurso';
  }

}
