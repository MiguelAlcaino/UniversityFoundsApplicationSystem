<?php

require_once dirname(__FILE__).'/../lib/concursoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/concursoGeneratorHelper.class.php';

/**
 * concurso actions.
 *
 * @package    postulacion_interna
 * @subpackage concurso
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class concursoActions extends autoConcursoActions
{
  public function executeCrearCSVPresupuesto(sfWebRequest $request){
    $concurso = Doctrine_Core::getTable('Concurso')->find($request->getParameter('id'));
    $fp = fopen('/home/sfprojects/postulacion_interna_di/web/uploads/csv/'.$concurso->getAcronimo().$concurso->getConvocatoria()->getAnio().'_presupuesto.csv', 'w+');
    
    
    foreach($concurso->getPostulacionesAprobadas() as $postulacion){
      $string = '';
      $string .= $postulacion->getId().';'.$postulacion->getCodigoProyecto().';'.$postulacion->getConcurso().';'.$postulacion->getPersona().';'.$postulacion->getPersona()->getTipoProfesor().';'.$postulacion->getPersona()->getUnidadAcademica().';'.$postulacion->getPersona()->getUnidadAcademica()->getFacultad().';';
      $suma = 0;
      foreach($postulacion->getEvaluacionFinal()->getAjustesRecurso() as $ajuste_recurso){
        $string .= $ajuste_recurso->getRecurso()->getItemConcurso()->getItem()->getNombreItem().';';
        $string .= $ajuste_recurso->getMontoAprobado().';';
        $suma = $suma + $ajuste_recurso->getMontoAprobado();
      }
      $string .= $suma.';';
      $string .= "\n";
      fputs($fp,$string);
      }
    fclose($fp);
    $this->redirect('concurso/index');
    }
  }

