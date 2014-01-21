<?php

class RecuperarPasswordForm extends sfForm{
	public function configure(){
		parent::configure();
		
		$this->setWidgets(array(
			'email'=> new sfWidgetFormInput(array(),
            array('size' => 14) ) ) );
		$this->widgetSchema['email']->setLabel('Escriba su correo electrónico');
		//$this->setValidators();
		$this->setValidators(
		array(
		  'email' => new sfValidatorEmail(array('required'=> true), array('required'=> ' Debe ingresar un email','invalid'=>'Debe ingresar un email v&aacute;lido.'))
		)
		);
        
    
		
		$this->widgetSchema->setNameFormat('recuperar[%s]');
    	$this->widgetSchema->setFormFormatterName('list');
        $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
        $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
	}
}
