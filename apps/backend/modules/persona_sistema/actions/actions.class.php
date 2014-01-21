<?php

require_once dirname(__FILE__).'/../lib/persona_sistemaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/persona_sistemaGeneratorHelper.class.php';

/**
 * persona_sistema actions.
 *
 * @package    postulacion_interna
 * @subpackage persona_sistema
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class persona_sistemaActions extends autoPersona_sistemaActions
{
  public function executeLogin(sfWebRequest $request){
    $this->form = new LoginForm();
    
    if($request->isMethod("post") && $request->hasParameter('login')){
    	$this->form->bind($request->getParameter("login"));
    
    	if($this->form->isValid()){
    		//if(!$persona = PersonaTable::login($this->form->getValue("rut"), $this->form->getValue("dv"))){
    		  if(!$persona = Doctrine_Core::getTable('PersonaSistema')->findOneByRutAndDvAndPassword($this->form->getValue('rut'), $this->form->getValue('dv'), md5($this->form->getValue('password')) )){
    			// No hemos conseguido loguear al usuario
    			// Redirigimos de nuevo al login con un mensaje de error
    			$this->getUser()->setFlash("error", "Datos incorrectos");
    			//$this->redirect("@user_login");
    		}else{
    			// Logueamos  
    			$this->getUser()->setAuthenticated(true);
    			$this->getUser()->setAttribute("id_persona",$persona->getId());
    			$this->getUser()->setAttribute("rut",$persona->getRut());
    			$this->getUser()->addCredential($persona->getPerfil());
    			
    			switch($persona->getPerfil()){
    			  case 3:
    			    $this->redirect('evaluacion_final/index');
    			    break;
  			    default:
  			      $this->redirect('evaluacion/index');
  			      break;
    			}
    			
    			// Comprobamos si tiene referer, si no, le llevamos a la homepage
    			//$url = $this->getUser()->getAttribute("referer",false)?:"@homepage";
    			//$this->getUser()->setAttribute("referer", false);
    			//$this->redirect($url);
    		}
    	}
    
  }
  }
  
  public function executeLogout(sfWebRequest $request){
  	$this->getUser()->setAuthenticated(false);
  	$this->getUser()->getAttributeHolder()->clear();
  	$this->redirect("persona_sistema/login");
  }
}
