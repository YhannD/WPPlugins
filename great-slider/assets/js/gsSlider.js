let index = 0;
let arret;
let imagesList = document.querySelectorAll(".greatslider-figure");
let imagesListMax = imagesList.length;

function cacheImage() {
    for (let j = 0; j < imagesList.length; j++) {
        imagesList[j].classList.remove("active");
        // listePuces[j].classList.remove("red")
    }
}
function afficheImage() {
    // play.addEventListener("click", startDiapo);
    cacheImage();
    imagesList[index].classList.add("active");
    if (imagesList[index].classList.contains("affiche") == true) {
        // listePuces[index].classList.add("red")
        // if (imagesList[imagesListMax - 1].classList.contains("affiche") == true) {
        //     play.removeEventListener("click", startDiapo);
        // }
    }
}

let flecheDroite = document.querySelector(".bi-arrow-right-circle")
flecheDroite.addEventListener("click", imageSuivante);

let flecheGauche = document.querySelector(".bi-arrow-left-circle");
flecheGauche.addEventListener("click", imagePrecedente);

function imageSuivante() {
    index++
    afficheImage();
    if (index == imagesListMax - 1) {
        flecheDroite.removeEventListener("click", imageSuivante);
        // clearInterval(arret)
    }
    flecheGauche.addEventListener("click", imagePrecedente);
}
if (index == 0) {
    flecheGauche.removeEventListener("click", imagePrecedente);
}
function imagePrecedente() {
    index--;
    afficheImage();

    if (index == 0) {
        flecheGauche.removeEventListener("click", imagePrecedente);
    }
    flecheDroite.addEventListener("click", imageSuivante);
}