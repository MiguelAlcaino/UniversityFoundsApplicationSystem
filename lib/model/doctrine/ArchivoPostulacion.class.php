<?php

/**
 * ArchivoPostulacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ArchivoPostulacion extends BaseArchivoPostulacion
{
	public function getArchivo($id_tipo_archivo, $id_persona_concurso){
		return Doctrine::getTable('ArchivoPostulacion')->getArchivo($id_tipo_archivo, $id_persona_concurso);
	}
}