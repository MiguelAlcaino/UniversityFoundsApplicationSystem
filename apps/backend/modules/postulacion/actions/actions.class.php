<?php

require_once dirname(__FILE__).'/../lib/postulacionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/postulacionGeneratorHelper.class.php';

/**
 * postulacion actions.
 *
 * @package    postulacion_interna
 * @subpackage postulacion
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postulacionActions extends autoPostulacionActions
{
  public function executeEdit(sfWebRequest $request)
  {
    //$context = sfContext::createInstance($this->configuration);
    //$this->configuration->loadHelpers('Url');
    //echo public_path('uploads/pdfs');
    $this->persona_concurso = $this->getRoute()->getObject();
    $this->form = new PostulacionForm($this->persona_concurso, array('host' => $request->getHost()));
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->persona_concurso = $this->getRoute()->getObject();
    $this->form = new PostulacionForm($this->persona_concurso, array('request' => $request));

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  public function executeValidarIsis(sfWebRequest $request){
    $director_postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id'))->getPersona();
    $this->redirect('publicacion/index?id_persona='.$director_postulacion->getId());
  }
  
  public function executeValidarProyectos(sfWebRequest $request){
    $director_postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id'))->getPersona();
    $this->redirect('proyecto/index?id_persona='.$director_postulacion->getId());
  }
}
