<?php

require_once dirname(__FILE__).'/../lib/encuestaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/encuestaGeneratorHelper.class.php';

/**
 * encuesta actions.
 *
 * @package    postulacion_interna
 * @subpackage encuesta
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class encuestaActions extends autoEncuestaActions
{
  public function executeVerResultados(sfWebRequest $request){
    $this->encuesta = Doctrine::getTable('Encuesta')->find($request->getParameter('id'));
  }
  
  public function executeAddAlternativaForm(sfWebRequest $request){
    //$this->forward404Unless($request->isXmlHttpRequest());
    if($encuesta = Doctrine::getTable('Encuesta')->find($request->getParameter('id_encuesta'))){
      $this->form = new EncuestaForm($encuesta);
    }else{
      $this->form = new EncuestaForm();
    }
    
    $number = $request->getParameter('num')+1;
    $key_alternativa = 'alternativa_'.($number-1);
    $key_pregunta = 'pregunta_'.$request->getParameter('num_pregunta');
    
    $this->form->addAlternativa($key_alternativa, $key_pregunta);
    
    
    return $this->renderPartial('encuesta/alternativa_field',array('alternativa' => $this->form['preguntas'][$key_pregunta]['alternativas'][$key_alternativa], 'counter_alternativas'=>$number));
  }
  
  public function executeAddPreguntaForm(sfWebRequest $request)
  {
    $this->forward404Unless($request->isXmlHttpRequest());
    if($encuesta = Doctrine::getTable('Encuesta')->find($request->getParameter('id_encuesta'))){
      $this->form = new EncuestaForm($encuesta);
    }else{
      $this->form = new EncuestaForm();
    }
    $number = $request->getParameter('num')+1;
    $key = 'pregunta_'.$number;
    $this->form->addPregunta($key);
    
    
    
    return $this->renderPartial('pregunta_field', array('pregunta'=>$this->form['preguntas'][$key], 'form'=>$this->form, 'counter_preguntas'=>$number));
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->encuesta = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->encuesta = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->encuesta);
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
    $this->encuesta = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->encuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
}
