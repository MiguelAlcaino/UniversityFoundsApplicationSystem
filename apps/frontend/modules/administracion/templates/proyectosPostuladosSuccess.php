<table class="tabla_de_postulaciones">
    <thead>
        <tr>
            <th>ID</th>
            <th>Director</th>
            <th>Unidad Academica</th>
            <th>Proyecto</th>
            <th>Titulo</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($postulaciones as $postulacion):?>
        <tr>
            <td><?php echo $postulacion->getId()?></td>
            <td><?php echo $postulacion->getPersona()?></td>
            <td><?php echo $postulacion->getPersona()->getUnidadAcademica()?></td>
            <td><?php echo $postulacion->getConcurso()?></td>
            <td><?php echo $postulacion->getTitulo()?></td>
            <td><?php echo link_to('PDF', public_path('uploads/postulaciones_pdf/'.$postulacion->getRutaPdfPostulacion()) )?></td>
        </tr>
    <?php endforeach;?>
    </tbody>

</table>