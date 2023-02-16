<?php
  switch ($bandera_seccion) {
    case 'informacion':
      @$clase_1='active';
      @$clase_2='';
      @$clase_3='';
    break;
    case 'envios':
      @$clase_1='active';
      @$clase_2='active';
      @$clase_3='';
    break;
    case 'pagos':
      @$clase_1='active';
      @$clase_2='active';
      @$clase_3='active';
    break;
  }
?>
<section id="info_step">
    <div class="container">
        <ul class="cont_pasos_cuenta">
            <li class="item_pasos <?php echo $clase_1; ?>">
                <span>1</span>
                <h6>Información</h6>
            </li>
            <li class="item_pasos <?php echo $clase_2; ?>">
                <span>2</span>
                <h6>Envíos</h6>
            </li>
            <li class="item_pasos <?php echo $clase_3; ?>">
                <span>3</span>
                <h6>Pagos</h6>
            </li>
        </ul>
    </div>
</section>
