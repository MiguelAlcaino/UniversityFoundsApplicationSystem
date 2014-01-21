<html>
<head></head>
<body>
<span>
<strong>Estimad@:</strong>
<br />
El investigador <strong><?php echo $postulacion->getPersona()->getNombre()?> <?php echo $postulacion->getPersona()->getApellido1()?> <?php echo $postulacion->getPersona()->getApellido2()?></strong>
ha enviado una postulaci&oacute;n correspondiente a un proyecto <strong><?php echo $postulacion->getConcurso() ?></strong>. <br/>
El documento pdf de la postulaci&oacute;n ha sido adjuntado en este correo.
<br />

Saluda atte.
Sistema de postulaci&oacute;n proyectos DI 2012
</span>
</body>
</html>