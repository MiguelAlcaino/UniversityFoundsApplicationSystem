<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_evaluar">
      <?php if($evaluacion = $persona_concurso->getEvaluacionByPersonaSistemaId($sf_user->getAttribute('id_persona'))):?>
        <?php if($persona_concurso->getEstadoEvaluacion() == 2):?>
          <?php echo link_to(__('Continuar evaluando', array(), 'messages'), 'evaluacion_recursos/evaluar_recursos?id='.$persona_concurso->getId(), array()) ?>
        <?php else:?>
          Ya evaluaste esta postulación
        <?php endif;?>
      <?php else:?>
        <?php echo link_to(__('Evaluar recursos', array(), 'messages'), 'evaluacion_recursos/evaluar_recursos?id='.$persona_concurso->getId(), array()) ?>
      <?php endif?>
    </li>
  </ul>
</td>
