<?php

/**
 * @author Miguel Alcaino
 * @copyright 2011
 */

class DominioMailValidator extends sfValidatorBase{
  
  protected function configure($options = array(), $messages = array()){
    $this->setMessage('invalid', 'Debe utilizar su correo insitucional PUCV.');
    parent::configure($options, $messages);
  }
  
  protected function doClean($value){
    $original = $value;
    //substr("abcdef", -2);    // devuelve "ef"
    
    if(substr($value, -6) == 'ucv.cl' || substr($value, -6) == 'ead.cl'){
    	
    }else{
    	throw new sfValidatorError($this,'invalid');
    }
    return $original;
  }
}