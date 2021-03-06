<?php

/**
 * encuesta actions.
 *
 * @package    postulacion_interna
 * @subpackage encuesta
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class encuestaActions extends sfActions
{

  public function executeResponderEncuesta(sfWebRequest $request){
    //$this->setLayout('encuesta');
    $this->forward404Unless($this->encuesta = Doctrine_Core::getTable('Encuesta')->find($request->getParameter('id_encuesta')));
    //$this->encuesta = Doctrine_Core::getTable('Encuesta')->find($request->getParameter('id_encuesta'));
    
    //$this->form = new EncuestaUsuarioForm(array(),array('encuesta'=> $this->encuesta));
    
    $sesion_encuesta = new SesionEncuesta();
    $sesion_encuesta->setEncuesta($this->encuesta);
    
    if($this->persona = Doctrine::getTable('Persona')->find($request->getParameter('id_persona'))){
      $sesion_encuesta->setPersona($this->persona);
    }
    
    $this->form = new SesionEncuestaForm($sesion_encuesta);
  }
  
  public function executeEncuestaRespondida(sfWebRequest $request){
    
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->encuestas = Doctrine_Core::getTable('Encuesta')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->encuesta = Doctrine_Core::getTable('Encuesta')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->encuesta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EncuestaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    $this->forward404Unless($form_sesion_encuesta = $request->getParameter('sesion_encuesta'));
    
    $this->forward404Unless($encuesta = Doctrine_Core::getTable('Encuesta')->find($form_sesion_encuesta['encuesta_id']));
    
    $sesion_encuesta = new SesionEncuesta();
    $sesion_encuesta->setEncuesta($encuesta);
    
    $this->form = new SesionEncuestaForm($sesion_encuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('responderEncuesta');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($encuesta = Doctrine_Core::getTable('Encuesta')->find(array($request->getParameter('id'))), sprintf('Object encuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncuestaForm($encuesta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($encuesta = Doctrine_Core::getTable('Encuesta')->find(array($request->getParameter('id'))), sprintf('Object encuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncuestaForm($encuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($encuesta = Doctrine_Core::getTable('Encuesta')->find(array($request->getParameter('id'))), sprintf('Object encuesta does not exist (%s).', $request->getParameter('id')));
    $encuesta->delete();

    $this->redirect('encuesta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      //$encuesta = $form->save();
      $sesion_encuesta_form = $request->getParameter($form->getName());
      
      $sesion_encuesta = new SesionEncuesta();
      if($sesion_encuesta_form['persona_id'] != ''){
        $sesion_encuesta->setPersonaId($sesion_encuesta_form['persona_id']);
      }
      
      $sesion_encuesta->setEncuestaId($sesion_encuesta_form['encuesta_id']);
      $sesion_encuesta->save();
      foreach($sesion_encuesta_form['preguntas'] as $key => $value){
        $respuesta_alternativa = new RespuestaAlternativa();
        $respuesta_alternativa->setSesionEncuesta($sesion_encuesta);
        $respuesta_alternativa->setAlternativaId($value['alternativa_id']);
        $respuesta_alternativa->save();
      }

      $this->redirect('encuesta/encuestaRespondida');
      //echo "guardado correcto";
    }
  }
}
