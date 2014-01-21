<?php

class PasswordForm extends sfForm{
	public function configure(){
		parent::configure();
		
		$this->setWidgets(array(
			'rut' => new sfWidgetFormInput(array(),
			array('size'=> 8)),
			'dv' => new sfWidgetFormInput(array(),
			array('size'=> 1)),
            'email'=> new sfWidgetFormInput(array(),
            array('size' => 14)),
            'telefono'=> new sfWidgetFormInput(array(),
            array('size'=> 14))));
		
        
        //$this->widgetSchema['password']->setLabel('Contrase&ntilde;a');
        
		//$this->setValidators();
		$this->setValidators(
		array(
		        'rut' => new sfValidatorString(array('required' => true), array('required'=>'El campo de rut es obligatorio')),
		        'dv' => new sfValidatorString(array('required' => true), array('required' => 'El campo dv es obligatorio')),
                'email' => new sfValidatorEmail(array('required'=> true), array('required'=> ' Debe ingresar un email','invalid'=>'Debe ingresar un email v&aacute;lido.')),
                'telefono' =>new sfValidatorString(array('required' => true), array('required' => 'El campo tel&eacute;fono es obligatorio')),
		)
		);
        
        $this->validatorSchema['email'] = new sfValidatorAnd(
        	array($this->validatorSchema['email'], new DominioMailValidator())
        );
		
		$this->widgetSchema->setNameFormat('password_form[%s]');
    	$this->widgetSchema->setFormFormatterName('list');
        $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
        $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
	}
}