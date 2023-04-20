<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Productos - El Rey de Matatlán";
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
    <!-- ENCABEZADO -->
    <section id="encabezado_productos" class="encabezado">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="tit_secundario_bn">Amor sincero, <br> el de un mezcalero.</h1>
                    <img src="Public/images/vector-orgullo-oaxaquenio.svg" alt="">
                </div>
            </div>
        </div>
        <img class="pleca_bn img-fluid" src="Public/images/pleca_blanca_footer.svg" alt="">
    </section>
    <!-- PRODUCTOS -->
    <section id="productos_filter">
        <div class="container">
            <div class="row cont_buscador">
                <div class="col-md-12 ">
                    <div id="buscadorProducto" class="buscador">
                        <form id="search_products" class="form_search" action="">
                            <input id="input_search" class="" type="search" placeholder="BUSCAR PRODUCTO" aria-label="Search">
                            <button class="btn_search" type="submit"><img src="Public/images/icon_search.svg" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 cont_iqz">
                    <!-- MENÚ IZQUIERDO -->
                    <div id="menu_izq" class="cont_menu_izq">
                        <h1 class="tit_general tit_menu_izq">NUESTRA SELECCIÓN</h1>
                        <div id="list-example" class="list-group">
                            <a class="list-group-item list-group-item-action" href="#list-item-1">Más vendido</a>
                          <?php
                            $datosc=mysqli_query($conexion, "select * from vin_categorias where id_categoria!=2 order by categoria asc ");
                              if(mysqli_num_rows($datosc)>0){
                                while ($datos2c=mysqli_fetch_array($datosc)){
                                  echo '<a class="list-group-item list-group-item-action" href="#list-item-'.$datos2c['id_categoria'].'">'.$datos2c['categoria'].'</a>';
                                }
                              }
                          ?>

                            <!--<a class="list-group-item list-group-item-action" href="#list-item-2">Artesanal</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-3">Ancestral</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-4">Cremas</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-5">Derivados</a>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 cont_productos_der">
                    <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">

                        <!-- MÁS VENDIDOS -->
                        <article id="list-item-1" class="cont_list_product">
                            <h4 >LOS MÁS VENDIDOS</h4>
                            <div class="row">
                                <!-- PRODUCTOS INDIV -->
                                <?php
                                $datose=mysqli_query($conexion, "select * from vin_vinos where visible='si' and especial='si' LIMIT 0,4 ");
                                  if(mysqli_num_rows($datose)>0){
                                    while ($datos2e=mysqli_fetch_array($datose)){
                                      echo '<div class="col-xl-3 col-lg-6 col-md-6 col-6">';
                                        echo '<div class="cont_p_indv">';
                                          echo '<img class="mask img-fluid" src="Public/images/'.$datos2e['imagen'].'" alt="">';
                                          echo '<h6 class="nom_producto">'.$datos2e['nombre_vino'].'</h6>';
                                          echo '<ul class="lista_ml_producto">';
                                          $datos=mysqli_query($conexion, "select * from vin_detalle_tamano where id_vino=".$datos2e['id_vino']." order by id_tamano asc");
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
                                            echo '<a class="btn_g btn_principal" href="detalle.php?vino='.$datos2e['id_vino'].'">Ver más';
                                            echo '<img src="Public/images/vector_flecha_btn.svg" alt="">';
                                            echo '</a>';
                                          echo '</div>';
                                        echo '</div>';
                                      echo '</div>';
                                    }
                                  }
                                ?>



                            </div>
                        </article>
                        <!-- ARTESANAL -->
                        <?php
                            $datost=mysqli_query($conexion, "select * from vin_categorias order by categoria asc");
                              if(mysqli_num_rows($datost)>0){
                                while ($datos2t=mysqli_fetch_array($datost)){
                                  echo '<article id="list-item-'.$datos2t['id_categoria'].'" class="cont_list_product">';
                                    echo '<h4 >'.$datos2t['categoria'].'</h4>';
                                      echo '<div class="row">';


                                          // LISTADO PRODUCTOS
                                          $datosl=mysqli_query($conexion, "select * from vin_vinos where tipo=".$datos2t['id_categoria']." ");
                                            if(mysqli_num_rows($datosl)>0){
                                              while ($datos2l=mysqli_fetch_array($datosl)){
                                              echo '<div class="col-xl-3 col-lg-6 col-md-6 col-6">';
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
                                        }}
                                        // FIN DEL BLOQUE



                                      echo '</div>
                                  </article>';
                                }
                              }
                        ?>




                        <!-- CREMAS -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include_once "Public/includes/btnWhatsapp.php";
    ?>
    <?php
        include_once "Public/includes/footer.php";
    ?>
    <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script type="text/javascript" src="Public/js/menuScroll.js"></script>
</body>
</html>
