<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_evaluar">
      <?php if($evaluacion = $persona_concurso->getEvaluacionByPersonaSistemaId($sf_user->getAttribute('id_persona'))):?>
        <?php if($evaluacion->getEstado() == 2):?>
          Ya evaluaste esta postulación
        <?php else:?>
          <?php echo link_to(__('Continuar evaluando', array(), 'messages'), 'evaluacion/evaluar?id='.$persona_concurso->getId(), array()) ?>
        <?php endif;?>
      <?php else:?>
        <?php echo link_to(__('Evaluar', array(), 'messages'), 'evaluacion/evaluar?id='.$persona_concurso->getId(), array()) ?>
      <?php endif;?>
    </li>
  </ul>
</td>
