<?php

/**
 * BaseArchivoDePersona
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $persona_id
 * @property integer $tipo_archivo
 * @property string $ruta
 * @property Persona $Persona
 * 
 * @method integer          getId()           Returns the current record's "id" value
 * @method integer          getPersonaId()    Returns the current record's "persona_id" value
 * @method integer          getTipoArchivo()  Returns the current record's "tipo_archivo" value
 * @method string           getRuta()         Returns the current record's "ruta" value
 * @method Persona          getPersona()      Returns the current record's "Persona" value
 * @method ArchivoDePersona setId()           Sets the current record's "id" value
 * @method ArchivoDePersona setPersonaId()    Sets the current record's "persona_id" value
 * @method ArchivoDePersona setTipoArchivo()  Sets the current record's "tipo_archivo" value
 * @method ArchivoDePersona setRuta()         Sets the current record's "ruta" value
 * @method ArchivoDePersona setPersona()      Sets the current record's "Persona" value
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArchivoDePersona extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('archivo_de_persona');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('persona_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('tipo_archivo', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('ruta', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Persona', array(
             'local' => 'persona_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}