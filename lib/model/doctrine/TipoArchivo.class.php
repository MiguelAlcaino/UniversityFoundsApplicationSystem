<?php

/**
 * TipoArchivo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TipoArchivo extends BaseTipoArchivo
{
	public function __toString(){
		return $this->getNombreDocumento();
	}
}