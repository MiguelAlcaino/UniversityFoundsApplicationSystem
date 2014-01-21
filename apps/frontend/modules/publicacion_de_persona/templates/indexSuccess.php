<h1>Publicacion de personas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Tipo publicacion</th>
      <th>Nombre revista</th>
      <th>Titulo publicacion</th>
      <th>Volumen</th>
      <th>Numero</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($publicacion_de_personas as $publicacion_de_persona): ?>
    <tr>
      <td><a href="<?php echo url_for('publicacion_de_persona/edit?id='.$publicacion_de_persona->getId()) ?>"><?php echo $publicacion_de_persona->getId() ?></a></td>
      <td><?php echo $publicacion_de_persona->getPersonaId() ?></td>
      <td><?php echo $publicacion_de_persona->getTipoPublicacion() ?></td>
      <td><?php echo $publicacion_de_persona->getNombreRevista() ?></td>
      <td><?php echo $publicacion_de_persona->getTituloPublicacion() ?></td>
      <td><?php echo $publicacion_de_persona->getVolumen() ?></td>
      <td><?php echo $publicacion_de_persona->getNumero() ?></td>
      <td><?php echo $publicacion_de_persona->getCreatedAt() ?></td>
      <td><?php echo $publicacion_de_persona->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('publicacion_de_persona/new') ?>">New</a>
