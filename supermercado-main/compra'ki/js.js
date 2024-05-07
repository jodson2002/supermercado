var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Troca de slide a cada 2 segundos
}

var ofertaIndex = 0;
showOfertas();

function showOfertas() {
    var i;
    var ofertas = document.getElementsByClassName("oferta");
    for (i = 0; i < ofertas.length; i++) {
        ofertas[i].style.display = "none";
    }
    ofertaIndex++;
    if (ofertaIndex > ofertas.length) { ofertaIndex = 1 }
    ofertas[ofertaIndex - 1].style.display = "block";
    setTimeout(showOfertas, 3000); // Troca de oferta a cada 3 segundos
}




