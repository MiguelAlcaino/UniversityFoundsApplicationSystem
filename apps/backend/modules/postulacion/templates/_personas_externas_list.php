<div class="sf_admin_form_row sf_admin_text">
<label>Personas externas</label>
<div class="content">
<?php if(count($form->getObject()->getPersonasExternas()) == 0):?>
  La postulación no tiene personas externas asociadas. Puede ser porque no se han agregado aún o porque el proyecto no es un PIA.<br />
<?php endif;?>
<?php foreach($form->getObject()->getPersonasExternas() as $persona_externa):?>
  <?php echo $persona_externa?> <?php echo link_to('[Editar]','persona_externa/edit?id='.$persona_externa->getId())?><br />
<?php endforeach;?>
<br />
</div>
</div>
