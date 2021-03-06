<?php

/**
 * BaseConvenioDesempenoPostulacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $persona_concurso_id
 * @property timestamp $fecha_convenio
 * @property string $ruta_convenio
 * @property PersonaConcurso $PersonaConcurso
 * @property Doctrine_Collection $CompromisosDeConvenio
 * 
 * @method integer                      getId()                    Returns the current record's "id" value
 * @method integer                      getPersonaConcursoId()     Returns the current record's "persona_concurso_id" value
 * @method timestamp                    getFechaConvenio()         Returns the current record's "fecha_convenio" value
 * @method string                       getRutaConvenio()          Returns the current record's "ruta_convenio" value
 * @method PersonaConcurso              getPersonaConcurso()       Returns the current record's "PersonaConcurso" value
 * @method Doctrine_Collection          getCompromisosDeConvenio() Returns the current record's "CompromisosDeConvenio" collection
 * @method ConvenioDesempenoPostulacion setId()                    Sets the current record's "id" value
 * @method ConvenioDesempenoPostulacion setPersonaConcursoId()     Sets the current record's "persona_concurso_id" value
 * @method ConvenioDesempenoPostulacion setFechaConvenio()         Sets the current record's "fecha_convenio" value
 * @method ConvenioDesempenoPostulacion setRutaConvenio()          Sets the current record's "ruta_convenio" value
 * @method ConvenioDesempenoPostulacion setPersonaConcurso()       Sets the current record's "PersonaConcurso" value
 * @method ConvenioDesempenoPostulacion setCompromisosDeConvenio() Sets the current record's "CompromisosDeConvenio" collection
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConvenioDesempenoPostulacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('convenio_desempeno_postulacion');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('persona_concurso_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('fecha_convenio', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('ruta_convenio', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('PersonaConcurso', array(
             'local' => 'persona_concurso_id',
             'foreign' => 'id'));

        $this->hasMany('CompromisoDeConvenio as CompromisosDeConvenio', array(
             'local' => 'id',
             'foreign' => 'convenio_desempeno_postulacion_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}