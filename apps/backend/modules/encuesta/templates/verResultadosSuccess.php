<?php use_helper('I18N', 'Date') ?>
<?php include_partial('encuesta/assets') ?>
<div id="sf_admin_container">
<h1><?php echo $encuesta->getNombre() ?></h1>
  <div id="sf_admin_content">
    
    <div class="sf_admin_list">
    <table>
    <tbody>
    <?php foreach($encuesta->getPreguntas() as $pregunta):?>
      <tr>
        <th><?php echo $pregunta->getTextoPregunta()?></th>
        <td>
          <?php foreach($pregunta->getAlternativas() as $alternativa):?>
            <?php echo $alternativa->gettextoAlternativa()?> <?php echo count($alternativa->getRespuestas())?><br />
          <?php endforeach;?>
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
    </table>
    </div>
  </div>
</div>
    
