<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "El Rey de Mazatlán - Mezcal Artezanal";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
    ?>
    <!-- ESTILOS SLIDER -->
    <link rel="stylesheet" href="Public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Public/css/slide.css?ver=1.1.2">
</head>
<body>
    <!-- MENÚ PRINCIPAL -->
    <?php
        include_once "Public/includes/nav.php";
    ?>
    <!-- SLIDER PRINCIPAL -->
    <div class="home-slider owl-carousel js-fullheight">
        <!-- ITEM 01 -->
        <div class="slider-item js-fullheight slider-item01">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h3 class="tit_slider">Para todo mal, ¡Mezal! </h3>
                            <h3 class="tit_slider">Para todo bien, también </h3>
                        </div>
                        <div class="vector_oaxaca_slider">
                            <img class="img-fluid" src="Public/images/vector-orgullo-oaxaquenio.svg" alt="">
                        </div>
                        <div class="scroll_icon">
                            <img src="Public/images/scroll_icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ITEM 02 -->
        <div class="slider-item js-fullheight slider-item02">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h3 class="tit_slider">Quien mezcal no</h3>
                            <h3 class="tit_slider">ha bebido, no ha vivido.</h3>
                        </div>
                        <div class="vector_oaxaca_slider">
                            <img class="img-fluid" src="Public/images/vector-orgullo-oaxaquenio.svg" alt="">
                        </div>
                        <div class="scroll_icon">
                            <img src="Public/images/scroll_icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BANNER DE IMAGENES -->
    <section id="banner_images">
        <div class="back_pleca">
            <img src="Public/images/pleca_blanca_footer.svg" alt="">
        </div>
        <div class="row contain_banner">
            <div class="image_banner img_banner_lg">
                <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-1l-banner.jpg" alt="El Rey de Matatlán mezcal de 1 litro">
            </div>
            <div class="image_banner img_banner_sm">
                <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-joven-banner.jpg" alt="El Rey de Matatlán mezcal mezcal joven"> 
            </div>
            <div class="image_banner">
                <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-presentaciones-banner.jpg" alt="El Rey de Matatlán mezcal mezcal en diferentes presentaciones"> 
            </div>
            <div class="image_banner img_banner_sm">
                <img class="mask img-fluid" src="Public/images/El-rey-de-mezcal-matatlan-reserva-de-la-casa-banner.jpg" alt="El Rey de Matatlán mezcal mezcal reserva de la casa">
            </div>
            <div class="image_banner img_banner_lg">
                <img class="mask img-fluid" src="Public/images/El-rey-de-mezcal-matatlan-madrecuixe-banner.jpg" alt="El Rey de Matatlán mezcal mezcal madrecuixe">
            </div>
        </div>
    </section>
    <!-- DESCRIPCIÓN -->
    <section id="home_descrip">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <div class="img_pleca"></div>
                    <h4 class="tit_general">Los Mezcales que producimos son hechos de plantas silvestres que recolectamos en diferentes regiones de nuestro estado.</h4>
                </div>
            </div>
            <div class="row cont_slogan">
                <div class="col-md-2 offset-md-2">
                    <div class="cont_border_img">
                        <img src="Public/images/vector_rey_de_matatlan.svg" alt="Vector Rey de Matatlan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cont_border_txt">
                        <h5>El Rey de Matatlán elabora mezcales de sus propios plantíos; pero, hay agaves que  se consiguen buscando en las  montañas y zonas muy empedradas de difícil acceso.</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cont_btn">
                        <a class="btn_g btn_principal" href="nuestra-historia.html">Nuestra historia 
                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- NUESTRA SELECCIÒN -->
    <section id="home_seleccion">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="tit_general mb40">NUESTRA SELECCIÓN</h1>
                </div>
            </div>
            <div class="row fila_n_seleccion">
                <div class="cont_item_img">
                    <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-lo-mas-vendido-cover.jpg" alt="El rey de matatlan el mezcal más vendido">
                    <h2 class="subTit">LOS MÁS VENDIDOS</h2>
                    <div class="cont_btn">
                        <a class="btn_g btn_principal" href="#">Ver más 
                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="cont_item_img">
                    <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-artesanal-cover.jpg" alt="El rey de matatlan mezcal artesanal">
                    <h2 class="subTit">ARTESANAL</h2>
                    <div class="cont_btn">
                        <a class="btn_g btn_principal" href="#">Ver más 
                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="cont_item_img">
                    <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-ancestrales-cover.jpg" alt="El rey de matatlan mezcal ancestral">
                    <h2 class="subTit">ANCESTRALES</h2>
                    <div class="cont_btn">
                        <a class="btn_g btn_principal" href="#">Ver más 
                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="cont_item_img">
                    <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-cremas-cover.jpg" alt="El rey de matatlan mezcal y cremas">
                    <h2 class="subTit">CREMAS</h2>
                    <div class="cont_btn">
                        <a class="btn_g btn_principal" href="#">Ver más 
                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="cont_item_img">
                    <img class="mask img-fluid" src="Public/images/El-rey-de-matatlan-mezcal-derivados-cover.jpg" alt="El rey de matatlan derivados de mezcal">
                    <h2 class="subTit">DERIVADOS</h2>
                    <div class="cont_btn">
                        <a class="btn_g btn_principal" href="#">Ver más 
                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CERTIFICACIONES -->
    <section id="home_certi">
        <div class="row justify-content-center">
            <div class="cont_certi">
                <img class="img_certi" src="Public/images/El-rey-de-matatlan-certificado-con-mezcal-tobala.jpg" alt="El rey de matatlán mezcal certificado con mezcal tobala">
                <img class="img_certi" src="Public/images/El-rey-de-matatlan-certificado-con-mezcal-tepeztate.jpg" alt="El rey de matatlán mezcal certificado con mezcal tepeztate">
                <img class="img_certi" src="Public/images/El-rey-de-matatlan-certificado-consejo-mexicano-regulado.png" alt="El rey de matatlán mezcal certificado consejo mexicano regulado">
                <img class="img_certi" src="Public/images/El-rey-de-matatlan-certificado-iso-9001.png" alt="El rey de matatlán mezcal certificado ISO 9001 - 2008">
                <img class="img_certi" src="#" alt="">
            </div>
        </div>
    </section>
    <!-- NEWSLETTER -->
    <section id="home_newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="tit_general">NEWSLETTER</h1>
                    <p class="txt_general cont_txt_news">Forma parte de nuestra exclusiva comunidad y sé el primero en enterarte de ofertas especiales, nuevos productos y eventos.</p>
                    <form class="form_newsletter" id="newsletter" action="">
                        <input type="email" id="input_news" name="newsletter" placeholder="INGRESA TU MAIL" required>
                        <input type="submit" value="Suscribirse">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER INFO PAGO -->
    <section id="banner_pago">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cont_banner_info mask">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <img src="Public/images/icon_candado_pago.svg" alt="compra segura">
                                <p class="txt_general">Compra <br> 100% segura</p>
                            </div>
                            <div class="col-md-3">
                                <img src="Public/images/icon_tarjeta_pago.svg" alt="compra pago con tarjeta">
                                <p class="txt_general">Pagos con <br> Tarjetas o PayPal</p>
                            </div>
                            <div class="col-md-3">
                                <img src="Public/images/icon_deliver_pago.svg" alt="envios a todo México">
                                <p class="txt_general">Envíos a <br> todo México</p>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- SLIDE -->
    <script type="text/javascript" src="Public/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="Public/js/slider.js?ver=1.1.0"></script>

</body>
</html>