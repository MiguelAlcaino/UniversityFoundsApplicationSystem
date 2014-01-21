<h1>Curriculum</h1>

	<?php if(isset($postulacion)):?>
		<?php include_partial('form', array('form' => $form, 'postulacion' => $postulacion)) ?>
	<?php else:?>
		<?php include_partial('form', array('form' => $form)) ?>
	<?php endif;?>