<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Joven Espadín - El Rey de Mazatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php"; 
        include_once "Public/includes/conectar.php";
    ?>
</head>
<body>
    <?php
        include_once "Public/includes/nav.php";
    ?>
    <div class="space_top"></div>
    <!-- BREADCRUMB -->
    <section>
        <div class="line_up"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="icon_homepage" href="index.php">
                                <img src="Public/images/icon_homepage.svg" alt="">
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="productos.php">Productos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Más vendidos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="line_down"></div>
    </section>
    <!-- PRODUCTO INDIVIDUAL -->
    <?php
        @$vino=$_GET['vino'];
        $sql = "select * from vin_vinos where id_vino=$vino ";
        $result = mysqli_query($conexion, $sql);
        @$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        @$nombre_vino=$row['nombre_vino'];
        @$imagen=$row['imagen'];
        @$informacion=$row['sabor'];

    ?>
    <section id="producto_detalle">
        <div class="container">
            <div class="row row_product">
                <!-- FOTO DEL PRODUCTO -->
                <div class="col-xl-6 col-lg-6 col-md-12 text-center">
                    <img class="mask img-fluid" src="Public/images/<?php echo $imagen; ?>" alt="Producto joven espadín">
                </div>
                <!-- DETALLE DEL PRODUCTO -->
                <div class="col-xl-6 col-lg-6 col-md-12 cont_detalle_product d-flex align-items-center">
                    <!-- NOMBRE DEL PRODUCTO -->




                    <form method="post" action="carrito.php">
                        <input type="hidden" name="vino" value="<?php echo $vino; ?>">
                        <div class="cont">
                            <h4 class="tit_product"><?php echo $nombre_vino; ?></h4>
                            <!-- DESCRIPCIÓN DEL PRODUCTO -->
                            <p class="descp_product">El mezcal joven es un bi-destilado, incoloro, con un aroma ahumado típico en un mezcal artesanal donde se utiliza un horno de piedra par cocinar los agaves, tiene notas que a el exhalar predomina un aroma petricor. <br><br>
                                Este mezcal es producido en nuestros cultivos de agave espadín (Angustin folia how), con una graduación de 38-40% Alc. Vol. (dependiendo del cliente).</p>
                            <!-- FILA DESCRIPTIVO -->
                            <div class="row cont_contenido">
                                <!-- CONTENIDO NETO -->
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
                                    <h6 class="tit_detalle_descrip">Contenido neto / precio</h6>
                                    <select name="tamano" id="contenido_value" required>
                                      <?php
                                          $datos=mysqli_query($conexion, "select * from vin_detalle_tamano where id_vino=$vino order by id_tamano desc");
                                            if(mysqli_num_rows($datos)>0){
                                              while ($datos2=mysqli_fetch_array($datos)){
                                                // TAMAÑO
                                                $sql = "select * from vin_tamanos where id_tamano=".$datos2['id_tamano']." ";
                                                $result = mysqli_query($conexion, $sql);
                                                @$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                @$tamano=$row['tamano'];

                                                echo '<option value="'.$datos2['id_tamano'].'">'.$tamano.' - $'.number_format($datos2['precio'],2).' MN</option>';
                                              }
                                            }
                                      ?>
                                    </select>
                                </div>
                                <!-- CANTIDAD -->
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                    <h6 class="tit_detalle_descrip">Cantidad</h6>
                                    <div class="cont_cout">
                                        <input type="button" value="-" class="qty-minus">
                                        <input name="cantidad" id="cantidad_p" type="number" value="0" class="qty" min="1" required>
                                        <input type="button" value="+" class="qty-plus">
                                    </div>
                                </div>
                            </div>
                            <!-- FILA BOTONES -->
                            <div class="row cont_btn_detalle">
                                <div class="col-md-6">
                                    <div class="cont_btn">
                                        <a class="btn_g btn_secundario" href="productos.php">Seguir comprando</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cont_btn">
                                        <!--<a class="btn_g btn_principal" href="carrito.php">Agregar al carrito
                                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                                        </a>-->
                                        <input type="submit" value="Agregar al carrito" class="btn_g btn_principal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>






                </div>
            </div>
        </div>
    </section>

    <div class="pleca_dividir_relacionados"></div>

    <!-- PRODUCTOS RELACIONADOS -->
    <section id="productos_relacionados">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-12">
                    <h4 class="tit_general">Productos que te pueden gustar</h4>
                </div>
                <!-- PRODUCTO RELACIONADO 01 -->
                <?php
                    $datosl=mysqli_query($conexion, "select * from vin_vinos where id_vino!=$vino order by RAND() LIMIT 0,4");
                      if(mysqli_num_rows($datosl)>0){
                        while ($datos2l=mysqli_fetch_array($datosl)){
                          echo '<div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6">';
                            echo '<div class="cont_p_indv">';
                              echo '<img class="mask img-fluid" src="Public/images/'.$datos2l['imagen'].'" alt="">';
                              echo '<h6 class="nom_producto">'.$datos2l['nombre_vino'].'</h6>';
                              echo '<ul class="lista_ml_producto">';
                                $datos=mysqli_query($conexion, "select * from vin_detalle_tamano where id_vino=".$datos2l['id_vino']." order by id_tamano asc");
                                  if(mysqli_num_rows($datos)>0){
                                    while ($datos2=mysqli_fetch_array($datos)){
                                      // TAMAÑO
                                      $sql = "select * from vin_tamanos where id_tamano=".$datos2['id_tamano']." ";
                                      $result = mysqli_query($conexion, $sql);
                                      @$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                      @$tamano=$row['tamano'];
                                      echo '<li class="item_ml_producto">'.$tamano.'</li>';
                                    }
                                  }

                              echo '</ul>';
                              echo '<div class="cont_btn">';
                                echo '<a class="btn_g btn_principal" href="detalle.php?vino='.$datos2l['id_vino'].'">Ver más';
                                  echo '<img src="Public/images/vector_flecha_btn.svg" alt="">';
                                echo '</a>';
                              echo '</div>';
                            echo '</div>';
                          echo '</div>';
                        }
                      }
                ?>



            </div>
        </div>
    </section>
    <?php
        include_once "Public/includes/btnWhatsapp.php";
    ?>
    <!-- FOOTER -->
    <?php
        include_once "Public/includes/footer.php";
    ?>
</body>
</html>
