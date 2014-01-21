<?php

/**
 * Evaluacion form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EvaluacionForm extends BaseEvaluacionForm
{
  public function configure()
  {
    unset($this['persona_sistema_id'], $this['estado'], $this['created_at'], $this['updated_at']);
    
    $this->widgetSchema['nota']->setAttribute('size', 3);
    $this->widgetSchema['nota']->setAttribute('style', 'font-size: 48px;');
    
    $this->widgetSchema['recomiendo_adjudicacion'] = new sfWidgetFormChoice(array(
      'expanded' => true,
      'choices'  => array(true => 'Sí', false => 'No'),
    ));
    
    $this->widgetSchema['persona_concurso_id'] = new sfWidgetFormInputHidden();
    
    $form_notas_productividad = new sfForm();
    if($this->getObject()->isNew()){
      foreach($this->getObject()->getPersonaConcurso()->getConcurso()->getPorcentajesProductividad() as $porcentaje_productividad_concurso){
        $nota_productividad = new NotaProductividad();
        $nota_productividad->setEvaluacion($this->getObject());
        $nota_productividad->setPorcentajeProductividadConcurso($porcentaje_productividad_concurso);
        $form_notas_productividad->embedForm($porcentaje_productividad_concurso->getTipoProductividad(), new NotaProductividadForm($nota_productividad));
      }
    }else{
      foreach($this->getObject()->getNotasProductividad() as $nota_productividad){
        $form_notas_productividad->embedForm($nota_productividad->getPorcentajeProductividadConcurso()->getTipoProductividad(), new NotaProductividadForm($nota_productividad));
      }
    }
    
    $this->embedForm('notas_productividad', $form_notas_productividad);
    //Notas Formulacion
    $form_notas_archivo_postulacion = new sfForm();

    if($this->getObject()->isNew()){
      foreach($this->getObject()->getPersonaConcurso()->getConcurso()->getConcursoTipoArchivos() as $concurso_tipo_archivo){
        //echo $archivo_postulacion->getTipoArchivo().'<br />';
        if(count($concurso_tipo_archivo->getPorcentajesEvaluacion()) > 1){ // Condición para abarcar el manejo de la definición del problema y solución
          if($this->getObject()->getPersonaConcurso()->getConcurso()->getAcronimo() == 'di_sello_valorico' || $this->getObject()->getPersonaConcurso()->getConcurso()->getAcronimo() == 'di_artes'){
            $i = 0;
            foreach($concurso_tipo_archivo->getPorcentajesEvaluacion() as $porcentaje_evaluacion){
              $nota_formulacion = new NotaFormulacion();
              $nota_formulacion->setEvaluacion($this->getObject());
              $nota_formulacion->setPorcentajeEvaluacion($porcentaje_evaluacion);
              $form_notas_archivo_postulacion->embedForm($porcentaje_evaluacion->getNombreNota(), new NotaFormulacionForm($nota_formulacion));
            }
          }else{
            $i = 0;
            foreach($concurso_tipo_archivo->getPorcentajesEvaluacion() as $porcentaje_evaluacion){
              $nota_formulacion = new NotaFormulacion();
              $nota_formulacion->setEvaluacion($this->getObject());
              $nota_formulacion->setPorcentajeEvaluacion($porcentaje_evaluacion);
              $form_notas_archivo_postulacion->embedForm($concurso_tipo_archivo->getTipoArchivo()->getAcronimo().'_'.$i++, new NotaFormulacionForm($nota_formulacion));
          
            }
          }
        }else{
          foreach($concurso_tipo_archivo->getPorcentajesEvaluacion() as $porcentaje_evaluacion){
            $nota_formulacion = new NotaFormulacion();
            $nota_formulacion->setEvaluacion($this->getObject());
            $nota_formulacion->setPorcentajeEvaluacion($porcentaje_evaluacion);
            $form_notas_archivo_postulacion->embedForm($concurso_tipo_archivo->getTipoArchivo()->getAcronimo(), new NotaFormulacionForm($nota_formulacion));
          }
        }
        /*
        $nota_formulacion = new NotaFormulacion();
        $nota_formulacion->setPorcentajeEvaluacion($porcentaje_evaluacion);
        $nota_archivo_postulacion->setEvaluacion($this->getObject());
        $form_notas_archivo_postulacion->embedForm($porcentaje_evaluacion->getTipo, new NotaArchivoPostulacionForm($nota_archivo_postulacion));
        */
      }
    }else{
      $i=0;
      foreach($this->getObject()->getNotasFormulacion() as $nota_formulacion){
        if($this->getObject()->getPersonaConcurso()->getConcurso()->getAcronimo() == 'di_sello_valorico' || $this->getObject()->getPersonaConcurso()->getConcurso()->getAcronimo() == 'di_artes'){
          $form_notas_archivo_postulacion->embedForm($nota_formulacion->getPorcentajeEvaluacion()->getNombreNota(), new NotaFormulacionForm($nota_formulacion));
        }else{
          if($nota_formulacion->getPorcentajeEvaluacion()->getConcursoTipoArchivo()->getTipoArchivo()->getAcronimo() == 'definicion_problema_y_solucion'){
            $form_notas_archivo_postulacion->embedForm($nota_formulacion->getPorcentajeEvaluacion()->getConcursoTipoArchivo()->getTipoArchivo()->getAcronimo().'_'.$i++, new NotaFormulacionForm($nota_formulacion));
          }else{
            $form_notas_archivo_postulacion->embedForm($nota_formulacion->getPorcentajeEvaluacion()->getConcursoTipoArchivo()->getTipoArchivo()->getAcronimo(), new NotaFormulacionForm($nota_formulacion));   
        }
        }
      }
    }
    /*
    else{
      foreach($this->getObject()->getNotasArchivoPostulacion() as $nota_archivo_postulacion){
        $form_notas_archivo_postulacion->embedForm($nota_archivo_postulacion->getArchivoPostulacion()->getTipoArchivo()->getAcronimo(), new NotaArchivoPostulacionForm($nota_archivo_postulacion));
      }
    } */
    $this->embedForm('notas_archivos_postulacion', $form_notas_archivo_postulacion);
    
    //Ajustes de recursos
    $form_ajuste_recursos = new sfForm();
    if($this->getObject()->isNew()){
      foreach($this->getObject()->getPersonaConcurso()->getRecursos() as $recurso){
        $ajuste_recurso = new AjusteRecurso();
        $ajuste_recurso->setRecurso($recurso);
        $ajuste_recurso->setEvaluacion($this->getObject());
        $ajuste_recurso->setMontoAprobado($recurso->getTotal());
        
        $form_ajustes_detalles_recursos = new sfForm();
        
        foreach($recurso->getDetallesRecurso() as $detalle_recurso){
          $ajuste_detalle_recurso = new AjusteDetalleRecurso();
          $ajuste_detalle_recurso->setAjusteRecurso($ajuste_recurso);
          $ajuste_detalle_recurso->setDetalleRecurso($detalle_recurso);
          $ajuste_detalle_recurso->setMontoAprobado($detalle_recurso->getMonto());
          
          $form_ajuste_detalles_recursos_gastos_operacion = new sfForm();
          
          foreach($detalle_recurso->getDetallesRecursoGastosOperacion() as $detalle_recurso_gasto_operacion){
            $ajuste_detalle_recurso_gastos_operacion = new AjusteDetalleRecursoGastosOperacion();
            $ajuste_detalle_recurso_gastos_operacion->setAjusteDetalleRecurso($ajuste_detalle_recurso);
            $ajuste_detalle_recurso_gastos_operacion->setDetalleRecursoGastosOperacion($detalle_recurso_gasto_operacion);
            $ajuste_detalle_recurso_gastos_operacion->setMontoAprobado($detalle_recurso_gasto_operacion->getMonto());
            $form_ajuste_detalles_recursos_gastos_operacion->embedForm($detalle_recurso_gasto_operacion->getTipoDeGasto(), new AjusteDetalleRecursoGastosOperacionForm($ajuste_detalle_recurso_gastos_operacion));
          }
          $ajuste_detalle_recurso_form = new AjusteDetalleRecursoForm($ajuste_detalle_recurso);
          $ajuste_detalle_recurso_form->embedForm('ajustes_detalles_recursos_gastos_operacion', $form_ajuste_detalles_recursos_gastos_operacion);
          $form_ajustes_detalles_recursos->embedForm($detalle_recurso->getPeriodo(), $ajuste_detalle_recurso_form);
        }
        
        //$form_ajuste_recursos->embedForm($recurso->getItemConcurso()->getItem()->getAcronimo(), new AjusteRecursoForm($ajuste_recurso));
        $ajuste_recurso_form = new AjusteRecursoForm($ajuste_recurso);
        $ajuste_recurso_form->embedForm('ajustes_detalles_recursos', $form_ajustes_detalles_recursos);
        $form_ajuste_recursos->embedForm($recurso->getId(), $ajuste_recurso_form);
        /*
        $form_ajuste_recursos->embeddedForms[$recurso->getId()]->embedForm('ajustes_detalles_recursos', $form_ajustes_detalles_recursos);
        $form_ajuste_recursos->embedForm($recurso->getId(), $form_ajuste_recursos->embeddedForms[$recurso->getId()]);
        */
      }
    }else{
      foreach($this->getObject()->getAjustesRecurso() as $ajuste_recurso){
        //$form_ajuste_recursos->embedForm($ajuste_recurso->getRecurso()->getItemConcurso()->getItem()->getAcronimo(), new AjusteRecursoForm($ajuste_recurso));
        $form_ajustes_detalles_recursos = new sfForm();
        foreach($ajuste_recurso->getAjustesDetalleRecurso() as $ajuste_detalle_recurso){
          
          $form_ajuste_gasto_operacion = new sfForm();
          foreach($ajuste_detalle_recurso->getAjustesDetalleRecursoGastosOperacion() as $ajuste_gasto_operacion){
            $form_ajuste_gasto_operacion->embedForm($ajuste_gasto_operacion->getDetalleRecursoGastosOperacion()->getTipoDeGasto(), new AjusteDetalleRecursoGastosOperacionForm($ajuste_gasto_operacion));
          }
          $ajuste_detalle_recurso_form = new AjusteDetalleRecursoForm($ajuste_detalle_recurso);
          $ajuste_detalle_recurso_form->embedForm('ajustes_detalles_recursos_gastos_operacion', $form_ajuste_gasto_operacion);
          $form_ajustes_detalles_recursos->embedForm($ajuste_detalle_recurso->getDetalleRecurso()->getPeriodo(), $ajuste_detalle_recurso_form);
        }
        $ajuste_recurso_form = new AjusteRecursoForm($ajuste_recurso);
        $ajuste_recurso_form->embedForm('ajustes_detalles_recursos', $form_ajustes_detalles_recursos);
        $form_ajuste_recursos->embedForm($ajuste_recurso->getRecurso()->getId(), $ajuste_recurso_form);
      }
    }
    $this->embedForm('ajustes_recursos', $form_ajuste_recursos);
    
    
  }
}
