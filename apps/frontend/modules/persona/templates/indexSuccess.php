<h1>Personas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tipo profesor</th>
      <th>Unidad academica</th>
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
    <?php foreach ($personas as $persona): ?>
    <tr>
      <td><a href="<?php echo url_for('persona/show?id='.$persona->getId()) ?>"><?php echo $persona->getId() ?></a></td>
      <td><?php echo $persona->getTipoProfesorId() ?></td>
      <td><?php echo $persona->getUnidadAcademicaId() ?></td>
      <td><?php echo $persona->getRut() ?></td>
      <td><?php echo $persona->getDv() ?></td>
      <td><?php echo $persona->getNombre() ?></td>
      <td><?php echo $persona->getApellido1() ?></td>
      <td><?php echo $persona->getApellido2() ?></td>
      <td><?php echo $persona->getTelefono() ?></td>
      <td><?php echo $persona->getEmail() ?></td>
      <td><?php echo $persona->getCreatedAt() ?></td>
      <td><?php echo $persona->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('persona/new') ?>">New</a>
