<?php

class BuscarPersonaForm extends sfForm{
	public function configure(){
		parent::configure();
		
		$this->setWidgets(array(
			'rut' => new sfWidgetFormInput(array(),
			array('size'=> 8)),
			'dv' => new sfWidgetFormInput(array(),
			array('size'=> 1)),
			'nombre' =>  new sfWidgetFormInput(),
			'apellido1' =>  new sfWidgetFormInput(),
			'apellido2' =>  new sfWidgetFormInput()));
		
		//$this->setValidators();
		$this->setValidators(
		array(
		        'rut' => new sfValidatorString(array('required' => false), array('required'=>'El campo de usuario es obligatorio')),
		        'dv' => new sfValidatorString(array('required' => false), array('required' => 'El campo contrase�a es obligatorio'))
		)
		);
		
		$this->widgetSchema->setNameFormat('buscar_persona[%s]');
    	$this->widgetSchema->setFormFormatterName('list');
	}
}