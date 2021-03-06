<?php

/**
 * BaseParticipanteExterno
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $persona_externa_id
 * @property integer $persona_concurso_id
 * @property PersonaExterna $PersonaExterna
 * @property PersonaConcurso $PersonaConcurso
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method integer             getPersonaExternaId()    Returns the current record's "persona_externa_id" value
 * @method integer             getPersonaConcursoId()   Returns the current record's "persona_concurso_id" value
 * @method PersonaExterna      getPersonaExterna()      Returns the current record's "PersonaExterna" value
 * @method PersonaConcurso     getPersonaConcurso()     Returns the current record's "PersonaConcurso" value
 * @method ParticipanteExterno setId()                  Sets the current record's "id" value
 * @method ParticipanteExterno setPersonaExternaId()    Sets the current record's "persona_externa_id" value
 * @method ParticipanteExterno setPersonaConcursoId()   Sets the current record's "persona_concurso_id" value
 * @method ParticipanteExterno setPersonaExterna()      Sets the current record's "PersonaExterna" value
 * @method ParticipanteExterno setPersonaConcurso()     Sets the current record's "PersonaConcurso" value
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseParticipanteExterno extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('participante_externo');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('persona_externa_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('persona_concurso_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('PersonaExterna', array(
             'local' => 'persona_externa_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('PersonaConcurso', array(
             'local' => 'persona_concurso_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}