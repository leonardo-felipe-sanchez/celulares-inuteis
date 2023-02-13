
var imagens = ["images/7962750.jpg", "images/dwayne.png", "images/Fabio-Giga-pro-840x525.jpg", "images/images.jpg"];
var imagematual = 0;

function trocaimagem() {
 imagematual = (imagematual + 1) % 4;
document.querySelector('.gif img'). src = imagens[imagematual];
}
setInterval(trocaimagem, 3500);