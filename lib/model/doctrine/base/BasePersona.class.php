<?php

/**
 * BasePersona
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $tipo_profesor_id
 * @property integer $unidad_academica_id
 * @property integer $rut
 * @property string $dv
 * @property string $nombre
 * @property string $apellido1
 * @property string $apellido2
 * @property string $sexo
 * @property string $telefono
 * @property string $email
 * @property string $password
 * @property string $token_recuperar_password
 * @property integer $estado_login
 * @property TipoProfesor $TipoProfesor
 * @property UnidadAcademica $UnidadAcademica
 * @property Doctrine_Collection $PersonaConcursos
 * @property Doctrine_Collection $SesionesEncuesta
 * @property Doctrine_Collection $AchivosDePersona
 * @property Doctrine_Collection $Proyectos
 * @property Doctrine_Collection $Divulgaciones
 * @property Doctrine_Collection $Obras
 * @property Doctrine_Collection $Publicaciones
 * @property Doctrine_Collection $Libros
 * @property Doctrine_Collection $CapitulosDeLibros
 * @property Doctrine_Collection $ParticipantesPostulacion
 * 
 * @method integer             getId()                       Returns the current record's "id" value
 * @method integer             getTipoProfesorId()           Returns the current record's "tipo_profesor_id" value
 * @method integer             getUnidadAcademicaId()        Returns the current record's "unidad_academica_id" value
 * @method integer             getRut()                      Returns the current record's "rut" value
 * @method string              getDv()                       Returns the current record's "dv" value
 * @method string              getNombre()                   Returns the current record's "nombre" value
 * @method string              getApellido1()                Returns the current record's "apellido1" value
 * @method string              getApellido2()                Returns the current record's "apellido2" value
 * @method string              getSexo()                     Returns the current record's "sexo" value
 * @method string              getTelefono()                 Returns the current record's "telefono" value
 * @method string              getEmail()                    Returns the current record's "email" value
 * @method string              getPassword()                 Returns the current record's "password" value
 * @method string              getTokenRecuperarPassword()   Returns the current record's "token_recuperar_password" value
 * @method integer             getEstadoLogin()              Returns the current record's "estado_login" value
 * @method TipoProfesor        getTipoProfesor()             Returns the current record's "TipoProfesor" value
 * @method UnidadAcademica     getUnidadAcademica()          Returns the current record's "UnidadAcademica" value
 * @method Doctrine_Collection getPersonaConcursos()         Returns the current record's "PersonaConcursos" collection
 * @method Doctrine_Collection getSesionesEncuesta()         Returns the current record's "SesionesEncuesta" collection
 * @method Doctrine_Collection getAchivosDePersona()         Returns the current record's "AchivosDePersona" collection
 * @method Doctrine_Collection getProyectos()                Returns the current record's "Proyectos" collection
 * @method Doctrine_Collection getDivulgaciones()            Returns the current record's "Divulgaciones" collection
 * @method Doctrine_Collection getObras()                    Returns the current record's "Obras" collection
 * @method Doctrine_Collection getPublicaciones()            Returns the current record's "Publicaciones" collection
 * @method Doctrine_Collection getLibros()                   Returns the current record's "Libros" collection
 * @method Doctrine_Collection getCapitulosDeLibros()        Returns the current record's "CapitulosDeLibros" collection
 * @method Doctrine_Collection getParticipantesPostulacion() Returns the current record's "ParticipantesPostulacion" collection
 * @method Persona             setId()                       Sets the current record's "id" value
 * @method Persona             setTipoProfesorId()           Sets the current record's "tipo_profesor_id" value
 * @method Persona             setUnidadAcademicaId()        Sets the current record's "unidad_academica_id" value
 * @method Persona             setRut()                      Sets the current record's "rut" value
 * @method Persona             setDv()                       Sets the current record's "dv" value
 * @method Persona             setNombre()                   Sets the current record's "nombre" value
 * @method Persona             setApellido1()                Sets the current record's "apellido1" value
 * @method Persona             setApellido2()                Sets the current record's "apellido2" value
 * @method Persona             setSexo()                     Sets the current record's "sexo" value
 * @method Persona             setTelefono()                 Sets the current record's "telefono" value
 * @method Persona             setEmail()                    Sets the current record's "email" value
 * @method Persona             setPassword()                 Sets the current record's "password" value
 * @method Persona             setTokenRecuperarPassword()   Sets the current record's "token_recuperar_password" value
 * @method Persona             setEstadoLogin()              Sets the current record's "estado_login" value
 * @method Persona             setTipoProfesor()             Sets the current record's "TipoProfesor" value
 * @method Persona             setUnidadAcademica()          Sets the current record's "UnidadAcademica" value
 * @method Persona             setPersonaConcursos()         Sets the current record's "PersonaConcursos" collection
 * @method Persona             setSesionesEncuesta()         Sets the current record's "SesionesEncuesta" collection
 * @method Persona             setAchivosDePersona()         Sets the current record's "AchivosDePersona" collection
 * @method Persona             setProyectos()                Sets the current record's "Proyectos" collection
 * @method Persona             setDivulgaciones()            Sets the current record's "Divulgaciones" collection
 * @method Persona             setObras()                    Sets the current record's "Obras" collection
 * @method Persona             setPublicaciones()            Sets the current record's "Publicaciones" collection
 * @method Persona             setLibros()                   Sets the current record's "Libros" collection
 * @method Persona             setCapitulosDeLibros()        Sets the current record's "CapitulosDeLibros" collection
 * @method Persona             setParticipantesPostulacion() Sets the current record's "ParticipantesPostulacion" collection
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Miguel Alcaino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePersona extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('persona');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('tipo_profesor_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('unidad_academica_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('rut', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('dv', 'string', 1, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('nombre', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('apellido1', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('apellido2', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('sexo', 'string', 1, array(
             'type' => 'string',
             'notnull' => false,
             'default' => 'M',
             'length' => 1,
             ));
        $this->hasColumn('telefono', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('token_recuperar_password', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('estado_login', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'notnull' => true,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TipoProfesor', array(
             'local' => 'tipo_profesor_id',
             'foreign' => 'id'));

        $this->hasOne('UnidadAcademica', array(
             'local' => 'unidad_academica_id',
             'foreign' => 'id'));

        $this->hasMany('PersonaConcurso as PersonaConcursos', array(
             'refClass' => 'ParticipantePostulacion',
             'local' => 'persona_id',
             'foreign' => 'persona_concurso_id'));

        $this->hasMany('SesionEncuesta as SesionesEncuesta', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('ArchivoDePersona as AchivosDePersona', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('ProyectoDePersona as Proyectos', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('DivulgacionDePersona as Divulgaciones', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('ObraDePersona as Obras', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('PublicacionDePersona as Publicaciones', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('LibroDePersona as Libros', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('CapituloLibroDePersona as CapitulosDeLibros', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $this->hasMany('ParticipantePostulacion as ParticipantesPostulacion', array(
             'local' => 'id',
             'foreign' => 'persona_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}