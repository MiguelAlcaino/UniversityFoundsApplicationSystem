<?php

/**
 * persona actions.
 *
 * @package    postulacion_interna
 * @subpackage persona
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class personaActions extends sfActions
{
	public function executeMantenimiento(sfWebRequest $request){
		echo "hola";
	}
	
	public function executeNuevaPassword1(sfWebRequest $request){
	
	  
	}
	
	public function executeNuevaPassword(sfWebRequest $request){
	  $this->form = new NuevaPasswordForm();
	  if(!$persona = Doctrine_Core::getTable('Persona')->findOneByIdAndTokenRecuperarPassword($request->getParameter('persona_id'), $request->getParameter('token_recuperar_password') ) ){
	    
	    $this->getUser()->setFlash("error", "El enlace es inválido.");
	    $this->redirect('persona/login');
	  }else{
	    if($request->isMethod("post") && $request->hasParameter('password_form')){
    	$this->form->bind($request->getParameter('password_form'));
    
    	if($this->form->isValid()){
    	  $persona->setPassword($this->form->getValue('password'));  
    	  $persona->save();
    	  $this->getUser()->setFlash("notice", "La contraseña a sido reestablecida. Puede ingresar al sistema con ella");
    	  $this->redirect('persona/login');
    	}else{
    	   $this->getUser()->setFlash("error", "Las contraseñas no coinciden.");
    	   $this->persona = $persona;
  	  }
    	}else{
    	  $this->persona = $persona;
	      
	    }
	    
	  }
	  
	  
	  
	  
	}
	
  public function executeRecuperarPassword(sfWebRequest $request){
    $this->form = new RecuperarPasswordForm();
    
    if($request->isMethod("post") && $request->hasParameter('recuperar')){
    	$this->form->bind($request->getParameter('recuperar'));
    
    	if($this->form->isValid()){
    		  if(!$persona = Doctrine_Core::getTable('Persona')->findOneByEmail($this->form->getValue('email'))){
    		  echo "Hola";
    			// No hemos conseguido loguear al usuario
    			// Redirigimos de nuevo al login con un mensaje de error
    			$this->getUser()->setFlash("error", "Este dirección de correo no figura en la base de datos de profesores del sistema. Contacte a la DI al anexo 3187 o al correo dii.informacion@ucv.cl.");
    			//$this->redirect('persona/login');
    			//$this->redirect("@user_login");
    		}else{
    			// Logueamos
    			  $persona->setTokenRecuperarPassword(Persona::randomString());
    			  $persona->save();
    			  
    			  //Envio de mail
    						$message = $this->getMailer()->compose();
    						$message->setSubject('Recuperación de contraseña - Sistema de postulación DI');
    							
    						$message->setTo($persona->getEmail());
    						//$message->setTo('miguel.alcaino@ogb.cl');
    						$message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
    						$html = $this->getPartial('persona/recuperar_password_email',array('persona'=>$persona,'host'=>$request->getHost()));
    						$message->setBody($html, 'text/html');
    						//$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
    						$this->getMailer()->send($message);
                $this->getUser()->setFlash("notice", "Se le ha enviado un correo electrónico con un enlace para recuperar su contraseña.");
                $this->redirect('persona/login');
            }
    			
    			//$this->redirect('http://www.ogb.cl');
    			// Comprobamos si tiene referer, si no, le llevamos a la homepage
    			//$url = $this->getUser()->getAttribute("referer",false)?:"@homepage";
    			//$this->getUser()->setAttribute("referer", false);
    			//$this->redirect($url);
    		}
    	}
    
  }
  
  
	public function executeNuevoProfesorNoJerarquizado(sfWebRequest $request){
	  $this->form = new ProfesorNoJerarquizadoForm();
	}
    
    public function executeCreatePNJ(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $persona = new Persona();
    $persona->setEstadoLogin(2);
    $persona->setTipoProfesorId(4);
    $this->form = new ProfesorNoJerarquizadoForm($persona);

    $this->processForm($request, $this->form);

    $this->setTemplate('nuevoProfesorNoJerarquizado');
  }
    
	public function executeBuscarPersona(sfWebRequest $request){
		$this->tipo_participante = $request->getParameter('tipo_participante');
		if($request->isMethod("post")){
			$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
			$form = $request->getParameter('buscar_persona');
			
			if($personas = Doctrine_Core::getTable('Persona')->buscarPorNombreOApellido1OApellido2($form['nombre'],$form['apellido1'],$form['apellido2']) ){
				$this->personas = $personas;
			}else{
				$this->getUser()->setFlash("error", "No se ha encontrado un investigador con los datos ingresados");
			}
		}else{
			
			//falta validar cuando no vienen los datos por la URL o cuando se intenta editar la url para ingresar a otra publicacion
			$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
			$this->personas = array();
			$this->tipo_participante = $request->getParameter('tipo_participante');
		}
	}
	
	public function executeAgregarCoInvestigador(sfWebRequest $request){
		}
	
    
    protected function esDirectorDeConcursoPIAOSELLOEsteCoinvestigador(Persona $persona){
        $postulaciones = Doctrine_Core::getTable('PersonaConcurso')
            ->createQuery('a')
            ->execute();
        $bandera = false;
        foreach($postulaciones as $postulacion){
            if($postulacion->getConcurso()->getAcronimo() == 'di_sello_valorico' || $postulacion->getConcurso()->getAcronimo() == 'di_pia'){ // pia o sello
                if($postulacion->getPersona()->getId() == $persona->getId()){
                    $bandera = true;
                }
            }
        }
        return $bandera;
    }
	
	public function executeAgregarAlumnoTesista(sfWebRequest $request){
		$this->forward404Unless($postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
		
	}
	
	
	
	public function executeAgregarMailParticipante(sfWebRequest $request){
		
		$this->form = new MailParticipanteForm();
		$this->postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
		$this->tipo_participante=$request->getParameter('tipo_participante');
		$this->id_investigador_agregado = $request->getParameter('id_persona');
		if($request->isMethod("post") && $request->hasParameter('mail_participante')){
			$this->form->bind($request->getParameter("mail_participante"));
		
			if($this->form->isValid()){
				//if(!$persona = PersonaTable::login($this->form->getValue("rut"), $this->form->getValue("dv"))){
				if(!$investigador_agregado = Doctrine_Core::getTable('Persona')->find($request->getParameter('id_persona'))){
					// No hemos conseguido loguear al usuario
					// Redirigimos de nuevo al login con un mensaje de error
					$this->getUser()->setFlash("error", "Datos incorrectos");
					//$this->redirect("@user_login");
				}else{
					// Logueamos
					$this->redirect('persona/agregarInvestigador?id_persona='.$investigador_agregado->getId().'&id_postulacion='.$request->getParameter('id_postulacion').'&mail_participante='.$this->form->getValue('email').'&tipo_participante='.$request->getParameter('tipo_participante'));
					 
					//$this->redirect('http://www.ogb.cl');
					// Comprobamos si tiene referer, si no, le llevamos a la homepage
					//$url = $this->getUser()->getAttribute("referer",false)?:"@homepage";
					//$this->getUser()->setAttribute("referer", false);
					//$this->redirect($url);
				}
			}
		
		}
	}
	
	public function executeAgregarInvestigador(sfWebRequest $request){
		$postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
		$persona = Doctrine_Core::getTable('Persona')->find($request->getParameter('id_persona'));
		$tipo_participante=$request->getParameter('tipo_participante');
		$mail_participante =$request->getParameter('mail_participante');
		
		//Validacion de si es un sello valorico y ademas de que los tipos de pariticpantes que se agreagaran sean directores alternos o co investigadores 
		
        //if(!$this->esDirectorDeConcursoPIAOSELLOEsteCoinvestigador($persona)){
            if($postulacion->getConcurso()->getAcronimo() == 'di_sello_valorico'){
    			if($tipo_participante == 3){ // si se va a ingresar un co-investigador
    				if( (($postulacion->contarParticipantesPorTipoParticipante($tipo_participante) + 1) <= 3)){
    					if(!$postulacion->existeParticipanteEnPostulacion($persona)){
    						$postulacion->getParticipantesPostulacion();
    						$participante_postulacion = new ParticipantePostulacion();
    						$participante_postulacion->setPersona($persona);
    						$participante_postulacion->setPersonaConcurso($postulacion);
    						$participante_postulacion->setTipoParticipante($tipo_participante);
    						$participante_postulacion->setEmail($mail_participante);
    						$participante_postulacion->save();
    						
    						//Envio de mail
    						$message = $this->getMailer()->compose();
    						$message->setSubject('Ha sido agregado a una postulacion de un proyecto DI 2012');
    							
    						$message->setTo($participante_postulacion->getEmail());
    						//$message->setTo('miguel.alcaino@ogb.cl');
    						$message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
    						$html = $this->getPartial('persona/agregar_como_coinv_email',array('postulacion'=>$postulacion));
    						$message->setBody($html, 'text/html');
    						//$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
    						$this->getMailer()->send($message);
    						
    						$this->getUser()->setFlash("error", "El investigador ha sido agregado correctamente");
    						$this->redirect('postular/'.$postulacion->getId().'?etapa=6&paso=1');
    					}else{
    						$this->getUser()->setFlash("error", "El investigador ya se encuentra en la postulacion.");
    						$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    					}
    				}else{
    					$this->getUser()->setFlash("error", "Ya ha superado el numero maximo de co-investigadores para ingresar a la postulacion.");
    					$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    				}
    			}else{
    				if($tipo_participante == 2){
    					if( (($postulacion->contarParticipantesPorTipoParticipante($tipo_participante) + 1) <= 1)){
    						if(!$postulacion->existeParticipanteEnPostulacion($persona)){
    							$postulacion->getParticipantesPostulacion();
    							$participante_postulacion = new ParticipantePostulacion();
    							$participante_postulacion->setPersona($persona);
    							$participante_postulacion->setPersonaConcurso($postulacion);
    							$participante_postulacion->setTipoParticipante($tipo_participante);
    							$participante_postulacion->setEmail($mail_participante);
    							$participante_postulacion->save();
    							
    							//Envio de mail
    							$message = $this->getMailer()->compose();
    							$message->setSubject('Ha sido agregado a una postulacion de un proyecto DI 2012');
    							
    							$message->setTo($participante_postulacion->getEmail());
    							//$message->setTo('miguel.alcaino@ogb.cl');
    							$message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
    							$html = $this->getPartial('persona/agregar_como_coinv_email',array('postulacion'=>$postulacion));
    							$message->setBody($html, 'text/html');
    							//$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
    							$this->getMailer()->send($message);
    							
    							
    							$this->getUser()->setFlash("error", "El investigador ha sido agregado correctamente");
    							$this->redirect('postular/'.$postulacion->getId().'?etapa=6&paso=1');
    						}else{
    							$this->getUser()->setFlash("error", "El investigador ya se encuentra en la postulacion.");
    							$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    						}
    					}else{
    						$this->getUser()->setFlash("error", "Esta postulacion ya cuenta con un Director Alterno.");
    						$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    					}
    				}
    			}
    			
    		}else{
    			if($postulacion->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'){
    				$this->getUser()->setFlash("error", "Esta postulacion no permite el ingreso de coinvestigadores.");
    				$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    			}else{
    				if($postulacion->getConcurso()->getAcronimo() == 'di_pia'){
    					if($tipo_participante == 3){
    						if(!$postulacion->existeParticipanteEnPostulacion($persona)){
    							//Abajo la validacion se realiza por menor o igual que 4 ya ques e cuentan los co-investigadores solamente. No se cuenta el director.
    							if( ( $postulacion->contarParticipantesPorTipoParticipante($tipo_participante) + 1 + count($postulacion->getPersonasExternas()) ) <=4 ){
    								
    								//Validacion para saber si no esta excediendo el numero maximo de co-investigadores internos
    								if($postulacion->contarParticipantesPorTipoParticipante($tipo_participante) + 1 <= 3){
    								  if($postulacion->superaMaximoPersonasUnidadAcademica($persona->getUnidadAcademica())){
    								    $this->getUser()->setFlash("error", "La postulación no puede tener más de dos investigadores por Unidad Académica.");
    								    $this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    								  }else{
    									$postulacion->getParticipantesPostulacion();
    									$participante_postulacion = new ParticipantePostulacion();
    									$participante_postulacion->setPersona($persona);
    									$participante_postulacion->setPersonaConcurso($postulacion);
    									$participante_postulacion->setTipoParticipante($tipo_participante);
    									$participante_postulacion->setEmail($mail_participante);
    									$participante_postulacion->save();
    									
    									//Envio de mail
    									$message = $this->getMailer()->compose();
    									$message->setSubject('Ha sido agregado a una postulacion de un proyecto DI 2012');
    										
    									$message->setTo($participante_postulacion->getEmail());
    									//$message->setTo('miguel.alcaino@ogb.cl');
    									$message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
    									$html = $this->getPartial('persona/agregar_como_coinv_email',array('postulacion'=>$postulacion));
    									$message->setBody($html, 'text/html');
    									//$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
    									$this->getMailer()->send($message);
    									
    									$this->getUser()->setFlash("error", "El investigador ha sido agregado correctamente");
    									$this->redirect('postular/'.$postulacion->getId().'?etapa=6&paso=1');
    									}
    								}else{
    									$this->getUser()->setFlash("error", "Esta postulacion ya ha excedido el numero maximo de participantes PUCV.");
    									$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    								}
    							}else{
    								$this->getUser()->setFlash("error", "Esta postulacion ya ha excedido el numero maximo de participantes");
    								$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    							}
    						}else{
    							$this->getUser()->setFlash("error", "El investigador ya se encuentra en la postulacion.");
    							$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
    						}
    							
    					}
    				}else{// Cuando no es un concurso valido o no es un concurso que requiera varios investigadores
    					$this->redirect('postular/'.$postulacion->getId().'?etapa=6&paso=1');
    				}
    			}
    			
    		}
    		/*
            }else{
                //Si el investigador SI es director de un PIA o SELLO
                $this->getUser()->setFlash("error", "Este investigador no puede ser agregado, ya que, es postulante a Director de un Proyecto de Investigaci&oacute;n Asociativa o Sello Val&oacute;rico. ");
    							$this->redirect('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante);
            }
            */
	}
	
  public function executeEditarCV(sfWebRequest $request){
  	$this->forward404Unless($persona = Doctrine_Core::getTable('Persona')->find(array($request->getParameter('id'))), sprintf('Object persona does not exist (%s).', $request->getParameter('id')));
  	if($this->getUser()->getAttribute('id_persona') == $persona->getId()){
  		$this->form = new PersonaForm($persona);
  	}else{
  		$this->redirect('persona/logout');
  	}
  }
	
  public function executeLogin(sfWebRequest $request){
    $this->form = new LoginForm();
    
    if($request->isMethod("post") && $request->hasParameter('login')){
    	$this->form->bind($request->getParameter("login"));
    
    	if($this->form->isValid()){
    		//if(!$persona = PersonaTable::login($this->form->getValue("rut"), $this->form->getValue("dv"))){
    		  if(!$persona = Doctrine_Core::getTable('Persona')->findOneByRutAndDvAndPassword($this->form->getValue('rut'), $this->form->getValue('dv'), md5($this->form->getValue('password')) )){
    			// No hemos conseguido loguear al usuario
    			// Redirigimos de nuevo al login con un mensaje de error
    			$this->getUser()->setFlash("error", "Datos incorrectos");
    			//$this->redirect("@user_login");
    		}else{
    			// Logueamos
                if($persona->getEstadoLogin() == 0){
                    $this->redirect('persona/password1');
                }else{
                    if($persona->getEstadoLogin() == 1){
                        $this->getUser()->setAuthenticated(true);
            			$this->getUser()->setAttribute("id_persona",$persona->getId());
            			$this->getUser()->setAttribute("rut",$persona->getRut());
            			$this->redirect('persona/seleccionConcurso');
                    }else{
                    	if($persona->getEstadoLogin() == 3){
                    		$persona->setEstadoLogin(1);
                    		$persona->save();
                    		$this->getUser()->setAuthenticated(true);
                    		$this->getUser()->setAttribute("id_persona",$persona->getId());
                    		$this->redirect('persona/seleccionConcurso');
                    	}
                    }
                }
    			
    			//$this->redirect('http://www.ogb.cl');
    			// Comprobamos si tiene referer, si no, le llevamos a la homepage
    			//$url = $this->getUser()->getAttribute("referer",false)?:"@homepage";
    			//$this->getUser()->setAttribute("referer", false);
    			//$this->redirect($url);
    		}
    	}
    
  }
  }
  
  public function executePassword1(sfWebRequest $request){
    $this->form = new PasswordForm();
    if($request->isMethod("post")){
        $this->form->bind($request->getParameter("password_form"));

        	if($this->form->isValid()){
        	   if($persona = Doctrine_Core::getTable('Persona')->findOneByRutAndDv($this->form->getValue('rut'), $this->form->getValue('dv'))){
        	       if($persona->getEstadoLogin() == 0 || $persona->getEstadoLogin() == 3){
                       
        	       	   $pass = substr(md5(rand()),0,8);
        	       	   //$persona->setPassword($this->form->getValue('password'));
        	       	   $persona->setPassword($pass);
                       $persona->setEmail($this->form->getValue('email'));
                       $persona->setTelefono($this->form->getValue('telefono'));
                       $persona->setEstadoLogin(3);
                       //$persona->setEstadoLogin(2);
                       $persona->save();
                       
                       $message = $this->getMailer()->compose();
                       $message->setSubject('Contrasena para ingresar al sistema de postulacion DI');
                        
                       $message->setTo($persona->getEmail());
                       //$message->setTo('miguel.alcaino@ogb.cl');
                       $message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
                       $html = $this->getPartial('persona/nueva_password_email', array('password'=>$pass));
                       $message->setBody($html, 'text/html');
                       //$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
                       $this->getMailer()->send($message);
                       
                       
                       //$this->getUser()->setFlash("notice", 'Ahora puede ingresar al sistema con su rut y contrase&ntilde;a. Este cambio ha sido notificado a la Direcci&oacute;n de Investigaci&oacute;n');
                       $this->getUser()->setFlash("notice", "La contrase&ntilde; para ingresar al sistema ha sido enviada a su correo electr&oacute;nico. Revisela y entre al sistema con ella.");
                       $this->redirect('persona/login');
                   }else{
                        if($persona->getEstadoLogin() == 1){
                            $this->getUser()->setFlash("notice", 'Usted ya ha registrado su contrase&ntilde;a en alguna ocasi&oacute;n anterior. Si tiene alg&uacute;n problema con esto, p&oacute;ngase en contacto con la DI al anexo 3325 o al email dii.informacion@ucv.cl.');
                            $this->redirect('persona/login');
                        }else{
                            if($persona->getEstadoLogin() == 2){
                                $this->getUser()->setFlash("notice", 'Usted debe esperar a que la Direcci&oacute;n de Investigaci&oacute;n le env&iacute;e un email confirmando la activaci&oacute;n de su cuenta.');
                            $this->redirect('persona/login');
                            }
                        }
                        
                   }
        	   }else{
        	       $this->getUser()->setFlash("error", "Usted no figura en la base de datos de profesores Asociados, Jerarquizados o Adscritos. P&oacute;ngase en contacto con la Direcci&oacute;n de Investigaci&oacute;n<br />al anexo 3325 o al email dii.informacion@ucv.cl");
                   $this->redirect('persona/password1');
        	   }
        	}
    }
  }
  
  public function executeLogout(sfWebRequest $request){
  	$this->getUser()->setAuthenticated(false);
  	$this->getUser()->getAttributeHolder()->clear();
  	$this->redirect("persona/login");
  }
  
  public function executeInicializarPostulacion(sfWebRequest $request){
  	
  	if(!$this->concurso = Doctrine_Core::getTable('Concurso')->findOneByAcronimo($request->getParameter('acronimo'))){
  		$this->redirect('persona/seleccionConcurso');
  	}else{ 
  		//Falta validar que esto se ejecute una sola ves por concurso. Se podría ejecutar de nuevo en caso de que se manipule la url
  		$persona = Doctrine_Core::getTable('Persona')->find($this->getUser()->getAttribute('id_persona'));
        $bandera = false;
        
       /*
        foreach($persona->getParticipantesPostulacion() as $participante_postulacion){
            if($this->concurso->getAcronimo() == 'di_pia' || $this->concurso->getAcronimo() == 'di_sello_valorico'){
                if( ($participante_postulacion->getPersonaConcurso()->getConcurso()->getAcronimo() == "di_pia" || $participante_postulacion->getPersonaConcurso()->getConcurso()->getAcronimo() == 'di_sello_valorico') && $participante_postulacion->getTipoParticipante() == 3  ){
                    
                        $bandera = true;
                }
            }
        } */
        
        //foreach($persona->getPostulacionesDondeSoy(3) as $postulacion){//Postulaciones donde se es co-investigador
        //foreach($persona->getPersonaConcursos() as $postulacion){
//            foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
//                if($participante_postulacion->getPersonaId() == $persona->getId() && $participante_postulacion->getTipoParticipante() == 3){
//                    if($postulacion->getConcurso()->getAcronimo() == 'di_pia' || $postulacion->getConcurso()->getAcronimo() == 'di_sello_valorico'){
//                        $bandera = true;
//                    }
//                }

  	         //if($postulacion->getConcurso()->getAcronimo() == $this->concurso->getAcronimo()){
  	           //  $bandera = true;
  	         //}
  	     }
  	     
  	     if($persona->getPostulacionesDondeSoy(1) > 0){
  	     	foreach($persona->getPostulacionesDondeSoy(1) as $postulacion_donde_soy){
  	     		if($postulacion_donde_soy->getConcurso()->getAcronimo() == $this->concurso->getAcronimo()){
  	     			$this->getUser()->setFlash('error','Usted ya tiene una postulaci&oacute;n asociada a este concurso. No puede hacerlo m&aacute; de una vez.');
            		$this->redirect('persona/seleccionConcurso');
  	     		
  	     		}
  	     	}
  	     }
  	     
         if($bandera){ // Si el postulante es coinvestigador de un PIA o de un SELLO
            $this->getUser()->setFlash('error','Usted no puede ser Director de este proyecto, ya que es co-investigador del mismo en otra postulaci&oacute;n.');
            $this->redirect('persona/seleccionConcurso');
         }else{
            $postulacion = $persona->inicializarPostulacion($this->concurso);
  		//$this->getUser()->setAttribute('id_postulacion', $postulacion->getId());
  		//$this->redirect('postular/'.$this->concurso->getAcronimo());
  		$this->redirect('postular/'.$postulacion->getId().'?etapa=1&paso=1');
         }
  		
  	}
  
  
  public function executePostular(sfWebRequest $request){
  	$this->forward404Unless($postulacion = Doctrine_Core::getTable('PersonaConcurso')->find(array($request->getParameter('id_postulacion'))));
  	
    //CODIGO AGREGADO PARA EL CIERRE DE LAS POSTULACIONES
    $fecha_de_cierre = "2013-02-01";
    $hoy = date("Y-m-d");
    
    $fecha_de_cierre_date = strtotime($fecha_de_cierre);
    $hoy_date = strtotime($hoy);
    
    /*
    if($hoy_date >= $fecha_de_cierre_date){
      $this->getUser()->setFlash('notice','Las postulaciones han sido cerradas.');
      $this->redirect('persona/seleccionConcurso');
    }*/
    
    //FIN DE CODIGO AGREGADO PARA EL CIERRE LAS POSTULACIONES
    
    //CODIGO QUE VALIDA QUE UNA POSTULACION ESTA CERRADA NO SE PUEDA VOLVER A EDITAR
  	//if($postulacion->getEstado() == 2){
  	//	$this->getUser()->setFlash('error','Esta postulaci&oacute;n ya ha sido enviada. No puede editarla m&aacute;s.');
  	//	$this->redirect('persona/seleccionConcurso');
  	//}
    //FIN DE CODIGO QUE VCALIDA QUE UNA POSTULACION CERRADA NO SE PUEDA EDITAR
  	
  	if($postulacion->getPersona()->getid() == $this->getUser()->getAttribute('id_persona')){
  		$this->persona = $postulacion->getPersona();
  		$this->etapa = $request->getParameter('etapa');
  		$this->paso = $request->getParameter('paso');
  		//$postulacion = Doctrine_Core::getTable('PersonaConcurso')->find(array($this->getUser()->getAttribute('id_postulacion')));
  		$this->form = new PersonaConcursoForm($postulacion);
  	}else{
  		$this->redirect('persona/logout');
  	}
  	
  	
  	
  }
  
  public function executeUpdatePostulacion(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
  	$this->forward404Unless($persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find(array($request->getParameter('id_postulacion'))), sprintf('Object persona_concurso does not exist (%s).', $request->getParameter('id_postulacion')));
  	
  	if($persona_concurso->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
  		$this->redirect('persona/logout');
  	}
  	
  	$this->form = new PersonaConcursoForm($persona_concurso);
  	
//   	$hola = $request->getFiles($this->form->getName());
  	
//   	foreach($hola['archivos'] as $k => $v){
//   		echo $v['ruta']['name'];
//   		$archivo_postulacion = Doctrine_Core::getTable('ArchivoPostulacion')->getArchivo($k, $persona_concurso->getId());
//   		$archivo_postulacion->setRuta($v['ruta']['name']);
//   		$archivo_postulacion->save();
//   	}
  	$this->processFormPostulacion($request, $this->form);
  	
  	//$this->setTemplate('postular/'.$persona_concurso->getId().'?etapa='.$request->getParameter('etapa').'&paso='.$request->getParameter('paso'));
  	$this->getUser()->setFlash("error", "Los datos ingresados son inv&aacute;lidos. Intente de nuevo.");
  	$this->redirect('postular/'.$persona_concurso->getId().'?etapa='.$request->getParameter('etapa').'&paso='.$request->getParameter('paso'));
  	//echo "MAL!!!";
  }
  
  protected function processFormPostulacion(sfWebRequest $request, sfForm $form)
  {
  	$formulario_visible =$request->getParameter($form->getName());
  	
  	$persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find(array($request->getParameter('id_postulacion')));
  	$hay_error = false;
	if($formulario_archivos = $request->getFiles($form->getName())){
  	
		
		
  	foreach($formulario_archivos['archivos'] as $key => $valor){
  		//$archivo_postulacion = Doctrine_Core::getTable('ArchivoPostulacion')->getArchivo($key, $persona_concurso->getId());
  		$archivo_postulacion = Doctrine_Core::getTable('ArchivoPostulacion')->find($formulario_visible['archivos'][$key]['id']);
  		//$archivo_postulacion = Doctrine_Core::getTable('ArchivoPostulacion')->find(array($formulario_visible['archivos'][$key]['id']));
  		
  		if($valor['ruta']['name'] != ''){
  			//Valida que se haya seleccionado un archivo en el input file 
  			
  			if($valor['ruta']['type'] == 'application/pdf' || $valor['ruta']['type'] == 'application/x-pdf'){
  			if(move_uploaded_file($valor['ruta']['tmp_name'], sfConfig::get('app_path_subida_archivos').'/'.$persona_concurso->getPersona()->getId().$persona_concurso->getId().$archivo_postulacion->getId().$valor['ruta']['name'])){
  				$archivo_postulacion->setRuta($persona_concurso->getPersona()->getId().$persona_concurso->getId().$archivo_postulacion->getId().$valor['ruta']['name']);
  				$this->getUser()->setFlash('notice','Sus archivos han sido cargados correctamente.');
  			}else{
  				$this->getUser()->setFlash('error','El archivo no ha sido subido. Ha ocurrido un problema.');
  				$hay_error = true;
  			}
  			}else{
  				$this->getUser()->setFlash('error','Uno o mas archivos no han sido subidos. Deben tener extension PDF');
  				$hay_error = true;
  			}
  		}else{
  			//$archivo_postulacion->setRuta($formulario_visible['archivos'][$key]['ruta']);
  		}
  		$archivo_postulacion->save();
  		
  	}// Fin foreach para archivos
  	
	}
  	
  	$form->bind($formulario_visible, $request->getFiles($form->getName()));
  	if ($form->isValid())
  	{
  		
  		foreach($formulario_visible as $k => $v){
  			
  			if(strcmp($k,"_csrf_token") != 0){
  				
  				if(strcmp($k, "archivos") == 0){
  					
  					
  				}else{
  					if(strcmp($k, 'recursos') == 0){
  						foreach($v as $key_recurso => $recurso){
  							$recurso_aux = Doctrine_Core::getTable('Recurso')->find($recurso['id']);
  							$total_recurso = 0;
  							foreach($recurso['detalles_recurso'] as $detalle_recurso){
  								$det_recurso = Doctrine_Core::getTable('DetalleRecurso')->find($detalle_recurso['id']);
  								$det_recurso->setMonto($detalle_recurso['monto']);
  								$total_recurso = $total_recurso + $detalle_recurso['monto'];
  								$det_recurso->save();
  								
  								foreach($detalle_recurso['detalles_gastos_operacion'] as $detalle_gasto_operacion){
  								  $det_gasto_operacion = Doctrine_Core::getTable('DetalleRecursoGastosOperacion')->find($detalle_gasto_operacion['id']);
  								  $det_gasto_operacion->setMonto($detalle_gasto_operacion['monto']) ;
  								  $det_gasto_operacion->save();
  								}
  								
  							}
  							$recurso_aux->setTotal($total_recurso);
  							$recurso_aux->save();
  							if($formulario_archivos['recursos'][$key_recurso]['archivo_recurso']['ruta']['name'] != ''){
  								if($formulario_archivos['recursos'][$key_recurso]['archivo_recurso']['ruta']['type'] == 'application/pdf' || $formulario_archivos['recursos'][$key_recurso]['archivo_recurso']['ruta']['type'] == 'application/x-pdf'){
  								$archivo_recurso = Doctrine_Core::getTable('ArchivoRecurso')->find($recurso['archivo_recurso']['id']);
  								if(move_uploaded_file($formulario_archivos['recursos'][$key_recurso]['archivo_recurso']['ruta']['tmp_name'], sfConfig::get('app_path_subida_archivos').'/'.$persona_concurso->getPersona()->getId().$persona_concurso->getId().$recurso_aux->getId().$archivo_recurso->getId().$formulario_archivos['recursos'][$key_recurso]['archivo_recurso']['ruta']['name'])){
	  								$archivo_recurso->setRuta($persona_concurso->getPersona()->getId().$persona_concurso->getId().$recurso_aux->getId().$archivo_recurso->getId().$formulario_archivos['recursos'][$key_recurso]['archivo_recurso']['ruta']['name']);
	  								$archivo_recurso->save();
	  								$this->getUser()->setFlash('notice','Sus archivos han sido cargados correctamente.');
  								}
  								}else{
  									$this->getUser()->setFlash('error','Uno o mas archivos no han sido subidos. Deben tener extension PDF');
  									$hay_error = true;
  								}
  							}
  						}
  					}else{
  						$persona_concurso->set($k, $v);
  						
  						
  					}
  						
  				}
  				
  			}
  			

  		}
  		$persona_concurso->save();
  		//$persona_concurso = $form->save();
    		//print_r($formulario_archivos);
  		if($hay_error){
  				
  		}else{
  			$this->getUser()->setFlash("notice", "Los datos han sido guardados satisfactoriamente.");
  		}
  		$this->redirect('postular/'.$persona_concurso->getId().'?etapa='.$request->getParameter('etapa').'&paso='.$request->getparameter('paso'));
  	}
  }
  
  public function executeSeleccionConcurso(sfWebRequest $request){
  	
  	$this->persona = Doctrine_Core::getTable('Persona')->find($this->getUser()->getAttribute('id_persona'));
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
  	
  	$hoy = date("Y-m-d H:i:s");
    $hoy_date = strtotime($hoy);
  	
  	$this->postulaciones_en_curso = array();
    $this->postulaciones_enviadas = array();
    foreach($this->persona->getPersonaConcursos() as $postulacion){
        if($postulacion->getEstado() == 1){
            foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
                if($participante_postulacion->getPersona()->getId() == $this->persona->getId() && $participante_postulacion->getTipoParticipante() == 1){
                  if(strtotime($postulacion->getConcurso()->getInicioPostulacion()) <= $hoy_date && strtotime($postulacion->getConcurso()->getTerminoPostulacion()) >= $hoy_date ){
                    $this->postulaciones_en_curso[] = $postulacion;
                    }
                }
            }
        }else{
            if($postulacion->getEstado() == 2){
                $this->postulaciones_enviadas[] = $postulacion;
            }
        }
        
            
        }
    
  	$this->concursos_disponibles = $this->persona->getPostulacionesDisponibles($nombre_array_concursos);
    
    //CODIGO AGREGADO PARA EL CIERRE DE LAS POSTULACIONES
    /**
    $fecha_de_cierre = "2012-03-07";
    $hoy = date("Y-m-d");
    
    $fecha_de_cierre_date = strtotime($fecha_de_cierre);
    $hoy_date = strtotime($hoy);
    
    
    if($hoy_date >= $fecha_de_cierre_date){
      $this->concursos_disponibles = array();
      $this->postulaciones_en_curso = array();
      $this->getUser()->setFlash('cierre','Las postulaciones se encuentran cerradas.');
    }
    **/
    //FIN DE CODIGO AGREGADO PARA EL CIERRE LAS POSTULACIONES
  }
  
  
  
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->personas = Doctrine_Core::getTable('Persona')
//       ->createQuery('a')
//       ->execute();
//   }

  public function executeShow(sfWebRequest $request)
  {
    $this->persona = Doctrine_Core::getTable('Persona')->find(array($request->getParameter('id')));
    $this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    $this->forward404Unless($this->persona);
  }

//   public function executeNew(sfWebRequest $request)
//   {
//     $this->form = new PersonaForm();
//   }

//   public function executeCreate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST));

//     $this->form = new PersonaForm();

//     $this->processForm($request, $this->form);

//     $this->setTemplate('new');
//   }

  public function executeEdit(sfWebRequest $request)
  {
  	
    $this->forward404Unless($persona = Doctrine_Core::getTable('Persona')->find(array($request->getParameter('id'))), sprintf('Object persona does not exist (%s).', $request->getParameter('id')));
    if($request->getParameter('id_postulacion')){
    	$this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    }else{
    	$this->postulacion = null;
    }
    if($this->getUser()->getAttribute('id_persona') == $persona->getId()){
    	$this->form = new PersonaForm($persona);
    }else{
    	$this->redirect('persona/logout');
    }
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($persona = Doctrine_Core::getTable('Persona')->find(array($request->getParameter('id'))), sprintf('Object persona does not exist (%s).', $request->getParameter('id')));
    
    if($persona->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new PersonaForm($persona);
	
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

//   public function executeDelete(sfWebRequest $request)
//   {
//     $request->checkCSRFProtection();

//     $this->forward404Unless($persona = Doctrine_Core::getTable('Persona')->find(array($request->getParameter('id'))), sprintf('Object persona does not exist (%s).', $request->getParameter('id')));
//     $persona->delete();

//     $this->redirect('persona/index');
//   }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $persona = $form->save();
		if($request->getParameter('id_postulacion')){
		      //$this->redirect('postular/'.$request->getParameter('id_postulacion').'?etapa=6&paso=1');
            $this->redirect('persona/edit?id='.$persona->getId().'&id_postulacion='.$request->getParameter('id_postulacion'));
		}else{
		  if($request->hasParameter('save_pnj')){
		  	  
		  	$message = $this->getMailer()->compose();
		  	$message->setSubject('Nuevo profesor no jerarquizado');
		  	
		  	$message->setTo('dii.informacion@ucv.cl');
		  	//$message->setTo('miguel.alcaino@ogb.cl');
		  	$message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
		  	$html = $this->getPartial('persona/registro_pnj_email', array('persona'=>$persona));
		  	$message->setBody($html, 'text/html');
		  	//$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
		  	$this->getMailer()->send($message);
		  	
		      $this->getUser()->setFlash('notice','Sus datos han sido enviados a la Direcci&oacute;n de Investigaci&oacute;n.<br /> Dentro de poco activaremos su cuenta con una contrase&ntilde;a que ser&aacute; enviada a su correo electr&oacute;nico.');
              $this->redirect('persona/login');
		  }else{
		      $this->redirect('persona/edit?id='.$persona->getId());
		  }
			
		}
      
    }
  }
}
