<?php

/**
 * BaseEncuesta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property timestamp $fecha_inicio
 * @property timestamp $fecha_termino
 * @property boolean $esta_publicada
 * @property Doctrine_Collection $Preguntas
 * @property Doctrine_Collection $SesionesEncuesta
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getNombre()           Returns the current record's "nombre" value
 * @method timestamp           getFechaInicio()      Returns the current record's "fecha_inicio" value
 * @method timestamp           getFechaTermino()     Returns the current record's "fecha_termino" value
 * @method boolean             getEstaPublicada()    Returns the current record's "esta_publicada" value
 * @method Doctrine_Collection getPreguntas()        Returns the current record's "Preguntas" collection
 * @method Doctrine_Collection getSesionesEncuesta() Returns the current record's "SesionesEncuesta" collection
 * @method Encuesta            setId()               Sets the current record's "id" value
 * @method Encuesta            setNombre()           Sets the current record's "nombre" value
 * @method Encuesta            setFechaInicio()      Sets the current record's "fecha_inicio" value
 * @method Encuesta            setFechaTermino()     Sets the current record's "fecha_termino" value
 * @method Encuesta            setEstaPublicada()    Sets the current record's "esta_publicada" value
 * @method Encuesta            setPreguntas()        Sets the current record's "Preguntas" collection
 * @method Encuesta            setSesionesEncuesta() Sets the current record's "SesionesEncuesta" collection
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEncuesta extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('encuesta');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('nombre', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('fecha_inicio', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('fecha_termino', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('esta_publicada', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Pregunta as Preguntas', array(
             'local' => 'id',
             'foreign' => 'encuesta_id'));

        $this->hasMany('SesionEncuesta as SesionesEncuesta', array(
             'local' => 'id',
             'foreign' => 'encuesta_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}