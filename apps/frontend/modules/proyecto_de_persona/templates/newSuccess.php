<h1>Agregar <?php switch($form['tipo_proyecto']->getValue()){
            case 1:?>
              Proyecto FONDECYT
              <?php break; ?>
            <?php case 2:?>
              Otro proyecto externo
              <?php break;?>
            <?php case 3:?>
              Proyecto interno
              <?php break;?>
          <?php } ?></h1>

<?php if(isset($postulacion)):?>
		<?php include_partial('form', array('form' => $form, 'postulacion' => $postulacion)) ?>
	<?php else:?>
		<?php include_partial('form', array('form' => $form)) ?>
	<?php endif;?>
