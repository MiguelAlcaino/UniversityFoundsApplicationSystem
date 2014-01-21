<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="header">
    	<?php echo image_tag('logo_pucv_vriea',array('class'=>'logo_pucv'))?>
    	<span id="titulo">Postulaci&oacute;n Concurso Interno DI 2013</span>
    </div>
    <div id="contenido">
        <?php if($sf_user->isAuthenticated()):?>
            <ul id="menu">
                <li><?php echo link_to('Panel de postulaci&oacute;n','persona/seleccionConcurso')?></li>
                <li><?php echo link_to('Editar Curriculum','persona/edit?id='.$sf_user->getAttribute('id_persona'))?></li>
                <li><?php echo link_to('Cerrar sesi&oacute;n','persona/logout')?></li>
            </ul>
            <br />
        <?php endif;?>
        <!--<div class="flash_notice"> Estimado Investigador las postulaciones se cerrar&aacute;n automaticamente a las 23:59:59 del d&iacute;a Martes 6 de Marzo del 2012.<br />
        Las postulaciones inconclusas no ser&aacute;n enviadas.</div>-->
        <?php echo $sf_content ?>   
    </div>
    <div id="footer">
    	<div >
    	Contacto: dii.informacion@ucv.cl<br />
    	Soporte: dii.informacion@ucv.cl, dii.soporte@ucv.cl<br />
    	Anexo: 3187 (+56 -32 -2273187)
    	</div>
    </div>
  </body>
</html>
