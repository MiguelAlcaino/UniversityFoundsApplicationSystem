<?php

/**
 * Encuesta form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EncuestaForm extends BaseEncuestaForm
{
  public function configure()
  {
    
    unset($this['created_at'], $this['updated_at']);
    
    
    
    //$this->validatorSchema->setOption('allow_extra_fields', true);    
        
    //$this->widgetSchema['fecha_inicio'] = new sfWidgetFormJQueryDate(array('culture' => 'es'));
    //$this->widgetSchema['fecha_termino'] = new sfWidgetFormJQueryDate(array('culture' => 'es'));
    
    //$this->widgetSchema['nombre']->setAttribute('class','hola');
    
    $form = new sfForm();
    if(false === sfContext::getInstance()->getRequest()->isXmlHttpRequest()){
    
    if(count($this->getObject()->getPreguntas()) == 0){
    
    for($i=0; $i<3;$i++){
      $pregunta = new Pregunta();
      $pregunta->setEncuesta($this->getObject());
      $pregunta_form = new PreguntaForm($pregunta);

      $form_alternativas = new sfForm();
      
      for($j=0;$j<2;$j++){
        $alternativa = new Alternativa();
        $alternativa->setPregunta($pregunta);
        $alternativa_form = new AlternativaForm($alternativa);
        $form_alternativas->embedForm('alternativa_'.$j,$alternativa_form);
      }
      $pregunta_form->embedForm('alternativas',$form_alternativas);
      $form->embedForm('pregunta_'.($i+1),$pregunta_form);
      
    }
    }else{
      $i=0;
      foreach($this->getObject()->getPreguntas() as $key_preguntas => $pregunta){
        $pregunta_form = new PreguntaForm($pregunta);
        $form_alternativas = new sfForm();
        $j=0;
        foreach($pregunta->getAlternativas() as $key_alternativa => $alternativa){
          $alternativa_form = new AlternativaForm($alternativa);
          $form_alternativas->embedForm('alternativa_'.$j,$alternativa_form);
          $j++;
        }
      $pregunta_form->embedForm('alternativas',$form_alternativas);
      $form->embedForm('pregunta_'.($i+1),$pregunta_form);
      $i++;
      }
    }
    }
    $this->embedForm('preguntas',$form);
    
  }
  
  public function addAlternativa($key_alternativa, $key_pregunta)
  {
    $pregunta = new Pregunta();
    $pregunta_form = new PreguntaForm($pregunta);
    
    $preguntas_form = new sfForm();
    $alternativas_form = new sfForm();
    
    $alternativa = new Alternativa();
    $alternativa->setPregunta($pregunta);
    $alternativa_form = new AlternativaForm($alternativa);

    $alternativas_form->embedForm($key_alternativa, $alternativa_form);
    $pregunta_form->embedForm('alternativas', $alternativas_form);
    $preguntas_form->embedForm($key_pregunta, $pregunta_form);
    
    
    $this->embedForm('preguntas', $preguntas_form);
    
    
    //$alternativa->setPregunta($this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->getObject());
    //$this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas']->embedForm($key_alternativa, new AlternativaForm($alternativa));
    //$this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embedForm('alternativas', $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas']);
  }
  
  public function addPregunta($key_pregunta)
  {
    $pregunta = new Pregunta();
    $pregunta->setEncuesta($this->getObject());
    
    $form_alternativas = new sfForm();
    for($j=0;$j<2;$j++){
        $alternativa = new Alternativa();
        $alternativa->setPregunta($pregunta);
        $alternativa_form = new AlternativaForm($alternativa);
        $form_alternativas->embedForm('alternativa_'.$j,$alternativa_form);
      }
    $pregunta_form = new PreguntaForm($pregunta);
    
    $pregunta_form->embedForm('alternativas', $form_alternativas);
    
    $this->embeddedForms['preguntas']->embedForm($key_pregunta, $pregunta_form);
    $this->embedForm('preguntas', $this->embeddedForms['preguntas']);
  }
  
  
//ACA TENGO QUE HACER ALGO PARA AGREGAR LA CANTIDAD DE ALTERNATIVAS A UN FORMULARIO DE PREGUNTAS, YA QUE ACUTALEMNTE CON EL METODO ADDALTERNATIVA CREO UN FORMULARIO DE PREGUNTA NUEVO. qUEDARIA LA CAGADA POR CADA ALTERNATIVA HABRIA UN APREGUNTA APADRE... Y NECESITO que esta iteracion anide formularios de alterantivas dentro de un mismo formulario de preguntas.
  
  
  public function bind(array $taintedValues = null, array $taintedFiles = null)// VOY AQUIII
  {
    /*
    $form = new sfForm();
    //for($i=0; $i<3;$i++){
    foreach($taintedValues['preguntas'] as $key_pregunta => $pregunta1){
      $pregunta = new Pregunta();
      $pregunta->setEncuesta($this->getObject());
      $pregunta_form = new PreguntaForm($pregunta);

      $form_alternativas = new sfForm();
      
      //for($j=0;$j<2;$j++){
      foreach($pregunta['alternativas'] as $key_alternativa => $alternativa1){
        $alternativa = new Alternativa();
        $alternativa->setPregunta($pregunta);
        $alternativa_form = new AlternativaForm($alternativa);
        $form_alternativas->embedForm($key_alternativa, $alternativa_form);
      }
      $pregunta_form->embedForm('alternativas',$form_alternativas);
      $form->embedForm($key_pregunta, $pregunta_form);
      
    }
    $this->embedForm('preguntas',$form); */
  
  
    //$preguntas_form = new sfForm();
    foreach($taintedValues['preguntas'] as $key_pregunta => $pregunta){
      if(false == $this->embeddedForms['preguntas']->offsetExists($key_pregunta)){ // Caso que la pregunta no exista en el objeto EncuestaForm original
        $pregunta_aux = new Pregunta();
        $pregunta_aux->setEncuesta($this->getObject());
        $pregunta_form = new PreguntaForm($pregunta_aux);
        $j=0;
        $alternativas_form = new sfForm();
        foreach($pregunta['alternativas'] as $key_alternativa => $alternativa){
          //if($false == $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas']->offsetExists($key_alternativa)){
            //$this->addAlternativa();
            $alternativa_aux = new Alternativa();
            $alternativa_aux->setPregunta($pregunta_aux);
            $alternativas_form->embedForm($key_alternativa, new AlternativaForm($alternativa_aux));
            //$this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas']->embedForm($key_alternativa, new AlternativaForm($alternativa_aux));
          //}
          
          
          //$pregunta_form->embedForm('alternativas',$alternativas_form);
          
        }
        $pregunta_form->embedForm('alternativas', $alternativas_form);
        $this->embeddedForms['preguntas']->embedForm($key_pregunta, $pregunta_form);
        $this->embedForm('preguntas', $this->embeddedForms['preguntas']);
      //$preguntas_form->embedForms();
      //echo $this;
      
      }else{ //caso en que la pregunta sí exista en el objeto EncuestaForm original
        foreach($pregunta['alternativas'] as $key_alternativa => $alternativa){
          if(false == $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas']->offsetExists($key_alternativa)){
            
            $alternativa_aux = new Alternativa();
            $alternativa_aux->setPregunta($this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->getObject());
            
            $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas']->embedForm($key_alternativa, new AlternativaForm($alternativa_aux));
            
            $alternativas = $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas'];
            
            //$this['preguntas'][$key_pregunta]['alternativas']->embedForm($key_alternativa,new AlternativaForm($alternativa_aux));
            //echo $alternativas."<br />";
            
            $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embedForm('alternativas', $alternativas);
            //echo $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta];
            $this->embeddedForms['preguntas']->embedForm($key_pregunta, $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]);
            
            $this->embedForm('preguntas', $this->embeddedForms['preguntas']);
            //echo $this;
            //$this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embedForm('alternativas', $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas']);
            
            //echo "hola<br />";
            //echo $this->embeddedForms['preguntas']->embeddedForms[$key_pregunta]->embeddedForms['alternativas'];
            
            //echo $this->embeddedForms['preguntas'];
          }
        }
      }
    }
    parent::bind($taintedValues, $taintedFiles);
  }
}
