$(document).ready(function(){
    /*=============== FIXED MENÚ IZQUIERDO ===============*/
    function scrollMenu(){
        const menu_izq = document.getElementById('menu_izq')
        // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
        if(this.scrollY >= 400) menu_izq.classList.add('scroll-menu'); else menu_izq.classList.remove('scroll-menu')
    }
    window.addEventListener('scroll', scrollMenu)


    /*=============== SCROLL PRODUCT ACTIVE LINK ===============*/
    const articles = document.querySelectorAll('article[id]')

    function scrollActive(){
        const scrollY = window.pageYOffset;

        articles.forEach(current =>{
            const articleHeight = current.offsetHeight;
            const articleTop = current.offsetTop + 270;
            articleId = current.getAttribute('id');
            
            //animateTopScroll(articleId);

            if(scrollY > articleTop && (scrollY) <= articleTop + articleHeight){
                document.querySelector('.list-group a[href*=' + articleId + ']').classList.add('active-link')
            }else{
                document.querySelector('.list-group a[href*=' + articleId + ']').classList.remove('active-link')
            }
        })
    }
    window.addEventListener('scroll', scrollActive)
});