<?php

/**
 * PorcentajeProductividadConcurso form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PorcentajeProductividadConcursoForm extends BasePorcentajeProductividadConcursoForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    //1: proyectos externos, 2: proyectos internos, 3: p. isi, 4: p. scielo, 5: p. otra, 6: divulgación, 7: libros, 8:obras
    $this->widgetSchema['tipo_productividad'] =  new sfWidgetFormChoice(array(
      'choices' => array(
        'proyectos_externos' => 'Proyectos Externos',
        'proyectos_internos' => 'Proyectos Internos',
        'publicaciones_isi' => 'Publicaciones ISI',
        'publicaciones_sciELO' => 'Publicaciones SciELO',
        'publicaciones_no_ISI_ni_SciELO' => 'Publicaciones no ISI ni SciELO',
        'divulgacion' => 'Divulgación',
        'libros' => 'Libros',
        'obras' => 'Obras',
        'calificaciones_del_estudiante_de_doctorado' => 'Calificaciones del Estudiante de Doctorado',
        'publicaciones_indexadas' => 'Publicaciones Indexadas',
        'publicaciones_no_indexadas' => 'Publicaciones no Indexadas'
      ),
    ));
  }
}
