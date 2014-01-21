<?php

/**
 * Recurso form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RecursoForm extends BaseRecursoForm
{
  public function configure()
  {
  	unset($this['persona_concurso_id'], $this['item_concurso_id'], $this['updated_at'], $this['created_at']);
  }
}
