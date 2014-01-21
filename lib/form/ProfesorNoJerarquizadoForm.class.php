<?php

class ProfesorNoJerarquizadoForm extends BasePersonaForm{
    public function configure(){
        unset($this['tipo_profesor_id'], $this['password'],
        $this['estado_login'], $this['created_at'], $this['updated_at'],
        $this['persona_concursos_list'], $this['estado_login']);
        
        $this->widgetSchema['rut']->setAttribute('size',8);
        $this->widgetSchema['dv']->setAttribute('size',1);
        
        $this->widgetSchema['apellido1']->setLabel('Apellido Paterno');
        $this->widgetSchema['apellido2']->setLabel('Apellido Materno');
        $this->widgetSchema['telefono']->setLabel('Tel&eacute;fono');
        $this->widgetSchema['unidad_academica_id']->setLabel('Unidad Acad&eacutemica');
        
        
        $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Persona', 'column' => array('rut')), array('invalid' => 'El rut ingresado ya se encuentra registrado.'))
    );
    $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
        //$subform = new sfForm();
        
        //for($i=0; $i<3;$i++){
          //  $archivo_de_persona = new ArchivoDePersona();
            //$archivo_de_persona->setTipoArchivo($i+1);
            //$archivo_de_persona->setPersona($this->getObject());
            //$archivo_de_persona_form = new ArchivoDePersonaForm($archivo_de_persona);
            //$subform->embedForm('archivo_de_persona_'.($i+1), $archivo_de_persona_form);
            
        //}
        //$this->embedForm('archivos', $subform);
    }
}
