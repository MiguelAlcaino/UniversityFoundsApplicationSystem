<?php

/**
 * BaseParticipantePostulacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $persona_id
 * @property integer $persona_concurso_id
 * @property string $email
 * @property integer $tipo_participante
 * @property Persona $Persona
 * @property PersonaConcurso $PersonaConcurso
 * 
 * @method integer                 getId()                  Returns the current record's "id" value
 * @method integer                 getPersonaId()           Returns the current record's "persona_id" value
 * @method integer                 getPersonaConcursoId()   Returns the current record's "persona_concurso_id" value
 * @method string                  getEmail()               Returns the current record's "email" value
 * @method integer                 getTipoParticipante()    Returns the current record's "tipo_participante" value
 * @method Persona                 getPersona()             Returns the current record's "Persona" value
 * @method PersonaConcurso         getPersonaConcurso()     Returns the current record's "PersonaConcurso" value
 * @method ParticipantePostulacion setId()                  Sets the current record's "id" value
 * @method ParticipantePostulacion setPersonaId()           Sets the current record's "persona_id" value
 * @method ParticipantePostulacion setPersonaConcursoId()   Sets the current record's "persona_concurso_id" value
 * @method ParticipantePostulacion setEmail()               Sets the current record's "email" value
 * @method ParticipantePostulacion setTipoParticipante()    Sets the current record's "tipo_participante" value
 * @method ParticipantePostulacion setPersona()             Sets the current record's "Persona" value
 * @method ParticipantePostulacion setPersonaConcurso()     Sets the current record's "PersonaConcurso" value
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseParticipantePostulacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('participante_postulacion');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('persona_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('persona_concurso_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('tipo_participante', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Persona', array(
             'local' => 'persona_id',
             'foreign' => 'id'));

        $this->hasOne('PersonaConcurso', array(
             'local' => 'persona_concurso_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}