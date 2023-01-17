
$(document).ready(function(){

    contadorInput();
    scrollHeader();
    animateProductScroll();
    menuActive();

});


/*=============== FUNCIÓN CONTADOR PRODUCTO ===============*/
function contadorInput(){
    
    $(document).on('click', '.qty-plus', function () {
        $(this).prev().val(+$(this).prev().val() + 1);

     });
     $(document).on('click', '.qty-minus', function () {
        if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
     });

}

/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader(){
    const header = document.getElementById('menu_dark');
    // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 10) header.classList.add('scroll-header'); else header.classList.remove('scroll-header');
}
window.addEventListener('scroll', scrollHeader)



/*=============== ANIMATE PRODUCT MENÚ ===============*/
function animateProductScroll(){
    $('.list-group a').on('click',function(event){
        var $anchor = $(this);

        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top -240
        }, 600);
        event.preventDefault();
    });
}

/*=============== MENÚ PRINCIPAL ===============*/
function menuActive(){
    const header = document.getElementById('menu_dark');

    // INICIO
    if ( document.URL.includes("index.php") ) {    
        $('.navbar-nav li, .menu_footer li').removeClass("active");
        $('.navbar-nav li:nth-child(1), .menu_footer li:nth-child(1)').addClass("active");
        /* CAMBIO DE COLOR HEADER */
        header.classList.add('color_white'); 
    }
    // NUESTRA HISTORIA
    if ( document.URL.includes("nuestra-historia.php") ) {    
        $('.navbar-nav li, .menu_footer li').removeClass("active");
        $('.navbar-nav li:nth-child(2), .menu_footer li:nth-child(2)').addClass("active");
        /* CAMBIO DE COLOR HEADER */
        header.classList.add('color_white'); 
    }  
    // PRODUCTOS
    if ( document.URL.includes("productos.php") ) {    
        $('.navbar-nav li, .menu_footer li').removeClass("active");
        $('.navbar-nav li:nth-child(4), .menu_footer li:nth-child(3)').addClass("active");
        /* CAMBIO DE COLOR HEADER */
        header.classList.add('color_white'); 
    } 
    
    // INFORMACIÓN DE TU CUENTA
    if ( document.URL.includes("informacion-cuenta.php") ) {    
        $('.cont_pasos_cuenta li').removeClass("active");
        $(".cont_pasos_cuenta li:nth-child(1)").addClass("active");
        console.log('Estoy en el menu de información de la cuenta');
    } 
    // INFORMACIÓN ENVIOS
    if ( document.URL.includes("envios.php") ) {    
        $('.cont_pasos_cuenta li').removeClass("active");
        $(".cont_pasos_cuenta li:nth-child(2)").addClass("active");
        console.log('Estoy en el menu de información de la cuenta');
    } 
    // INFORMACIÓN PAGOS
    if ( document.URL.includes("pagos.php") ) {    
        $('.cont_pasos_cuenta li').removeClass("active");
        $(".cont_pasos_cuenta li:nth-child(3)").addClass("active");
        console.log('Estoy en el menu de información de la cuenta');
    } 
    // INFORMACIÓN PAGOS
    if ( document.URL.includes("contacto.php") ) {    
        $('.navbar-nav li, .menu_footer li').removeClass("active");
        $('.navbar-nav li:nth-child(5), .menu_footer li:nth-child(4)').addClass("active");
        console.log('Estoy en el menu de contacto');
    } 
}


