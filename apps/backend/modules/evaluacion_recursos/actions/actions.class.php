<?php

require_once dirname(__FILE__).'/../lib/evaluacion_recursosGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/evaluacion_recursosGeneratorHelper.class.php';

/**
 * evaluacion_recursos actions.
 *
 * @package    postulacion_interna
 * @subpackage evaluacion_recursos
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacion_recursosActions extends autoEvaluacion_recursosActions
{
  public function executeEvaluar_recursos(sfWebRequest $request){
    if($evaluacion = Doctrine_Core::getTable('Evaluacion')->findOneByPersonaSistemaIdAndPersonaConcursoId($this->getUser()->getAttribute('id_persona'), $request->getParameter('id'))){
    //if($evaluacion = Doctrine_Core::getTable('Evaluacion')->findOneByEstadoAndPersonaConcursoId(2, $request->getParameter('id'))){
      $this->redirect('evaluacion_recursos1/edit?id='.$evaluacion->getId());
    }else{
      $this->redirect('evaluacion_recursos1/new?postulacion_id='.$request->getParameter('id'));
    }
  }
}
