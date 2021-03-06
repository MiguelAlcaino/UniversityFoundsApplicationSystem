<?php

/**
 * ArchivoPostulacionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArchivoPostulacionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArchivoPostulacionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArchivoPostulacion');
    }
    
    public static function getArchivo($id_tipo_archivo, $id_persona_concurso){
    	return Doctrine_Query::create()
    	->from('ArchivoPostulacion a')
    	->where('a.id_tipo_archivo = ?', array($id_tipo_archivo))
    	->andWhere('a.id_persona_concurso = ?', array($id_persona_concurso))
    	->fetchOne();
    }
    
    
}