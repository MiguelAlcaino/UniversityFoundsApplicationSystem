<html>
<head></head>
<body>
<span>
<strong>Estimad@:</strong>
<br />
Se ha registrado un nuevo profesor no jerarquizado. Su datos son:<br />
<table>
	<tr>
		<th>Rut:</th>
		<td><?php echo $persona->getRut()?>-<?php echo $persona->getDv()?></td>
	</tr>
	<tr>
		<th>Nombre:</th>
		<td><?php echo $persona->getNombre()?> <?php echo $persona->getApellido1()?> <?php echo $persona->getApellido2()?></td>
	</tr>
	<tr>
		<th>Unidad acad&eacute;mica:</th>
		<td><?php echo $persona->getUnidadAcademica()?></td>
	</tr>
	<tr>
		<th>Telefono:</th>
		<td><?php echo $persona->getTelefono()?></td>
	</tr>
	<tr>
		<th>Email:</th>
		<td><?php echo $persona->getEmail()?></td>
	</tr>
</table>
<br />

Recuerde que debe asignarle una contrase&ntilde;a y activar su cuenta.

Saluda atte.
Sistema de postulaci&oacute;n proyectos DI 2012
</span>
</body>
</html>