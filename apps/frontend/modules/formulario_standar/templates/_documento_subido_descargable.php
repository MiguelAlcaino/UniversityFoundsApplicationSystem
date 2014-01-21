<?php if($form['archivos'][$indice]['ruta']->getValue()): ?>
	<?php echo link_to(image_tag('pdf.gif').' Documento PDF subido', public_path('uploads/pdfs/'.$form['archivos'][$indice]['ruta']->getValue()),'target = "_blank"')?>
	<br /><br />
<?php endif;?>
