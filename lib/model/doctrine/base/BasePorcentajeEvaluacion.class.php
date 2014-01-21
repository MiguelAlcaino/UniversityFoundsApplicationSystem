<?php

/**
 * BasePorcentajeEvaluacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $concurso_tipo_archivo_id
 * @property integer $numero
 * @property integer $porcentaje_evaluacion
 * @property string $nombre_nota
 * @property ConcursoTipoArchivo $ConcursoTipoArchivo
 * @property Doctrine_Collection $NotasFormulacion
 * 
 * @method integer              getId()                       Returns the current record's "id" value
 * @method integer              getConcursoTipoArchivoId()    Returns the current record's "concurso_tipo_archivo_id" value
 * @method integer              getNumero()                   Returns the current record's "numero" value
 * @method integer              getPorcentajeEvaluacion()     Returns the current record's "porcentaje_evaluacion" value
 * @method string               getNombreNota()               Returns the current record's "nombre_nota" value
 * @method ConcursoTipoArchivo  getConcursoTipoArchivo()      Returns the current record's "ConcursoTipoArchivo" value
 * @method Doctrine_Collection  getNotasFormulacion()         Returns the current record's "NotasFormulacion" collection
 * @method PorcentajeEvaluacion setId()                       Sets the current record's "id" value
 * @method PorcentajeEvaluacion setConcursoTipoArchivoId()    Sets the current record's "concurso_tipo_archivo_id" value
 * @method PorcentajeEvaluacion setNumero()                   Sets the current record's "numero" value
 * @method PorcentajeEvaluacion setPorcentajeEvaluacion()     Sets the current record's "porcentaje_evaluacion" value
 * @method PorcentajeEvaluacion setNombreNota()               Sets the current record's "nombre_nota" value
 * @method PorcentajeEvaluacion setConcursoTipoArchivo()      Sets the current record's "ConcursoTipoArchivo" value
 * @method PorcentajeEvaluacion setNotasFormulacion()         Sets the current record's "NotasFormulacion" collection
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePorcentajeEvaluacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('porcentaje_evaluacion');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('concurso_tipo_archivo_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('numero', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('porcentaje_evaluacion', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             'default' => 0,
             ));
        $this->hasColumn('nombre_nota', 'string', 40, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 40,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ConcursoTipoArchivo', array(
             'local' => 'concurso_tipo_archivo_id',
             'foreign' => 'id'));

        $this->hasMany('NotaFormulacion as NotasFormulacion', array(
             'local' => 'id',
             'foreign' => 'porcentaje_evaluacion_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}