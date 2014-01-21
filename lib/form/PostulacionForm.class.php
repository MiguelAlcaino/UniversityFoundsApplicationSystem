<?php

class PostulacionForm extends BasePersonaConcursoForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['items_concurso_list'], $this['personas_list'], $this['personas_externas_list'], $this['ruta_pdf_postulacion'], $this['concurso_id'], $this['tesista_id']);
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
  			$form_archivo_postulacion = new ArchivoPostulacionBackendForm($v);
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
  				$form_archivo_recurso = new ArchivoRecursoBackendForm($archivo_recurso);
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
  
}
