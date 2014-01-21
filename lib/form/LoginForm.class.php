<?php

class LoginForm extends sfForm{
	public function configure(){
		parent::configure();
		
		$this->setWidgets(array(
			'rut' => new sfWidgetFormInput(array(),
			array('size'=> 8)),
			'dv' => new sfWidgetFormInput(array(),
			array('size'=> 1)),
            'password' => new sfWidgetFormInputPassword(array(),
            array('size'=>14))));
		
		//$this->setValidators();
		$this->setValidators(
		array(
		        'rut' => new sfValidatorString(array('required' => true), array('required'=>'El campo de rut es obligatorio')),
		        'dv' => new sfValidatorString(array('required' => true), array('required' => 'El campo dv es obligatorio')),
                'password' => new sfValidatorString(array('required' => true), array('required' => 'El campo password es obligatorio'))
		)
		);
        
        
		
		$this->widgetSchema->setNameFormat('login[%s]');
    	$this->widgetSchema->setFormFormatterName('list');
        $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
        $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
	}
}