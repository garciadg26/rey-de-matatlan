
$(document).ready(function(){
    contadorInput();
    console.log("Hola mundo");
    scrollHeader();
    showMenu()
});


/*=============== FUNCIÓN CONTADOR PRODUCTO ===============*/
function contadorInput(){
    var unit = 0;
    var total;
    // if user changes value in field
    $('.field').change(function() {
      unit = this.value;
    });
    $('.add').click(function() {
      unit++;
      var $input = $(this).prevUntil('.sub');
      $input.val(unit);
      unit = unit;
    });
    $('.sub').click(function() {
      if (unit > 0) {
        unit--;
        var $input = $(this).nextUntil('.add');
        $input.val(unit);
      }
    });
}

/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader(){
  const header = document.getElementById('menu_dark')
  // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
  if(this.scrollY >= 10) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)


function showMenu(){
/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/*===== MENU SHOW =====*/
/* Validate if constant exists */
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

}