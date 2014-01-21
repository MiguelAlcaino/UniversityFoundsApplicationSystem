<h1>Tesistas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Doctorado acreditado</th>
      <th>Rut</th>
      <th>Dv</th>
      <th>Nombre</th>
      <th>Apellido1</th>
      <th>Apellido2</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tesistas as $tesista): ?>
    <tr>
      <td><a href="<?php echo url_for('tesista/edit?id='.$tesista->getId()) ?>"><?php echo $tesista->getId() ?></a></td>
      <td><?php echo $tesista->getDoctoradoAcreditadoId() ?></td>
      <td><?php echo $tesista->getRut() ?></td>
      <td><?php echo $tesista->getDv() ?></td>
      <td><?php echo $tesista->getNombre() ?></td>
      <td><?php echo $tesista->getApellido1() ?></td>
      <td><?php echo $tesista->getApellido2() ?></td>
      <td><?php echo $tesista->getTelefono() ?></td>
      <td><?php echo $tesista->getEmail() ?></td>
      <td><?php echo $tesista->getCreatedAt() ?></td>
      <td><?php echo $tesista->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tesista/new') ?>">New</a>
