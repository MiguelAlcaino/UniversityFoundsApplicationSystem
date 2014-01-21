<?php

/**
 * Persona form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonaForm extends BasePersonaForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at'], $this['unidad_academica_id'], $this['tipo_profesor_id'], $this['nombre'], $this['apellido1'], $this['apellido2'], $this['rut'], $this['dv'], $this['persona_concursos_list'], $this['estado_login']);
  }
}
