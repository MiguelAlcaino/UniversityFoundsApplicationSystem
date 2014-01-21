<?php

/**
 * divulgacion_de_persona actions.
 *
 * @package    postulacion_interna
 * @subpackage divulgacion_de_persona
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class divulgacion_de_personaActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->divulgacion_de_personas = Doctrine_Core::getTable('DivulgacionDePersona')
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
  	
  	$divulgacion_de_persona = new DivulgacionDePersona();
  	$divulgacion_de_persona->setPersona($this->persona);
  	
    $this->form = new DivulgacionDePersonaForm($divulgacion_de_persona);
  }

  public function executeCreate(sfWebRequest $request)
  {
  	if($request->getParameter('id_postulacion')){
  		$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
  	}else{
  		$this->postulacion = null;
  	}
    $this->forward404Unless($request->isMethod(sfRequest::POST));
	
    $this->form = new DivulgacionDePersonaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($divulgacion_de_persona = Doctrine_Core::getTable('DivulgacionDePersona')->find(array($request->getParameter('id'))), sprintf('Object divulgacion_de_persona does not exist (%s).', $request->getParameter('id')));
    if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    if($divulgacion_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new DivulgacionDePersonaForm($divulgacion_de_persona);
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	if($request->getParameter('id_postulacion')){
  		$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
  	}else{
  		$this->postulacion = null;
  	}
  	
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($divulgacion_de_persona = Doctrine_Core::getTable('DivulgacionDePersona')->find(array($request->getParameter('id'))), sprintf('Object divulgacion_de_persona does not exist (%s).', $request->getParameter('id')));
    $this->form = new DivulgacionDePersonaForm($divulgacion_de_persona);
    if($divulgacion_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($divulgacion_de_persona = Doctrine_Core::getTable('DivulgacionDePersona')->find(array($request->getParameter('id'))), sprintf('Object divulgacion_de_persona does not exist (%s).', $request->getParameter('id')));
    
    if($divulgacion_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $divulgacion_de_persona->delete();

    $this->getUser()->setFlash('notice','la divulgaci&oacute;n ha sido eliminada exitosamente.');
    $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $divulgacion_de_persona = $form->save();

      $this->getUser()->setFlash('notice','la divulgaci&oacute;n ha sido agregada exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
    }
  }
}
