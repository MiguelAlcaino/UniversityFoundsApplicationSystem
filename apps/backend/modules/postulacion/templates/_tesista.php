<div class="sf_admin_form_row sf_admin_text">
<label>Tesista (sólo Tesis Doctoral)</label>
<div class="content">
  <?php echo $form->getObject()->getTesista()?> <?php echo $form->getObject()->getTesista() ? link_to('[Editar]','tesista/edit?id='.$form->getObject()->getTesista()->getId()) : ''?>
</div>
</div>
