
/*SLIDER*/
const items = document.querySelectorAll('.slider img');
const nbSlide = items.length;
const next = document.querySelector('.next');
const preview = document.querySelector('.prev');
let count = 0;

document.addEventListener('DOMContentLoaded', (event) => {

    $('.slider2').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
});




