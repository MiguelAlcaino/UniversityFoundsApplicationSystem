
<?php if(count($persona_concurso->getEvaluacionesConEstado(2)) == 0):?>
  Nadie ha evaluado aún
<?php else:?>
  <?php $suma_notas = 0?>
  <?php foreach($persona_concurso->getEvaluacionesConEstado(2) as $evaluacion):?>
    <?php if($evaluacion->getEstado() == 2): //Muestra solo postulaciones enviadas por los evaluadores?> 
      <?php echo $evaluacion->getPersonaSistema()?>, Nota: <?php echo $evaluacion->getNota()?><br />
      <?php $suma_notas = $suma_notas + $evaluacion->getNota()?>
    <?php endif?>
  <?php endforeach;?>
  Promedio: <?php echo $suma_notas/count($persona_concurso->getEvaluacionesEnviadas())?>
<?php endif;?>
