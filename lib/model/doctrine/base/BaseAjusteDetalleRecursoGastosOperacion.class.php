<?php

/**
 * BaseAjusteDetalleRecursoGastosOperacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $ajuste_detalle_recurso_id
 * @property integer $detalle_recurso_gastos_operacion_id
 * @property integer $monto_aprobado
 * @property AjusteDetalleRecurso $AjusteDetalleRecurso
 * @property DetalleRecursoGastosOperacion $DetalleRecursoGastosOperacion
 * 
 * @method integer                             getId()                                  Returns the current record's "id" value
 * @method integer                             getAjusteDetalleRecursoId()              Returns the current record's "ajuste_detalle_recurso_id" value
 * @method integer                             getDetalleRecursoGastosOperacionId()     Returns the current record's "detalle_recurso_gastos_operacion_id" value
 * @method integer                             getMontoAprobado()                       Returns the current record's "monto_aprobado" value
 * @method AjusteDetalleRecurso                getAjusteDetalleRecurso()                Returns the current record's "AjusteDetalleRecurso" value
 * @method DetalleRecursoGastosOperacion       getDetalleRecursoGastosOperacion()       Returns the current record's "DetalleRecursoGastosOperacion" value
 * @method AjusteDetalleRecursoGastosOperacion setId()                                  Sets the current record's "id" value
 * @method AjusteDetalleRecursoGastosOperacion setAjusteDetalleRecursoId()              Sets the current record's "ajuste_detalle_recurso_id" value
 * @method AjusteDetalleRecursoGastosOperacion setDetalleRecursoGastosOperacionId()     Sets the current record's "detalle_recurso_gastos_operacion_id" value
 * @method AjusteDetalleRecursoGastosOperacion setMontoAprobado()                       Sets the current record's "monto_aprobado" value
 * @method AjusteDetalleRecursoGastosOperacion setAjusteDetalleRecurso()                Sets the current record's "AjusteDetalleRecurso" value
 * @method AjusteDetalleRecursoGastosOperacion setDetalleRecursoGastosOperacion()       Sets the current record's "DetalleRecursoGastosOperacion" value
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAjusteDetalleRecursoGastosOperacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ajuste_detalle_recurso_gastos_operacion');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('ajuste_detalle_recurso_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('detalle_recurso_gastos_operacion_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('monto_aprobado', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AjusteDetalleRecurso', array(
             'local' => 'ajuste_detalle_recurso_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('DetalleRecursoGastosOperacion', array(
             'local' => 'detalle_recurso_gastos_operacion_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}