<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Contacto - El Rey de Matatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
    ?>
</head>
<body>
    <?php 
        include_once "Public/includes/nav.php";
    ?>
    <!-- TÍTULO PÁGINA -->
    <div class="space_top"></div>
    <section>
        <div class="line_up"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center cont_tit_page">
                    <h1 class="tit_general">Contáctanos</h1>
                </div>
            </div>
        </div>
        <div class="line_down"></div>
    </section>
    <!-- FORMULARIO DE CONTACTO -->
    <section id="form_ctc">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form id="formulario" class="form_general formulario" action="">
                        <label for="email">Información de contacto</label><br>
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Nombre completo"> 
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Nombre tiene que ser de 4 a 16 dígitos y solo puede contener letras.</p>
                        </div>
                        <!-- Grupo: Correo Electronico -->
                        <div class="formulario__grupo" id="grupo__correo">
                            <div class="formulario__grupo-input">
                                <input type="email" class="formulario__input" name="correo" id="correo" placeholder="Email">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                        </div>
                        <!-- Grupo: Teléfono -->
                        <div class="formulario__grupo" id="grupo__telefono">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Whatsapp">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 12 dígitos.</p>
                        </div>
                        <textarea name="msmContacto" placeholder="Mensaje"></textarea>
                        <br>
                        <br>
                        <!-- Grupo: Submit -->
                        <div class="formulario__mensaje" id="formulario__mensaje">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor llena el formulario correctamente. </p>
                        </div>
                        <div class="formulario__captcha" id="formulario__mensaje-captcha">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Captcha no verificado. </p>
                        </div>
                        <!-- GOOGLE RECAPTCHA -->
                        <!--<div class="g-recaptcha" data-sitekey="6LdadJQjAAAAAJdDgummFdUhiJJp6w-vCKMJxWt4"></div>-->
                        <input type="submit" value="Enviar">
                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        include_once "Public/includes/btnWhatsapp.php";
    ?>
    <script type="text/javascript" src="Public/js/form.js?ver=2.2.21"></script>
    <!-- FOOTER -->
    <?php
        include_once "Public/includes/footer.php";
    ?>
</body>
</html>