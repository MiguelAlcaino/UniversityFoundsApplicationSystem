<h1>Divulgacion de personas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Texto divulgacion</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($divulgacion_de_personas as $divulgacion_de_persona): ?>
    <tr>
      <td><a href="<?php echo url_for('divulgacion_de_persona/edit?id='.$divulgacion_de_persona->getId()) ?>"><?php echo $divulgacion_de_persona->getId() ?></a></td>
      <td><?php echo $divulgacion_de_persona->getPersonaId() ?></td>
      <td><?php echo $divulgacion_de_persona->getTextoDivulgacion() ?></td>
      <td><?php echo $divulgacion_de_persona->getCreatedAt() ?></td>
      <td><?php echo $divulgacion_de_persona->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('divulgacion_de_persona/new') ?>">New</a>
