<?php

class MailParticipanteForm extends sfForm{
	public function configure(){
		parent::configure();
		
		$this->setWidgets(array(
		'email' => new sfWidgetFormInput(array(),
		array('size' => 14)) 
		));
		
		$this->setValidators(
		array(
		'email' => new sfValidatorEmail(array('required'=> true), array('required'=> ' Debe ingresar un email','invalid'=>'Debe ingresar un email v&aacute;lido.'))
		)
		);
		 
		$this->widgetSchema->setNameFormat('mail_participante[%s]');
		$this->widgetSchema->setFormFormatterName('list');
	}
}