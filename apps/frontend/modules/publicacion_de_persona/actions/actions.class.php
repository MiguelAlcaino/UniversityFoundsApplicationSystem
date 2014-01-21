<?php

/**
 * publicacion_de_persona actions.
 *
 * @package    postulacion_interna
 * @subpackage publicacion_de_persona
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicacion_de_personaActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->publicacion_de_personas = Doctrine_Core::getTable('PublicacionDePersona')
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
  	$publicacion_de_persona = new PublicacionDePersona();
  	$publicacion_de_persona->setPersona($this->persona);
  	
    switch($request->getParameter('tipo_publicacion')){
    	case 1: // ISI
    		$publicacion_de_persona->setTipoPublicacion('ISI WoS');
    		$this->tipo_publicacion = 1;
    		break;
    	case 2:
    		$publicacion_de_persona->setTipoPublicacion('SciELO');
    		$this->tipo_publicacion = 2;
    		break;
    	case 3:
    		$this->tipo_publicacion = 3;
    		break;
    	default:
    		$this->redirect('persona/logout');
    }
  	$this->form = new PublicacionDePersonaForm($publicacion_de_persona);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->tipo_publicacion = $request->getParameter('tipo_publicacion');
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    $this->form = new PublicacionDePersonaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($publicacion_de_persona = Doctrine_Core::getTable('PublicacionDePersona')->find(array($request->getParameter('id'))), sprintf('Object publicacion_de_persona does not exist (%s).', $request->getParameter('id')));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    if($publicacion_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }

   switch($publicacion_de_persona->getTipoPublicacion()){
                            	case 'ISI WoS':
                            		$this->tipo_publicacion = 1;
                            		break;
                            	case 'SciELO':
                            		$this->tipo_publicacion = 2;
                            		break;
                            	default:
                            		$this->tipo_publicacion = 3;
                            		break;
                            }
    $this->form = new PublicacionDePersonaForm($publicacion_de_persona);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($publicacion_de_persona = Doctrine_Core::getTable('PublicacionDePersona')->find(array($request->getParameter('id'))), sprintf('Object publicacion_de_persona does not exist (%s).', $request->getParameter('id')));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    if($publicacion_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    switch($publicacion_de_persona->getTipoPublicacion()){
    	case 'ISI WoS':
    		$this->tipo_publicacion = 1;
    		break;
    	case 'SciELO':
    		$this->tipo_publicacion = 2;
    		break;
    	default:
    		$this->tipo_publicacion = 3;
    	break;
    }
    
    $this->form = new PublicacionDePersonaForm($publicacion_de_persona);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($publicacion_de_persona = Doctrine_Core::getTable('PublicacionDePersona')->find(array($request->getParameter('id'))), sprintf('Object publicacion_de_persona does not exist (%s).', $request->getParameter('id')));
    
    if($publicacion_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $publicacion_de_persona->delete();

    $this->getUser()->setFlash('notice','La publicaci&oacute;n ha sido eliminada exitosamente.');
    $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $publicacion_de_persona = $form->save();

      $this->getUser()->setFlash('notice','La publicaci&oacute;n ha sido agregado exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona'). ($request->hasParameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '') );
    }
  }
}
