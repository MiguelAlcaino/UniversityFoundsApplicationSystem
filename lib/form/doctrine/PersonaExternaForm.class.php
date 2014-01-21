<?php

/**
 * PersonaExterna form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonaExternaForm extends BasePersonaExternaForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at'], $this['persona_concursos_list']);
  	
  	$this->widgetSchema['rut'] = new sfWidgetFormInput(array(),
  	array('size'=> 8));
  	$this->widgetSchema['dv'] = new sfWidgetFormInput(array(),
  	array('size'=> 1));
  	 
  	$this->widgetSchema['apellido1']->setLabel('Apellido Paterno');
  	$this->widgetSchema['apellido2']->setLabel('Apellido Materno');
  	 
  	$this->validatorSchema['email'] = new sfValidatorAnd(array(
  	$this->validatorSchema['email'],
  	new sfValidatorEmail(),
  	));
  }
}
