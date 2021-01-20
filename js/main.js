
/*SLIDER*/

const items = document.querySelectorAll('.slider img');
const nbSlide = items.length;
const next = document.querySelector('.next');
const preview = document.querySelector('.prev');
let count = 0;

document.addEventListener('DOMContentLoaded', (event) => {

    $('.slider').slick({
        dots: true,
        speed: 1000,
        fade: true,
        cssEase: 'linear',
		adaptiveHeight: true,
		autoplay: true,
		
		
    });
});



//menu smartphone



 // recuperation de l'id toggle est stocker sur la variable let toggle
let toggle = document.getElementById('toggle');

function toggleClass() {
    //si la class on est déjà présente
    if ($("nav").hasClass("on")) {
        $(".lien").removeClass('on');
        $(".lien").css("display", "none");
        $(".lien").css("opacity", 0);
    }
    //sinon
    else{
        $(".lien").addClass('on');
        $(".on").css("display", "block");
        $(".on").css("opacity", 1);
        $(".on").css("z-index", 100);
        
    }
};
//appel de la fonction au moment du click
 toggle.onclick = function() {
    toggleClass();
    
};



