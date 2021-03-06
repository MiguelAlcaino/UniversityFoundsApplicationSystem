<?php

/**
 * BaseItemConcurso
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $concurso_id
 * @property integer $item_id
 * @property integer $monto_maximo
 * @property integer $porcentaje_maximo
 * @property string $acronimo_recurso
 * @property Concurso $Concurso
 * @property Item $Item
 * @property Doctrine_Collection $PersonaConcursos
 * @property Doctrine_Collection $Recursos
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method integer             getConcursoId()        Returns the current record's "concurso_id" value
 * @method integer             getItemId()            Returns the current record's "item_id" value
 * @method integer             getMontoMaximo()       Returns the current record's "monto_maximo" value
 * @method integer             getPorcentajeMaximo()  Returns the current record's "porcentaje_maximo" value
 * @method string              getAcronimoRecurso()   Returns the current record's "acronimo_recurso" value
 * @method Concurso            getConcurso()          Returns the current record's "Concurso" value
 * @method Item                getItem()              Returns the current record's "Item" value
 * @method Doctrine_Collection getPersonaConcursos()  Returns the current record's "PersonaConcursos" collection
 * @method Doctrine_Collection getRecursos()          Returns the current record's "Recursos" collection
 * @method ItemConcurso        setId()                Sets the current record's "id" value
 * @method ItemConcurso        setConcursoId()        Sets the current record's "concurso_id" value
 * @method ItemConcurso        setItemId()            Sets the current record's "item_id" value
 * @method ItemConcurso        setMontoMaximo()       Sets the current record's "monto_maximo" value
 * @method ItemConcurso        setPorcentajeMaximo()  Sets the current record's "porcentaje_maximo" value
 * @method ItemConcurso        setAcronimoRecurso()   Sets the current record's "acronimo_recurso" value
 * @method ItemConcurso        setConcurso()          Sets the current record's "Concurso" value
 * @method ItemConcurso        setItem()              Sets the current record's "Item" value
 * @method ItemConcurso        setPersonaConcursos()  Sets the current record's "PersonaConcursos" collection
 * @method ItemConcurso        setRecursos()          Sets the current record's "Recursos" collection
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseItemConcurso extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('item_concurso');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('concurso_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('item_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('monto_maximo', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('porcentaje_maximo', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('acronimo_recurso', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Concurso', array(
             'local' => 'concurso_id',
             'foreign' => 'id'));

        $this->hasOne('Item', array(
             'local' => 'item_id',
             'foreign' => 'id'));

        $this->hasMany('PersonaConcurso as PersonaConcursos', array(
             'refClass' => 'Recurso',
             'local' => 'item_concurso_id',
             'foreign' => 'persona_concurso_id'));

        $this->hasMany('Recurso as Recursos', array(
             'local' => 'id',
             'foreign' => 'item_concurso_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}