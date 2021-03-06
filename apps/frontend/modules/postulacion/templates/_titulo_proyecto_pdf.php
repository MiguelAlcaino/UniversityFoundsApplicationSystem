<h1>Formulario de postulaci&oacute;n concurso interno<br /><?php echo $postulacion->getConcurso()->getNombreConcurso()?></h1>
<div>
<h3>El formulario consta de las siguientes secciones:</h3>
<ol>
    <li>Identificaci&oacute;n</li>
    <li>Investigador(es)</li>
    <li>Formulaci&oacute;n</li>
    <li>Recursos</li>
    <li>Anexos</li>
</ol>
</div>
<div>
<h3>1. T&iacute;tulo del proyecto: <?php echo $postulacion->getTitulo() ? $postulacion->getTitulo() : 'XXXXX'?></h3>
<?php if($postulacion->getConcurso()->getAcronimo() == 'di_artes'):?>
  <h3>Categor&iacute;a del proyecto: 
  <?php switch($postulacion->getCategoriaArte()){
    case 'creacion_o_produccion_artistica':
      echo 'Creación o producción artística';
      break;
    case 'difusion_o_fomento_de_las_artes':
      echo 'Difusión o fomento de las artes';
      break;
    case 'investigacion_y_estudio_de_la_cultura_y_las_artes':
      echo 'Investigación y estudio de la cultura y las artes';
      break;
    case 'otra':
      echo 'Otra categor&iacute;a: '.$postulacion->getCategoriaArteOtra();
      break;
    default:
      echo 'XXXXX';
      break;
  }?>
  </h3>
  
<?php endif;?>
</div>
<div>
<h3>2. Investigadores</h3>
<table class="bordeada">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo profesor</th>
            <th>Unidad Acad&eacute;mica</th>
            <th>Participaci&oacute;n</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion):?>
        <tr>
            <td style="text-align: left;"><?php echo $participante_postulacion->getPersona()->getNombre()?> <?php echo $participante_postulacion->getPersona()->getApellido1()?> <?php echo $participante_postulacion->getPersona()->getApellido2()?></td>
            <td><?php echo $participante_postulacion->getPersona()->getTipoProfesor()?></td>
            <td><?php echo $participante_postulacion->getPersona()->getUnidadAcademica()?></td>
            <td style="text-align: left;">
            <?php switch($participante_postulacion->getTipoParticipante()){
                case 1:
                    echo 'Director';
                    break;
                case 2:
                    echo 'Director Alterno';
                    break;
                case 3:
                    echo 'Co-investigador';
                    break;
            }?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</div>
