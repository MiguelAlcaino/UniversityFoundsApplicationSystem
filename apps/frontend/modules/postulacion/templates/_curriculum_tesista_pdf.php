<h1>Curriculum Tesista</h1>

<table class="bordeada">
  <tbody>
  	<tr>
      <th>Programa doctorado: </th>
      <td><?php echo $persona->getDoctoradoAcreditado() ?></td>
    </tr>
    <tr>
      <th>Rut:</th>
      <td><?php echo $persona->getRut() ?>-<?php echo $persona->getDv() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $persona->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido Paterno:</th>
      <td><?php echo $persona->getApellido1() ?></td>
    </tr>
    <tr>
      <th>Apellido Materno:</th>
      <td><?php echo $persona->getApellido2() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $persona->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $persona->getEmail() ?></td>
    </tr>
  </tbody>
</table>
