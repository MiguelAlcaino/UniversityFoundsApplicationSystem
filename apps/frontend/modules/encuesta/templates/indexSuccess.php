<h1>Encuestas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($encuestas as $encuesta): ?>
    <tr>
      <td><a href="<?php echo url_for('encuesta/show?id='.$encuesta->getId()) ?>"><?php echo $encuesta->getId() ?></a></td>
      <td><?php echo $encuesta->getNombre() ?></td>
      <td><?php echo $encuesta->getCreatedAt() ?></td>
      <td><?php echo $encuesta->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('encuesta/new') ?>">New</a>
