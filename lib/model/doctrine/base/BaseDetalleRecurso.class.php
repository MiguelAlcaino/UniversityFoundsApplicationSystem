<?php

/**
 * BaseDetalleRecurso
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $recurso_id
 * @property integer $periodo
 * @property integer $monto
 * @property Recurso $Recurso
 * @property Doctrine_Collection $DetallesRecursoGastosOperacion
 * @property Doctrine_Collection $AjustesDetalleRecurso
 * 
 * @method integer             getId()                             Returns the current record's "id" value
 * @method integer             getRecursoId()                      Returns the current record's "recurso_id" value
 * @method integer             getPeriodo()                        Returns the current record's "periodo" value
 * @method integer             getMonto()                          Returns the current record's "monto" value
 * @method Recurso             getRecurso()                        Returns the current record's "Recurso" value
 * @method Doctrine_Collection getDetallesRecursoGastosOperacion() Returns the current record's "DetallesRecursoGastosOperacion" collection
 * @method Doctrine_Collection getAjustesDetalleRecurso()          Returns the current record's "AjustesDetalleRecurso" collection
 * @method DetalleRecurso      setId()                             Sets the current record's "id" value
 * @method DetalleRecurso      setRecursoId()                      Sets the current record's "recurso_id" value
 * @method DetalleRecurso      setPeriodo()                        Sets the current record's "periodo" value
 * @method DetalleRecurso      setMonto()                          Sets the current record's "monto" value
 * @method DetalleRecurso      setRecurso()                        Sets the current record's "Recurso" value
 * @method DetalleRecurso      setDetallesRecursoGastosOperacion() Sets the current record's "DetallesRecursoGastosOperacion" collection
 * @method DetalleRecurso      setAjustesDetalleRecurso()          Sets the current record's "AjustesDetalleRecurso" collection
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDetalleRecurso extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('detalle_recurso');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('recurso_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('periodo', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('monto', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Recurso', array(
             'local' => 'recurso_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('DetalleRecursoGastosOperacion as DetallesRecursoGastosOperacion', array(
             'local' => 'id',
             'foreign' => 'detalle_recurso_id'));

        $this->hasMany('AjusteDetalleRecurso as AjustesDetalleRecurso', array(
             'local' => 'id',
             'foreign' => 'detalle_recurso_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}