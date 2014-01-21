<?php

class PersonaBackendForm extends BasePersonaForm{
    public function configure(){
      
      unset($this['created_at'], $this['updated_at'], $this['persona_concursos_list']);
      
      $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
      
      $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
        'expanded' => true,
        'choices'  => array('M'=>'Masculino', 'F'=>'Femenino'),
      ));
    }
  }
    
