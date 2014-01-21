<?php

/**
 * PersonaConcurso form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonaConcursoForm extends BasePersonaConcursoForm
{
  public function configure()
  {
  	unset($this['updated_at'], $this['created_at'], $this['persona_id'], $this['concurso_id'], $this['estado'], $this['items_concurso_list'], $this['personas_list'], $this['personas_externas_list'], $this['fecha_envio'], $this['tesista_id'], $this['ruta_pdf_postulacion']);
  	
  	$this->widgetSchema['categoria_arte'] = new sfWidgetFormChoice(array(
  	'expanded' => true,
    'choices' => array(
      'creacion_o_produccion_artistica' => 'Creación o producción artística', 
      'difusion_o_fomento_de_las_artes' => 'Difusión o fomento de las artes',
      'investigacion_y_estudio_de_la_cultura_y_las_artes' => 'Investigación y estudio de la cultura y las artes',
      'otra' => 'Otra (Especifique)'),
    'renderer_class' => 'ChoiceConOtroWidget'
    )
    );
  	
  	$this->widgetSchema['categoria_arte']->setAttribute('onClick','togle(this.value)');
  	
  	$this->addArchivos();
  	$this->addRecursos();
  }
  
  public function addArchivos(){
  	$subform = new sfForm();
  	
  	if (false === sfContext::getInstance()->getRequest()->isXmlHttpRequest()){
  		$archivos = $this->getObject()->getArchivosPostulacion();
  		
  		if(count($archivos) == 0){
  			for($i=0; $i<7; $i++){
  				$archivo_postulacion = new ArchivoPostulacion();
  				$archivo_postulacion->setPersonaConcurso($this->getObject());
  				$archivo_postulacion->setIdTipoArchivo($i+1);
  				
  				$archivos[] = $archivo_postulacion;
  			}
  		}
  		foreach($archivos as $k => $v){
  			$form_archivo_postulacion = new ArchivoPostulacionForm($v);
  			//$subform->embedForm($k+1, $form_archivo_postulacion);
  			$subform->embedForm($v->getTipoArchivo()->getAcronimo(),$form_archivo_postulacion);
  			//$subform->widgetSchema[$k+1]->setLabel($v->getTipoArchivo()->getNombreDocumento());
  			$subform->widgetSchema[$v->getTipoArchivo()->getAcronimo()]->setLabel($v->getTipoArchivo()->getNombreDocumento());
  		}
  		
  	}
  	$this->embedForm('archivos', $subform);
  }
  
  public function addRecursos(){
  	$subform = new sfForm();
  	if (false === sfContext::getInstance()->getRequest()->isXmlHttpRequest()){
  		
  		
  		foreach($this->getObject()->getRecursos() as $k => $recurso){
  			$form_recurso = new RecursoForm($recurso);
  			
  			
  			$sub_form_detalle = new sfForm();
  			foreach($recurso->getDetallesRecurso() as $i => $detalle_recurso){
  				$form_detalle_recurso = new DetalleRecursoForm($detalle_recurso);
  				$form_detalle_recurso_gastos_operacion = new sfForm();
  				foreach($detalle_recurso->getDetallesRecursoGastosOperacion() as $detalle_recurso_gasto_operacion){
  				  $form_detalle_recurso_gasto_operacion = new DetalleRecursoGastosOperacionForm($detalle_recurso_gasto_operacion);
  				  $form_detalle_recurso_gastos_operacion->embedForm('detalle_recurso_gasto_operacion_'.$detalle_recurso_gasto_operacion->getTipoDeGasto(), $form_detalle_recurso_gasto_operacion);
  				}
  				$form_detalle_recurso->embedForm('detalles_gastos_operacion',$form_detalle_recurso_gastos_operacion);
  				$sub_form_detalle->embedForm('detalle_recurso_'.($i+1), $form_detalle_recurso);
  			}
  			$form_recurso->embedForm('detalles_recurso', $sub_form_detalle);
  			
  			foreach($recurso->getArchivosRecurso() as $archivo_recurso){
  				$form_archivo_recurso = new ArchivoRecursoForm($archivo_recurso);
  				$form_recurso->embedForm('archivo_recurso', $form_archivo_recurso);
  			}
  			
  			//$subform->embedForm($k+1, $form_recurso);
  			
  			// Version 1.0 2012
  			//$subform->embedForm($recurso->getItemConcurso()->getAcronimoRecurso(), $form_recurso);
  			
  			//Version 2.0 2013
  			$subform->embedForm($recurso->getItemConcurso()->getItem()->getAcronimo(), $form_recurso);
  		}
  		
  	}
  	$this->embedForm('recursos', $subform);
  }
  
  public function validarPostulacion(){ // si algun campo requerido falta, cambia la bandera a false
  	$bandera =true;
  	if($this['titulo']->getValue() == null || $this['titulo']->getValue() == ''){
  		$bandera = false;
  	}
  	//echo 'titulo'.$bandera;
  	/*
  	    if($this['archivos']['resumen']['ruta']->getValue() == null
  		|| $this['archivos']['definicion_problema_y_solucion']['ruta']->getValue() == null
  		|| $this['archivos']['marco_teorico']['ruta']->getValue() == null
  		|| $this['archivos']['bibliografia']['ruta']->getValue() == null
  		|| $this['archivos']['objetivos']['ruta']->getValue() == null
  		|| $this['archivos']['metodologia']['ruta']->getValue() == null
  		|| $this['archivos']['plan_de_trabajo']['ruta']->getValue() == null
  		|| $this['archivos']['resultados']['ruta']->getValue() == null
  		|| $this['archivos']['carta_compromiso']['ruta']->getValue() == null
  		|| $this['archivos']['carta_respaldo_ua']['ruta']->getValue() == null){
  			$bandera = false;
  	}*/
  	$suma_recursos = 0;
  	foreach($this->getObject()->getRecursos() as $recurso){
  	  $suma_recursos = $suma_recursos + $recurso->getTotal();
  	  $archivos_recurso  = $recurso->getArchivosRecurso();
  	  if($recurso->getItemConcurso()->getItem()->getAcronimo() != 'gastos_operacion'){
    	  if(($recurso->excedePorcentaje() && $recurso->getTotal() != 0)){
    	    $bandera = false;
    	    //echo 'porcentaje'.$bandera;
    	  }
  	  }else{
  	    if($archivos_recurso[0]->getRuta() == null && $recurso->getTotal() != 0){
  	      $bandera = false;
  	    }
  	    
  	  }
  	  /*
  	  if($archivos_recurso[0]->getRuta() == null && $recurso->getTotal() != 0){
  	    if($recurso->getItemConcurso()->getItem()->getAcronimo() != 'gastos_operacion'){
  	      $bandera = false;
  	      //echo $archivos_recurso[0]->getRecurso()->getItemConcurso()->getItem()->getAcronimo();
  	    }
  	  }*/
  	}
  	
  	if($suma_recursos == 0){
  	  $bandera = false;
  	}
  	
  	foreach($this->getObject()->getArchivosPostulacion() as $archivo_postulacion){
  	  if($archivo_postulacion->getTipoArchivo()->getAcronimo() == 'carta_compromiso'
  	  || $archivo_postulacion->getTipoArchivo()->getAcronimo() == 'carta_respaldo_ua'
  	  || $archivo_postulacion->getTipoArchivo()->getAcronimo() == 'trabajo_adelantado'
  	  || $archivo_postulacion->getTipoArchivo()->getAcronimo() == 'evaluadores_sugeridos'
  	  || $archivo_postulacion->getTipoArchivo()->getAcronimo() == 'evaluadores_con_conflictos'){
  	    
  	  }else{
  	    if($archivo_postulacion->getRuta() == null){
  	      $bandera = false;
  	      //echo $archivo_postulacion->getTipoArchivo()->getAcronimo();
  	    }
  	  }
  	}
  	
  	
  	
  	if($this->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 4){
  		if($this['archivos']['certificado_titulo']['ruta']->getValue() == null ){
  			$bandera = false;
  		}
  	}
  	
  	if($this->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 4 || $this->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 3){
  	  if($this['archivos']['carta_compromiso']['ruta']->getValue() == null
  		|| $this['archivos']['carta_respaldo_ua']['ruta']->getValue() == null){
  	    $bandera == false;
  	  }
  	}
  	
  	return $bandera;
  	
  }
}
