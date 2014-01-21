<?php

require_once dirname(__FILE__).'/../lib/personaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/personaGeneratorHelper.class.php';

/**
 * persona actions.
 *
 * @package    postulacion_interna
 * @subpackage persona
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class personaActions extends autoPersonaActions
{
    public function executeShow(sfWebRequest $request){
      $this->persona = Doctrine_Core::getTable('Persona')->find($request->getParameter('id'));
    }
    
    public function executeListPostulaciones(sfWebRequest $request){
      $this->persona = $this->getRoute()->getObject();
      if($this->persona->getTipoProfesor()->getNumeroTipo() == 1){
  		$nombre_array_concursos = 'concursos_asociados';
  	}
  	if($this->persona->getTipoProfesor()->getNumeroTipo() == 2){
  		$nombre_array_concursos = 'concursos_jerarquizados';
  	}
    if($this->persona->getTipoProfesor()->getNumeroTipo() == 3){
  		$nombre_array_concursos = 'concursos_adscritos';
  	}
    if($this->persona->getTipoProfesor()->getNumeroTipo() == 4){
  		$nombre_array_concursos = 'concursos_pnj';
  	}
  	
  	$this->postulaciones_en_curso = array();
    $this->postulaciones_enviadas = array();
    foreach($this->persona->getPersonaConcursos() as $postulacion){
        if($postulacion->getEstado() == 1){
            foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
                if($participante_postulacion->getPersona()->getId() == $this->persona->getId() && $participante_postulacion->getTipoParticipante() == 1){
                    $this->postulaciones_en_curso[] = $postulacion;
                }
            }
        }else{
            if($postulacion->getEstado() == 2){
                $this->postulaciones_enviadas[] = $postulacion;
            }
        }
        
            
        }
    
  	$this->concursos_disponibles = $this->persona->getPostulacionesDisponibles($nombre_array_concursos);
    }
    public function executeNew(sfWebRequest $request)
      {
        //$this->form = $this->configuration->getForm();
        $this->form = new PersonaBackendForm();
        $this->persona = $this->form->getObject();
      }
      
      public function executeEdit(sfWebRequest $request)
      {
        $this->persona = $this->getRoute()->getObject();
        //$this->form = $this->configuration->getForm($this->persona);
        $this->form = new PersonaBackendForm($this->persona);
      }
      
      public function executeCreate(sfWebRequest $request)
      {
        //$this->form = $this->configuration->getForm();
        $this->form = new PersonaBackendForm();
        $this->persona = $this->form->getObject();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
      }
      
      public function executeUpdate(sfWebRequest $request)
      {
        $this->persona = $this->getRoute()->getObject();
        //$this->form = $this->configuration->getForm($this->persona);
        $this->form = new PersonaBackendForm($this->persona);
        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
      }
      
      protected function processForm(sfWebRequest $request, sfForm $form)
      {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
          $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

          try {
            $persona = $form->save();
          } catch (Doctrine_Validator_Exception $e) {

            $errorStack = $form->getObject()->getErrorStack();

            $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
            foreach ($errorStack as $field => $errors) {
                $message .= "$field (" . implode(", ", $errors) . "), ";
            }
            $message = trim($message, ', ');

            $this->getUser()->setFlash('error', $message);
            return sfView::SUCCESS;
          }

          $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $persona)));

          if ($request->hasParameter('_save_and_add'))
          {
            $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

            $this->redirect('@persona_new');
          }
          else
          {
            $this->getUser()->setFlash('notice', $notice);

            $this->redirect(array('sf_route' => 'persona_edit', 'sf_subject' => $persona));
          }
        }
        else
        {
          $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
      }

}
