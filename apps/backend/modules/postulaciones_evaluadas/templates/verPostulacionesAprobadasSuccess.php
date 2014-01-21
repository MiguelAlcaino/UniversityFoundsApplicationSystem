
<?php $contador = sfConfig::get('app_numero_siguiente_codigo_proyecto_anio_anterior')?>
<?php foreach($postulaciones as $postulacion):?>
  codigo: 307.<?php echo $contador?>/2013 <?php echo $postulacion->getPersona()->getUnidadAcademica()->getFacultad()?> <?php echo $postulacion->getPersona()->getUnidadAcademica()?> <?php echo $postulacion->getConcurso()?> <?php echo $postulacion->getPersona()?> <br />
  <?php if($contador == sfConfig::get('app_numero_final_codigo_proyecto')):?>
    <?php $contador = sfConfig::get('app_numero_inicio_codigo_proyecto')?>
  <?php else:?>
    <?php $contador++?>
  <?php endif;?>
  
<?php endforeach;?>
