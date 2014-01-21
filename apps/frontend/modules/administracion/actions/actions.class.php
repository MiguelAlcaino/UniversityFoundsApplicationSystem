<?php

/**
 * administracion actions.
 *
 * @package    postulacion_interna
 * @subpackage administracion
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class administracionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeProyectosPostulados(sfWebRequest $request){
    $this->postulaciones = Doctrine_Core::getTable('PersonaConcurso')
            ->createQuery('a')
            ->select('a.*')
            ->leftJoin('a.Concurso c')
            ->leftJoin('c.Convocatoria conv')
            ->where('a.estado = ? AND conv.anio = ?',array(2,2013))
            ->orderBy('a.concurso_id ASC')
            ->execute(); 
  }
  
  private function getNumPagesInPDF($file) 
    {
    //http://www.hotscripts.com/forums/php/23533-how-now-get-number-pages-one-document-pdf.html
    if(!file_exists($file))return null;
    if (!$fp = @fopen($file,"r"))return null;
    $max=0;
    while(!feof($fp)) {
            $line = fgets($fp,255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)){
                    preg_match('/[0-9]+/',$matches[0], $matches2);
                    if ($max<$matches2[0]) $max=$matches2[0];
            }
    }
    fclose($fp);
    return (int)$max;

    }
  
  public function executeExportarPostulaciones(sfWebRequest $request){
    if($concurso = Doctrine::getTable('Concurso')->find($request->getParameter('id_concurso'))){
      $fp = fopen('/home/sfprojects/postulacion_interna_di/web/uploads/csv/'.$concurso->getAcronimo().$concurso->getConvocatoria()->getAnio().'.csv', 'w+');
      $postulaciones = Doctrine_Core::getTable('PersonaConcurso')
          ->createQuery('a')
          ->where('a.estado = ?',array(2))
          ->andWhere('a.concurso_id = ?',array($concurso->getId()))
          ->orderBy('a.id ASC')
          ->execute();
      
      foreach($postulaciones as  $postulacion){
        $string = '';
        $suma = 0;
        foreach($postulacion->getEvaluacionesConEstado(2) as $evaluacion){
          $suma = $suma + $evaluacion->getNota();
        }
        $promedio = intval($suma/count($postulacion->getEvaluacionesConEstado(2)));
        $string .= $postulacion->getId().';'.$postulacion->getPersona().';'.$postulacion->getPersona()->getTipoProfesor().';'.$postulacion->getPersona()->getUnidadAcademica().';'.$promedio;
        $string .= "\n";
        fputs($fp,$string);
      }
      fclose($fp);
    }
  }
  
  public function executeExportarPostulacionesNotaFinal(sfWebRequest $request){
    if($concurso = Doctrine::getTable('Concurso')->find($request->getParameter('id_concurso'))){
      $fp = fopen('/home/sfprojects/postulacion_interna_di/web/uploads/csv/'.$concurso->getAcronimo().$concurso->getConvocatoria()->getAnio().'_nota_final.csv', 'w+');
      $postulaciones = Doctrine_Core::getTable('PersonaConcurso')
          ->createQuery('a')
          ->where('a.estado = ?',array(2))
          ->andWhere('a.concurso_id = ?',array($concurso->getId()))
          ->orderBy('a.id ASC')
          ->execute();
      
      foreach($postulaciones as  $postulacion){
        $string = '';
        /*
        $suma = 0;
        foreach($postulacion->getEvaluacionesConEstado(2) as $evaluacion){
          $suma = $suma + $evaluacion->getNota();
        }
        $promedio = intval($suma/count($postulacion->getEvaluacionesConEstado(2)));
        */
        
        $estado_aprobacion = $postulacion->getEstaAprobado() ? 'Aprobado' : 'Reprobado';
        
        $string .= $postulacion->getId().';'.$postulacion->getPersona().';'.$postulacion->getPersona()->getTipoProfesor().';'.$postulacion->getPersona()->getUnidadAcademica().';'.$estado_aprobacion.';'.$postulacion->getEvaluacionFinal()->getNota();
        $string .= "\n";
        fputs($fp,$string);
      }
      fclose($fp);
    }
  }
  
  public function executeGenerarCsvTipoProyecto(sfWebRequest $request) {
    
    $path_archivos_subidos = '/home/sfprojects/postulacion_interna_di/web/uploads/pdfs';
    
    
    
    if($concurso = Doctrine::getTable('Concurso')->find($request->getParameter('id_concurso'))){
        $fp = fopen('/home/sfprojects/postulacion_interna_di/web/uploads/csv/'.$concurso->getAcronimo().'.csv', 'w+');
        $postulaciones = Doctrine_Core::getTable('PersonaConcurso')
            ->createQuery('a')
            ->where('a.estado = ?',array(2))
            ->andWhere('a.concurso_id = ?',array($concurso->getId()))
            ->orderBy('a.id ASC')
            ->execute();
        
        //$postulaciones = $concurso->getPersonaConcurso();
        
            //Recursos
            //Gastos operacion, Alumno ayudante, Personal tecnico, Viajes y viaticos, Inscripciones a congresos
            
            foreach($postulaciones as  $postulacion){
                if($concurso->getAcronimo() == 'di_regular' || $concurso->getAcronimo() == 'di_iniciacion' || $concurso->getAcronimo() == 'di_pia'){
                $recursos = $postulacion->getRecursos();
                $recursos_con_key = array();
                foreach($recursos as $recurso){
                    $recursos_con_key[$recurso->getItemConcurso()->getAcronimoRecurso()] = $recurso->getTotal();
                }
                
                $string_cant_pages = "";
                
                foreach($postulacion->getArchivosPostulacion() as $archivo){
                    if($archivo->getRuta()){
                        $string_cant_pages .= $this->getNumPagesInPDF($path_archivos_subidos."/".$archivo->getRuta()).";";
                    }else{
                        $string_cant_pages .= " ;";
                    }
                }
            
                $string = $postulacion->getId().";".$postulacion->getTitulo().";".$postulacion->getPersona().";Director;".$postulacion->getPersona()->getUnidadAcademica()."; PUCV;".$postulacion->getPersona()->getTipoProfesor().";";
                $string .= $recursos_con_key['gastos_operacion'].";";
                $string .= $recursos_con_key['alumno_ayudante'].";";
                $string .= $recursos_con_key['personal_tecnico_y_apoyo'].";";
                $string .= $recursos_con_key['viajes_y_viaticos'].";";
                $string .= $recursos_con_key['inscripciones_a_congresos'].";";
                $string .= $string_cant_pages;
                $string .= "http://www.postulacion-di.ucv.cl/postulacion_interna/uploads/postulaciones_pdf/".$postulacion->getRutaPdfPostulacion().";";
                $string .= "\n";
                
                
                    if($concurso->getAcronimo() == 'di_pia'){
                        foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
                            //$string .= " ; ;".$participante_postulacion->getPersona().";";
                            
                            if($participante_postulacion->getTipoParticipante() != 1){
                                if($participante_postulacion->getTipoParticipante() == 3){
                                    $string .= " ; ;".$participante_postulacion->getPersona().";";
                                    $string .= "Co-Investigador;".$participante_postulacion->getPersona()->getUnidadAcademica().";PUCV;".$participante_postulacion->getPersona()->getTipoProfesor().";";
                                    $string .= "\n";
                                }
                            }
                        
                        }
                        foreach($postulacion->getParticipantesExternos() as $participante_externo){
                            $string .= " ; ;".$participante_externo->getPersonaExterna().";";
                            $string .= "Co-inv externo;"." ;".$participante_externo->getPersonaExterna()->getNombreUniversidad().";";
                            $string .= "\n";
                        }
                    }
                
                }else{
                    if($concurso->getAcronimo() == 'di_artes'){
                        $recursos = $postulacion->getRecursos();
                $recursos_con_key = array();
                foreach($recursos as $recurso){
                    $recursos_con_key[$recurso->getItemConcurso()->getAcronimoRecurso()] = $recurso->getTotal();
                }
                
                $string_cant_pages = "";
                
                foreach($postulacion->getArchivosPostulacion() as $archivo){
                    if($archivo->getRuta()){
                        $string_cant_pages .= $this->getNumPagesInPDF($path_archivos_subidos."/".$archivo->getRuta()).";";
                    }else{
                        $string_cant_pages .= " ;";
                    }
                }
            
                $string = $postulacion->getId().";".$postulacion->getTitulo().";".$postulacion->getPersona().";Director;".$postulacion->getPersona()->getUnidadAcademica()."; PUCV;".$postulacion->getPersona()->getTipoProfesor().";";
                $string .= $recursos_con_key['gastos_operacion'].";";
                $string .= $recursos_con_key['alumno_ayudante'].";";
                $string .= $recursos_con_key['personal_tecnico_y_apoyo'].";";
                $string .= $recursos_con_key['viajes_y_viaticos'].";";
                $string .= $recursos_con_key['inscripciones_a_eventos_de_difusion'].";";
                $string .= $string_cant_pages;
                $string .= "http://www.postulacion-di.ucv.cl/postulacion_interna/uploads/postulaciones_pdf/".$postulacion->getRutaPdfPostulacion().";";
                $string .= "\n";
                    }else{
                        if($concurso->getAcronimo() == 'di_sello_valorico'){
                            $recursos = $postulacion->getRecursos();
                $recursos_con_key = array();
                foreach($recursos as $recurso){
                    $recursos_con_key[$recurso->getItemConcurso()->getAcronimoRecurso()] = $recurso->getTotal();
                }
                
                $string_cant_pages = "";
                
                foreach($postulacion->getArchivosPostulacion() as $archivo){
                    if($archivo->getRuta()){
                        $string_cant_pages .= $this->getNumPagesInPDF($path_archivos_subidos."/".$archivo->getRuta()).";";
                    }else{
                        $string_cant_pages .= " ;";
                    }
                }
            
                $string = $postulacion->getId().";".$postulacion->getTitulo().";".$postulacion->getPersona().";Director;".$postulacion->getPersona()->getUnidadAcademica()."; PUCV;".$postulacion->getPersona()->getTipoProfesor().";";
                $string .= $recursos_con_key['gastos_operacion'].";";
                $string .= $recursos_con_key['alumno_ayudante'].";";
                $string .= $recursos_con_key['personal_tecnico_y_apoyo'].";";
                $string .= $recursos_con_key['viajes_y_viaticos'].";";
                $string .= $recursos_con_key['inscripciones_a_congresos_u_otros_eventos_de_difusion'].";";
                $string .= $string_cant_pages;
                $string .= "http://www.postulacion-di.ucv.cl/postulacion_interna/uploads/postulaciones_pdf/".$postulacion->getRutaPdfPostulacion().";";
                $string .= "\n";
                
                foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
                            //$string .= " ; ;".$participante_postulacion->getPersona().";";
                            
                            if($participante_postulacion->getTipoParticipante() != 1){
                                if($participante_postulacion->getTipoParticipante() == 3){
                                    $string .= " ; ;".$participante_postulacion->getPersona().";";
                                    $string .= "Co-Investigador;".$participante_postulacion->getPersona()->getUnidadAcademica().";PUCV;".$participante_postulacion->getPersona()->getTipoProfesor().";";
                                    $string .= "\n";
                                }else{
                                    if($participante_postulacion->getTipoParticipante() == 2){
                                        $string .= " ; ;".$participante_postulacion->getPersona().";";
                                    $string .= "Director Alterno;".$participante_postulacion->getPersona()->getUnidadAcademica().";PUCV;".$participante_postulacion->getPersona()->getTipoProfesor().";";
                                    $string .= "\n";
                                    }
                                }
                            }
                        
                        }
                        }else{
                            if($concurso->getAcronimo() == 'di_apoyo_tesis_doctoral'){
                                $recursos = $postulacion->getRecursos();
                $recursos_con_key = array();
                foreach($recursos as $recurso){
                    $recursos_con_key[$recurso->getItemConcurso()->getAcronimoRecurso()] = $recurso->getTotal();
                }
                
                $string_cant_pages = "";
                
                foreach($postulacion->getArchivosPostulacion() as $archivo){
                    if($archivo->getRuta()){
                        $string_cant_pages .= $this->getNumPagesInPDF($path_archivos_subidos."/".$archivo->getRuta()).";";
                    }else{
                        $string_cant_pages .= " ;";
                    }
                }
            
                $string = $postulacion->getId().";".$postulacion->getTitulo().";".$postulacion->getPersona().";Director;".$postulacion->getPersona()->getUnidadAcademica()."; PUCV;".$postulacion->getPersona()->getTipoProfesor().";";
                $string .= $recursos_con_key['gastos_operacion'].";";
                $string .= $recursos_con_key['viajes_y_viaticos'].";";
                $string .= $recursos_con_key['inscripciones_a_congresos'].";";
                $string .= $string_cant_pages;
                $string .= "http://www.postulacion-di.ucv.cl/postulacion_interna/uploads/postulaciones_pdf/".$postulacion->getRutaPdfPostulacion().";";
                $string .= "\n";
                
                //Agregacion de linea del alumno tesista
                $string .= " ; ;".$postulacion->getTesista().";Tesista;".$postulacion->getTesista()->getDoctoradoAcreditado().";";
                $string .= "\n";
                            }
                        }
                    }
                }
                //$string = utf8_encode($string);
                fputs($fp,$string);
            }
        
        
        fclose($fp);
    }
    
  }
  
}
