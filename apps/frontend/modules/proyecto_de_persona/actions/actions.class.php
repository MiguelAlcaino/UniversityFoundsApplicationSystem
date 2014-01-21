<?php

/**
 * proyecto_de_persona actions.
 *
 * @package    postulacion_interna
 * @subpackage proyecto_de_persona
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proyecto_de_personaActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->proyecto_de_personas = Doctrine_Core::getTable('ProyectoDePersona')
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
  	$this->forward404Unless($persona = Doctrine_Core::getTable('Persona')->find($this->getUser()->getAttribute('id_persona')));
  	$proyecto_persona = new ProyectoDePersona();
  	$proyecto_persona->setPersona($persona);
    
    
    //Tipos de proyectos 1: FONDECYT, 2: Otros externos, 3: Internos
    switch ($request->getParameter('tipo_proyecto')){
    	case 1: // fondecyt
    		$proyecto_persona->setTipoProyecto(1);
    		$proyecto_persona->setFuente('FONDECYT');
    		break;
    	case 2: // otro externo
    		$proyecto_persona->setTipoProyecto(2);
    		break;
    	case 3: // interno
    		$proyecto_persona->setTipoProyecto(3);
                $proyecto_persona->setFuente('DI');
    		break;
    	default:
    		$this->redirect('persona/edit?id='.$persona->getId().'&id_postulacion='.$postulacion->getId());
    		
    }
    
    $this->persona = $persona;
    $this->form = new ProyectoDePersonaForm($proyecto_persona);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    $this->form = new ProyectoDePersonaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($proyecto_de_persona = Doctrine_Core::getTable('ProyectoDePersona')->find(array($request->getParameter('id'))), sprintf('Object proyecto_de_persona does not exist (%s).', $request->getParameter('id')));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    
    if($proyecto_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new ProyectoDePersonaForm($proyecto_de_persona);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
  if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    $this->forward404Unless($proyecto_de_persona = Doctrine_Core::getTable('ProyectoDePersona')->find(array($request->getParameter('id'))));
    
    if($proyecto_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new ProyectoDePersonaForm($proyecto_de_persona);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($proyecto_de_persona = Doctrine_Core::getTable('ProyectoDePersona')->find(array($request->getParameter('id'))), sprintf('Object proyecto_de_persona does not exist (%s).', $request->getParameter('id')));
    
    if($proyecto_de_persona->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $proyecto_de_persona->delete();

    $this->getUser()->setFlash('notice','El proyecto ha sido eliminado exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona').( $request->hasparameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '' ) );
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $proyecto_de_persona = $form->save();
		
      $this->getUser()->setFlash('notice','El proyecto ha sido agregado exitosamente.');
      $this->redirect('persona/edit?id='.$this->getUser()->getAttribute('id_persona').( $request->hasparameter('id_postulacion') ? '&id_postulacion='.$request->getParameter('id_postulacion') : '' ) );
    }
  }
}
