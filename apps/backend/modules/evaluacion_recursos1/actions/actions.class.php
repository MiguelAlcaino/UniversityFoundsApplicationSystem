<?php

require_once dirname(__FILE__).'/../lib/evaluacion_recursos1GeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/evaluacion_recursos1GeneratorHelper.class.php';

/**
 * evaluacion_recursos1 actions.
 *
 * @package    postulacion_interna
 * @subpackage evaluacion_recursos1
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacion_recursos1Actions extends autoEvaluacion_recursos1Actions
{
  
  public function executeListaPostulacionesSinEvaluacionRecursos(sfWebRequest $request){
    $this->redirect('evaluacion_recursos/index');
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->evaluacion = new Evaluacion();
    $this->evaluacion->setPersonaConcurso(Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('postulacion_id')));
    $this->form = new EvaluacionRecursosForm($this->evaluacion);
    //$this->form = $this->configuration->getForm();
    //$this->evaluacion = $this->form->getObject();
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $formulario = $request->getParameter('evaluacion');
    
    $this->evaluacion = new Evaluacion();
    $this->evaluacion->setPersonaSistema(Doctrine_Core::getTable('PersonaSistema')->find($this->getUser()->getAttribute('id_persona')));
    $this->evaluacion->setPersonaConcurso(Doctrine_Core::getTable('PersonaConcurso')->find($formulario['persona_concurso_id']));
    $this->form = new EvaluacionRecursosForm($this->evaluacion);
    //$this->form = $this->configuration->getForm();
    //$this->evaluacion = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $evaluacion = $form->save();
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $evaluacion)));

        if($request->hasParameter('enviar_evaluacion')){
          
          $evaluacion->setEstado(3); // evaluacion de recursos
          $evaluacion->save();
          $persona_concurso = $evaluacion->getPersonaConcurso();
          $persona_concurso->setEstadoEvaluacion(3);
          $persona_concurso->save();
          $this->getUser()->setFlash('notice', 'La evaluación de recursos ha sido enviada con éxito.');

          //$this->redirect(array('sf_route' => 'evaluacion_evaluacion_recursos1_edit', 'sf_subject' => $evaluacion));
          $this->redirect('evaluacion_recursos/index');
        }else{
          $this->getUser()->setFlash('notice', $notice);
          $this->redirect('evaluacion_recursos/index');
          //$this->redirect(array('sf_route' => 'evaluacion_evaluacion_recursos1_edit', 'sf_subject' => $evaluacion));
        }
        
      
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
