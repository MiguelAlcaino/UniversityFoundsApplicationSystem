<?php

/**
 * BaseCapituloLibroDePersona
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $persona_id
 * @property string $nombre_libro
 * @property string $nombre_capitulo
 * @property string $editorial
 * @property integer $anio
 * @property Persona $Persona
 * 
 * @method integer                getId()              Returns the current record's "id" value
 * @method integer                getPersonaId()       Returns the current record's "persona_id" value
 * @method string                 getNombreLibro()     Returns the current record's "nombre_libro" value
 * @method string                 getNombreCapitulo()  Returns the current record's "nombre_capitulo" value
 * @method string                 getEditorial()       Returns the current record's "editorial" value
 * @method integer                getAnio()            Returns the current record's "anio" value
 * @method Persona                getPersona()         Returns the current record's "Persona" value
 * @method CapituloLibroDePersona setId()              Sets the current record's "id" value
 * @method CapituloLibroDePersona setPersonaId()       Sets the current record's "persona_id" value
 * @method CapituloLibroDePersona setNombreLibro()     Sets the current record's "nombre_libro" value
 * @method CapituloLibroDePersona setNombreCapitulo()  Sets the current record's "nombre_capitulo" value
 * @method CapituloLibroDePersona setEditorial()       Sets the current record's "editorial" value
 * @method CapituloLibroDePersona setAnio()            Sets the current record's "anio" value
 * @method CapituloLibroDePersona setPersona()         Sets the current record's "Persona" value
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCapituloLibroDePersona extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('capitulo_libro_de_persona');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('persona_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('nombre_libro', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('nombre_capitulo', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('editorial', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('anio', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Persona', array(
             'local' => 'persona_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}