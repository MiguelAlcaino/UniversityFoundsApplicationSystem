<?php

class NuevaPasswordForm extends sfForm{
	public function configure(){
		parent::configure();
		
		$this->setWidgets(array(
		'password'  => new sfWidgetFormInputPassword(),
    'password2' => new sfWidgetFormInputPassword()
			));
		$this->widgetSchema['password']->setLabel('Escriba su nueva contraseña');
		$this->widgetSchema['password2']->setLabel('Repita su nueva contraseña');
        //$this->widgetSchema['password']->setLabel('Contrase&ntilde;a');
        
		//$this->setValidators();
		$this->setValidators(array(
            'password'  => new sfValidatorString(array('required'=>true), array('required'=> "La contraseña es obligatoria")),
            'password2' => new sfValidatorString(array('required'=>true), array('required'=> "La contraseña es obligatoria")),
	));
        
        $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
            new sfValidatorSchemaCompare('password2', sfValidatorSchemaCompare::EQUAL, 'password', array('throw_global_error' => true), array('invalid' => "Las dos contraseñas no coinciden"))
        )));
		
		$this->widgetSchema->setNameFormat('password_form[%s]');
    	$this->widgetSchema->setFormFormatterName('list');
        $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
        $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
	}
}
