<html>
<head></head>
<body>
<div>
Estimado investigador:<br /><br />
Ha solicitado la renovación de su contraseña. Para crear una nueva contraseña haga clic en el siguiente enlace:<br /><br /><br />
<?php echo link_to('http://'.$host.'/postulacion_interna/index.php/nuevaPassword/'.$persona->getId().'/'.$persona->getTokenRecuperarPassword(),'http://'.$host.'/postulacion_interna/index.php/nuevaPassword/'.$persona->getId().'/'.$persona->getTokenRecuperarPassword())?>
</div>
</body>
</html>
