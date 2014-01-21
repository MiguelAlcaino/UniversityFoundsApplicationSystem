<h1>Participantes externos</h1>
<?php foreach($personas_externas as $persona):?>
<table class="bordeada">
  <tbody>
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
      <th>Universidad:</th>
      <td><?php echo $persona->getNombreUniversidad() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $persona->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $persona->getEmail() ?></td>
    </tr>
    <tr>
      <th>Jerarquia:</th>
      <td><?php echo $persona->getJerarquia() ?></td>
    </tr>
    <tr>
      <th>Compromiso contractual con la Universidad Externa:</th>
      <td><?php echo $persona->getCompromisoContractualConLaUniversidad() ?></td>
    </tr>
  </tbody>
</table>
<?php endforeach;?>
