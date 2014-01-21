<?php

require_once dirname(__FILE__).'/../lib/postulaciones_evaluadasGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/postulaciones_evaluadasGeneratorHelper.class.php';

/**
 * postulaciones_evaluadas actions.
 *
 * @package    postulacion_interna
 * @subpackage postulaciones_evaluadas
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postulaciones_evaluadasActions extends autoPostulaciones_evaluadasActions
{
  
  public function executeEnviarEvaluacion(sfWebRequest $request){
    
    $persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id'));
    
    $message = $this->getMailer()->compose();
    $message->setSubject('Evaluación Proyecto DI '.$persona_concurso->getConcurso()->getConvocatoria()->getAnio().' - '.$persona_concurso->getId());
    
    $message->setTo($persona_concurso->getPersona()->getEmail());
    //$message->setTo('miguel.alcaino@ogb.cl');
    $message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
    $message->setReplyTo(array('paula.rojas.s@ucv.cl' => 'Paula Rojas S.'));
    $html = $this->getPartial('postulaciones_evaluadas/email_evaluacion', array('persona_concurso' => $persona_concurso));
    $message->setBody($html, 'text/plain');
    //$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
    //path_evaluaciones_finales
    $message->attach(Swift_Attachment::fromPath(sfConfig::get('app_path_evaluaciones_finales').'/'.$persona_concurso->getId().'.pdf'));
    $this->getMailer()->send($message);
    $this->getUser()->setFlash('La evaluación ha sido enviada correctamente');
    $this->redirect('postulaciones_evaluadas/index');
  }

  public function executeCrearEvaluacion(sfWebRequest $request){
    require_once sfConfig::get('app_path_lib').'/phpword/PHPWord.php';
    
    $PHPWord = new PHPWord();
    $document = $PHPWord->loadTemplate(sfConfig::get('app_path_evaluaciones').'/Template_evaluacion.docx');
    
    $persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id'));
    
    $document->setValue('titulo', $persona_concurso->getTitulo());
    $document->setValue('unidadAcademica', $persona_concurso->getPersona()->getUnidadAcademica());
    $document->setValue('tipo_proyecto', $persona_concurso->getConcurso()->getNombreConcurso());
    $document->setValue('id_postulacion', $persona_concurso->getId());
    $document->setValue('nombre_director', $persona_concurso->getPersona());
    $document->setValue('promedio', $persona_concurso->getEvaluacionFinal()->getNota());
    $i=1;
    foreach($persona_concurso->getEvaluacionesConEstado(2) as $evaluacion){
      $document->setValue('evaluacion'.$i, $evaluacion->getComentario());
      $i++;
    }
    
    $document->save(sfConfig::get('app_path_evaluaciones').'/'.$persona_concurso->getId().' '.$persona_concurso->getPersona()->getNombre().' '.$persona_concurso->getPersona()->getApellido1().' '.$persona_concurso->getConcurso()->getNombreConcurso().'.docx');
    
    $this->redirect('postulaciones_evaluadas/index');
    
  }
  public function executeEditar(sfWebRequest $request){
    if($evaluacion = Doctrine_Core::getTable('Evaluacion')->findOneByPersonaConcursoIdAndEstado($request->getParameter('id'), 4) ){
      $this->redirect('evaluacion_final1/edit?id='.$evaluacion->getId());
    }else{
      $this->redirect('postulaciones_evaluadas/index');
    }
    
  }
  
  public function executeVerPostulacionesAprobadas(sfWebRequest $request){
  
    $this->postulaciones = Doctrine_Core::getTable('Convocatoria')->getPostulacionesAprobadasByAnioConvocatoria($request->getParameter('anio'));
    
    $contador = sfConfig::get('app_numero_siguiente_codigo_proyecto_anio_anterior');
    foreach($this->postulaciones as $postulacion){
      $postulacion->setCodigoProyecto(sfConfig::get('app_sufijo_cuenta_di').'.'.$contador.'/'.$request->getParameter('anio'));
      $postulacion->setCodigoNumerico($contador);
      $postulacion->save();
      if($contador == sfConfig::get('app_numero_final_codigo_proyecto')){
        $contador = sfConfig::get('app_numero_inicio_codigo_proyecto');
      }else{
        $contador++;
      }
      
    }
  }
  
  public function executeCrearCovenios(sfWebRequest $request){
    //file_put_contents(sfConfig::get('app_path_convenios').'/.'.pdf', $dompdf->output());
    
    set_time_limit(120);
    
    require_once(sfConfig::get('app_path_lib')."/dompdf/dompdf_config.inc.php");
    sfConfig::set('sf_web_debug', false);
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    
    $postulaciones = Doctrine_Core::getTable('Convocatoria')->getPostulacionesAprobadasByAnioConvocatoria($request->getParameter('anio'));
    
    
    foreach($postulaciones as $persona_concurso){
    
      if($convenio = Doctrine_Core::getTable('ConvenioDesempenoPostulacion')->findOneByPersonaConcursoId($persona_concurso->getId())){
        }else{
        $convenio = new ConvenioDesempenoPostulacion();
        $convenio->setPersonaConcurso($persona_concurso);
        $convenio->setFechaConvenio($persona_concurso->getConcurso()->getConvocatoria()->getFechaFirmaConvenio());
        $convenio->save();
        if($persona_concurso->getConcurso()->getAcronimo() == 'di_pia'){
          if($persona_concurso->getPersona()->getTipoProfesor()->getNumeroTipo() == 1){
            foreach($persona_concurso->getConcurso()->getCompromisos() as $compromiso_concurso){
              if($compromiso_concurso->getTipo() == 2){
                $compromiso_postulacion = new CompromisoDeConvenio();
                $compromiso_postulacion->setConvenioDesempenoPostulacion($convenio);
                $compromiso_postulacion->setOrden($compromiso_concurso->getOrden());
                $compromiso_postulacion->setTextoCompromiso($compromiso_concurso->getTexto());
                $compromiso_postulacion->save();
              }
            }
          }else{
            foreach($persona_concurso->getConcurso()->getCompromisos() as $compromiso_concurso){
              if($compromiso_concurso->getTipo() == 1){
                $compromiso_postulacion = new CompromisoDeConvenio();
                $compromiso_postulacion->setConvenioDesempenoPostulacion($convenio);
                $compromiso_postulacion->setOrden($compromiso_concurso->getOrden());
                $compromiso_postulacion->setTextoCompromiso($compromiso_concurso->getTexto());
                $compromiso_postulacion->save();
              }
            }
          }
        }else{
          foreach($persona_concurso->getConcurso()->getCompromisos() as $compromiso_concurso){
            $compromiso_postulacion = new CompromisoDeConvenio();
            $compromiso_postulacion->setConvenioDesempenoPostulacion($convenio);
            $compromiso_postulacion->setOrden($compromiso_concurso->getOrden());
            $compromiso_postulacion->setTextoCompromiso($compromiso_concurso->getTexto());
            $compromiso_postulacion->save();
          }
        }
      }
      
      $html = get_partial('convenio/convenio_prueba', array('postulacion' => $persona_concurso));
      
      $dompdf = new DOMPDF();
      $dompdf->load_html($html);
      $dompdf->render();
      //$dompdf->stream('prueba.pdf');
      file_put_contents(sfConfig::get('app_path_convenios').'/'.$persona_concurso->getCodigoNumerico().'.pdf', $dompdf->output() );
    }
    
  }
  
  public function executeEditarPostulacion(sfWebRequest $request){
    $this->redirect('postulacion/edit?id='.$request->getParameter('id'));
  }
  
  public function executeCrearConvenio(sfWebRequest $request){
    // /home/sfprojects/postulacion_interna_di/web/convenios/patron
    require_once(sfConfig::get('app_path_lib')."/dompdf/dompdf_config.inc.php");
    sfConfig::set('sf_web_debug', false);
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    
    $persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id'));
    
    if($convenio = Doctrine_Core::getTable('ConvenioDesempenoPostulacion')->findOneByPersonaConcursoId($persona_concurso->getId())){
      }else{
      $convenio = new ConvenioDesempenoPostulacion();
      $convenio->setPersonaConcurso($persona_concurso);
      $convenio->setFechaConvenio($persona_concurso->getConcurso()->getConvocatoria()->getFechaFirmaConvenio());
      $convenio->save();
      if($persona_concurso->getConcurso()->getAcronimo() == 'di_pia'){
        if($persona_concurso->getPersona()->getTipoProfesor()->getNumeroTipo() == 1){
          foreach($persona_concurso->getConcurso()->getCompromisos() as $compromiso_concurso){
            if($compromiso_concurso->getTipo() == 2){
              $compromiso_postulacion = new CompromisoDeConvenio();
              $compromiso_postulacion->setConvenioDesempenoPostulacion($convenio);
              $compromiso_postulacion->setOrden($compromiso_concurso->getOrden());
              $compromiso_postulacion->setTextoCompromiso($compromiso_concurso->getTexto());
              $compromiso_postulacion->save();
            }
          }
        }else{
          foreach($persona_concurso->getConcurso()->getCompromisos() as $compromiso_concurso){
            if($compromiso_concurso->getTipo() == 1){
              $compromiso_postulacion = new CompromisoDeConvenio();
              $compromiso_postulacion->setConvenioDesempenoPostulacion($convenio);
              $compromiso_postulacion->setOrden($compromiso_concurso->getOrden());
              $compromiso_postulacion->setTextoCompromiso($compromiso_concurso->getTexto());
              $compromiso_postulacion->save();
            }
          }
        }
      }else{
        foreach($persona_concurso->getConcurso()->getCompromisos() as $compromiso_concurso){
          $compromiso_postulacion = new CompromisoDeConvenio();
          $compromiso_postulacion->setConvenioDesempenoPostulacion($convenio);
          $compromiso_postulacion->setOrden($compromiso_concurso->getOrden());
          $compromiso_postulacion->setTextoCompromiso($compromiso_concurso->getTexto());
          $compromiso_postulacion->save();
        }
      }
    }
    
    $html = get_partial('convenio/convenio_prueba', array('postulacion' => $persona_concurso));
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    //$dompdf->stream('prueba.pdf');
    file_put_contents(sfConfig::get('app_path_convenios').'/'.$persona_concurso->getCodigoNumerico().'.pdf', $dompdf->output() );
    $convenio->setRutaConvenio($persona_concurso->getCodigoNumerico().'.pdf');
    $convenio->save();
    
    $this->redirect('postulaciones_evaluadas/index');
  }
}
