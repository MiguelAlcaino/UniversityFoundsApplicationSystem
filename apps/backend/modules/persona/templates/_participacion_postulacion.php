<?php foreach($persona->getParticipantesPostulacion() as $participante_postulacion):?>
  <?php echo $participante_postulacion->getPersonaConcurso()?> - <?php switch($participante_postulacion->getTipoParticipante()){
    case 1:
      echo 'Director';
      break;
    case 2:
      echo 'Director Alterno';
      break;
    case 3:
      echo 'Co-Investigador';
      break;
  }?> <?php echo link_to('[Editar]', 'postulacion/edit?id='.$participante_postulacion->getPersonaConcurso()->getId())?><br />
<?php endforeach?>
