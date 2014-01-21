<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <?php include_slot('tooltip')?>
  </head>
  <body <?php include_slot('calcular_nota')?>>
    <?php //if($sf_user->getAttribute('rut') == 16759248):?>
    <ul>
      <li><?php echo link_to('Unidades Académicas','unidad_academica/index')?></li>
      <li><?php echo link_to('Facultad','facultad/index')?></li>
      <li><?php echo link_to('Evaluar','evaluacion/index')?></li>
      <li><?php echo link_to('Evaluar recursos','evaluacion_recursos/index')?></li>
      <li><?php echo link_to('Evaluación final','evaluacion_final/index')?></li>
      <li><?php echo link_to('Postulaciones','postulacion/index')?></li>
      <li><?php echo link_to('Postulaciones evaluadas','postulaciones_evaluadas/index')?></li>
      <li><?php echo link_to('Profesores','persona/index')?></li>
      <li><?php echo link_to('Personas Sistema','persona_sistema/index')?></li>
      <li><?php echo link_to('Concursos', 'concurso/index')?></li>
      <li><?php echo link_to('Porcentajes evaluacion Archivos Concurso', 'porcentaje_evaluacion_propuesta/index')?></li>
      <li><?php echo link_to('Porcentajes evaluacion Productividad Concurso', 'porcentaje_productividad_concurso/index')?></li>
      <li><?php echo link_to('Convocatorias', 'convocatoria/index')?></li>
      <li><?php echo link_to('Items', 'item/index')?></li>
      <li><?php echo link_to('ItemsConcurso', 'item_concurso/index')?></li>
      <li><?php echo link_to('Compromisos de Concurso', 'compromisos_de_concurso/index')?></li>
      <li><?php echo link_to('Cerrar Sesión', 'persona_sistema/logout')?></li>
    </ul>
    <?php echo $sf_content ?>
    <?php //endif;?>
  </body>
</html>
