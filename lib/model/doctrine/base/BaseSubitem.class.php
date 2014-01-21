<?php

/**
 * BaseSubitem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $item_id
 * @property string $nombre_subitem
 * @property Item $Item
 * 
 * @method integer getId()             Returns the current record's "id" value
 * @method integer getItemId()         Returns the current record's "item_id" value
 * @method string  getNombreSubitem()  Returns the current record's "nombre_subitem" value
 * @method Item    getItem()           Returns the current record's "Item" value
 * @method Subitem setId()             Sets the current record's "id" value
 * @method Subitem setItemId()         Sets the current record's "item_id" value
 * @method Subitem setNombreSubitem()  Sets the current record's "nombre_subitem" value
 * @method Subitem setItem()           Sets the current record's "Item" value
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSubitem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('subitem');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('item_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('nombre_subitem', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Item', array(
             'local' => 'item_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}