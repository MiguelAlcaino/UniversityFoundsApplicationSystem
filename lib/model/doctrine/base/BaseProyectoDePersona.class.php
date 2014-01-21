<?php

/**
 * BaseProyectoDePersona
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $persona_id
 * @property integer $tipo_proyecto
 * @property string $fuente
 * @property integer $tipo_participacion
 * @property string $concurso
 * @property string $codigo
 * @property string $titulo
 * @property boolean $es_valido
 * @property Persona $Persona
 * 
 * @method integer           getId()                 Returns the current record's "id" value
 * @method integer           getPersonaId()          Returns the current record's "persona_id" value
 * @method integer           getTipoProyecto()       Returns the current record's "tipo_proyecto" value
 * @method string            getFuente()             Returns the current record's "fuente" value
 * @method integer           getTipoParticipacion()  Returns the current record's "tipo_participacion" value
 * @method string            getConcurso()           Returns the current record's "concurso" value
 * @method string            getCodigo()             Returns the current record's "codigo" value
 * @method string            getTitulo()             Returns the current record's "titulo" value
 * @method boolean           getEsValido()           Returns the current record's "es_valido" value
 * @method Persona           getPersona()            Returns the current record's "Persona" value
 * @method ProyectoDePersona setId()                 Sets the current record's "id" value
 * @method ProyectoDePersona setPersonaId()          Sets the current record's "persona_id" value
 * @method ProyectoDePersona setTipoProyecto()       Sets the current record's "tipo_proyecto" value
 * @method ProyectoDePersona setFuente()             Sets the current record's "fuente" value
 * @method ProyectoDePersona setTipoParticipacion()  Sets the current record's "tipo_participacion" value
 * @method ProyectoDePersona setConcurso()           Sets the current record's "concurso" value
 * @method ProyectoDePersona setCodigo()             Sets the current record's "codigo" value
 * @method ProyectoDePersona setTitulo()             Sets the current record's "titulo" value
 * @method ProyectoDePersona setEsValido()           Sets the current record's "es_valido" value
 * @method ProyectoDePersona setPersona()            Sets the current record's "Persona" value
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProyectoDePersona extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('proyecto_de_persona');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('persona_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('tipo_proyecto', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('fuente', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('tipo_participacion', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('concurso', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('codigo', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('titulo', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('es_valido', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
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