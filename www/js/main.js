/*SLIDER*/
const items = document.querySelectorAll('img');
const nbSlide = items.length;
const next = document.querySelector('.right');
const preview = document.querySelector('.left');
let count = 0;

function slideNext() {          /*pour faire apparaitre slide suivante*/
    items[count].classList.remove('active');
    
    if(count < nbSlide - 1){            
        count++;                        /*passe l'image suivante */
    } else {
        count = 0;                         /*sinon ont repasse le compteur à 0 */
    }
    
    items[count].classList.add('active')    /*ajout de la classe active */
    console.log(count); 
}

next.addEventListener('click', slideNext);


function slidePreview() {                       /*Le contriare de la première fonction*/
    items[count].classList.remove('active');
    
    if(count > 0) {
        count--;
    } else {
        count = nbSlide -1
    }
    
    items[count].classList.add('active');
}
preview.addEventListener('click', slidePreview);



function keyPress(e) {
    if(e.keyCode === 37) {
        slidePreview();
    } else if (e.keyCode === 39) {
        slideNext();
    }
}
document.addEventListener('keydown', keyPress)




