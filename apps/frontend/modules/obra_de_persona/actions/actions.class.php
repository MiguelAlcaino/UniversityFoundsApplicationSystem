<?php

/**
 * obra_de_persona actions.
 *
 * @package    postulacion_interna
 * @subpackage obra_de_persona
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class obra_de_personaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->obra_de_personas = Doctrine_Core::getTable('ObraDePersona')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
  	if($request->getParameter('id_postulacion')){
  		$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
  	}else{
  		$this->postulacion = null;
  	}
  	
  	$this->forward404Unless($this->persona = Doctrine_Core::getTable('Persona')->find($this->getUser()->getAttribute('id_persona')));
  	
  	$obra_de_persona = new ObraDePersona();
  	$obra_de_persona->setPersona($this->persona);
    $this->form = new ObraDePersonaForm($obra_de_persona);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
	
    if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    $this->form = new ObraDePersonaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($obra_de_persona = Doctrine_Core::getTable('ObraDePersona')->find(array($request->getParameter('id'))), sprintf('Object obra_de_persona does not exist (%s).', $request->getParameter('id')));
    
    if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    if($obra_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new ObraDePersonaForm($obra_de_persona);
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	
  	
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($obra_de_persona = Doctrine_Core::getTable('ObraDePersona')->find(array($request->getParameter('id'))), sprintf('Object obra_de_persona does not exist (%s).', $request->getParameter('id')));
    
    if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    if($obra_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new ObraDePersonaForm($obra_de_persona);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($obra_de_persona = Doctrine_Core::getTable('ObraDePersona')->find(array($request->getParameter('id'))), sprintf('Object obra_de_persona does not exist (%s).', $request->getParameter('id')));
    
    if($obra_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $obra_de_persona->delete();

    $this->getUser()->setFlash('notice','La obra ha sido eliminada exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $obra_de_persona = $form->save();

      $this->getUser()->setFlash('notice','La obra ha sido agregada exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
    }
  }
}
