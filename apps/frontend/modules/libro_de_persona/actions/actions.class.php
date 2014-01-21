<?php

/**
 * libro_de_persona actions.
 *
 * @package    postulacion_interna
 * @subpackage libro_de_persona
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class libro_de_personaActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->libro_de_personas = Doctrine_Core::getTable('LibroDePersona')
//       ->createQuery('a')
//       ->execute();
//   }

  public function executeNew(sfWebRequest $request)
  {
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    $this->forward404Unless($this->persona = Doctrine_Core::getTable('Persona')->find($this->getUser()->getAttribute('id_persona')));
    $libro_de_persona = new LibroDePersona();
    $libro_de_persona->setPersona($this->persona);
    $this->form = new LibroDePersonaForm($libro_de_persona);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    $this->form = new LibroDePersonaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($libro_de_persona = Doctrine_Core::getTable('LibroDePersona')->find(array($request->getParameter('id'))), sprintf('Object libro_de_persona does not exist (%s).', $request->getParameter('id')));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    if($libro_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new LibroDePersonaForm($libro_de_persona);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($libro_de_persona = Doctrine_Core::getTable('LibroDePersona')->find(array($request->getParameter('id'))), sprintf('Object libro_de_persona does not exist (%s).', $request->getParameter('id')));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    if($libro_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new LibroDePersonaForm($libro_de_persona);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($libro_de_persona = Doctrine_Core::getTable('LibroDePersona')->find(array($request->getParameter('id'))), sprintf('Object libro_de_persona does not exist (%s).', $request->getParameter('id')));
    
    if($libro_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $libro_de_persona->delete();

    $this->getUser()->setFlash('notice','El libro ha sido eliminado exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $libro_de_persona = $form->save();
      
      $this->getUser()->setFlash('notice','El libro ha sido agregado exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
    }
  }
}
