<?php

/**
 * persona_externa actions.
 *
 * @package    postulacion_interna
 * @subpackage persona_externa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class persona_externaActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->persona_externas = Doctrine_Core::getTable('PersonaExterna')
//       ->createQuery('a')
//       ->execute();
//   }

  public function executeNew(sfWebRequest $request)
  {
  	$this->forward404Unless($postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
  	$this->postulacion = $postulacion;
  	
  	if($postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
  		$this->redirect('persona/logout');
  	}
  	
    $this->form = new PersonaExternaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    
    if($this->postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new PersonaExternaForm();

    $this->processForm($request, $this->form, $this->postulacion);

    $this->setTemplate('new');
  }

//   public function executeEdit(sfWebRequest $request)
//   {
//     $this->forward404Unless($persona_externa = Doctrine_Core::getTable('PersonaExterna')->find(array($request->getParameter('id'))), sprintf('Object persona_externa does not exist (%s).', $request->getParameter('id')));
//     $this->form = new PersonaExternaForm($persona_externa);
//   }

//   public function executeUpdate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//     $this->forward404Unless($persona_externa = Doctrine_Core::getTable('PersonaExterna')->find(array($request->getParameter('id'))), sprintf('Object persona_externa does not exist (%s).', $request->getParameter('id')));
//     $this->form = new PersonaExternaForm($persona_externa);

//     $this->processForm($request, $this->form);

//     $this->setTemplate('edit');
//   }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($persona_externa = Doctrine_Core::getTable('PersonaExterna')->find(array($request->getParameter('id'))), sprintf('Object persona_externa does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
    
    if($postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $persona_externa->unlink('PersonaConcursos',array($postulacion->getId()));
    $persona_externa->save();
    $persona_externa->delete();

    $this->getUser()->setFlash("error", "El investigador ha sido eliminado correctamente.");
      $this->redirect('@postular?id_postulacion='.$postulacion->getId().'&etapa=6&paso=1');
  }

  protected function processForm(sfWebRequest $request, sfForm $form, PersonaConcurso $postulacion)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $persona_externa = $form->save();
      
      $participante_externo = new ParticipanteExterno();
      $participante_externo->setPersonaExterna($persona_externa);
      $participante_externo->setPersonaConcurso($postulacion);
      $participante_externo->save();
      
      $this->getUser()->setFlash("error", "El investigador externo ha sido agregado correctamente.");
      $this->redirect('@postular?id_postulacion='.$postulacion->getId().'&etapa=6&paso=1');
    }
  }
}
