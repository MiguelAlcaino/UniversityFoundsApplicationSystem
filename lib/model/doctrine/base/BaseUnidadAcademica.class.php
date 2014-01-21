<?php

/**
 * BaseUnidadAcademica
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $facultad_id
 * @property string $nombre
 * @property Facultad $Facultad
 * @property Doctrine_Collection $Personas
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method integer             getFacultadId()  Returns the current record's "facultad_id" value
 * @method string              getNombre()      Returns the current record's "nombre" value
 * @method Facultad            getFacultad()    Returns the current record's "Facultad" value
 * @method Doctrine_Collection getPersonas()    Returns the current record's "Personas" collection
 * @method UnidadAcademica     setId()          Sets the current record's "id" value
 * @method UnidadAcademica     setFacultadId()  Sets the current record's "facultad_id" value
 * @method UnidadAcademica     setNombre()      Sets the current record's "nombre" value
 * @method UnidadAcademica     setFacultad()    Sets the current record's "Facultad" value
 * @method UnidadAcademica     setPersonas()    Sets the current record's "Personas" collection
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUnidadAcademica extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('unidad_academica');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('facultad_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('nombre', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Facultad', array(
             'local' => 'facultad_id',
             'foreign' => 'id'));

        $this->hasMany('Persona as Personas', array(
             'local' => 'id',
             'foreign' => 'unidad_academica_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}