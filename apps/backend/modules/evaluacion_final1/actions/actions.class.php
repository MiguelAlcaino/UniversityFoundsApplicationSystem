<?php

require_once dirname(__FILE__).'/../lib/evaluacion_final1GeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/evaluacion_final1GeneratorHelper.class.php';

/**
 * evaluacion_final1 actions.
 *
 * @package    postulacion_interna
 * @subpackage evaluacion_final1
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacion_final1Actions extends autoEvaluacion_final1Actions
{
  public function executeNew(sfWebRequest $request)
  {
    $this->evaluacion = new Evaluacion();
    $this->evaluacion->setPersonaConcurso(Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('postulacion_id')));
    $this->form = new EvaluacionFinalForm($this->evaluacion);
    //$this->form = $this->configuration->getForm();
    //$this->evaluacion = $this->form->getObject();
  }
  
  public function executeVolver(sfWebRequest $request){
    $this->redirect('evaluacion_final/index');
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $formulario = $request->getParameter('evaluacion');
    
    $this->evaluacion = new Evaluacion();
    $this->evaluacion->setPersonaSistema(Doctrine_Core::getTable('PersonaSistema')->find($this->getUser()->getAttribute('id_persona')));
    $this->evaluacion->setPersonaConcurso(Doctrine_Core::getTable('PersonaConcurso')->find($formulario['persona_concurso_id']));
    $this->form = new EvaluacionFinalForm($this->evaluacion);
    //$this->form = $this->configuration->getForm();
    //$this->evaluacion = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->evaluacion = $this->getRoute()->getObject();
    //$this->form = $this->configuration->getForm($this->evaluacion);
    $this->form = new EvaluacionFinalForm($this->evaluacion);
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
    $this->evaluacion = $this->getRoute()->getObject();
    //$this->form = $this->configuration->getForm($this->evaluacion);
    $this->form = new EvaluacionFinalForm($this->evaluacion);
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

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@evaluacion_evaluacion_final1_new');
      }
      else
      {
        if($request->hasParameter('aprobar')){
          $evaluacion->setEstado(4);
          $evaluacion->save();
          
          $persona_concurso = $evaluacion->getPersonaConcurso();
          $persona_concurso->setEstadoEvaluacion(4);
          $persona_concurso->setEstaAprobado(true);
          $persona_concurso->save();
          $this->getUser()->setFlash('notice', 'La postulación ha sido aprobada con éxito.');
          $this->redirect('evaluacion_final/index');
        }else{
          if($request->hasParameter('reprobar')){
            $evaluacion->setEstado(4);
            $evaluacion->save();
            $persona_concurso = $evaluacion->getPersonaConcurso();
            $persona_concurso->setEstadoEvaluacion(4);
            $persona_concurso->setEstaAprobado(false);
            $persona_concurso->save();
            $this->getUser()->setFlash('notice', 'La postulación ha sido reprobada con éxito.');
            $this->redirect('evaluacion_final/index');
            
          }else{
            $this->getUser()->setFlash('notice', $notice);
            
            $this->redirect(array('sf_route' => 'evaluacion_evaluacion_final1_edit', 'sf_subject' => $evaluacion));
        }
        }
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
