import {achievement} from "./achievements.js";

const clickConnexionButton = document.getElementById('connexionButton');
const divClick = document.getElementById('divClick');
let clickNumber = 0;

clickConnexionButton.addEventListener('click', (e)=>{
    e.preventDefault();
    clickNumber++;
    if (clickNumber === 3){
        divClick.innerHTML = "aie";
        setTimeout(()=>{divClick.innerHTML = "";}, 400)
    }
    else if (clickNumber === 7){
        divClick.innerHTML = "Mais arrete!";
        setTimeout(()=>{divClick.innerHTML = "";}, 400)
    }
    else if (clickNumber === 15){
        divClick.innerHTML = "STOP";
        setTimeout(()=>{divClick.innerHTML = "";}, 400)
    }
    else if (clickNumber === 25){
        divClick.innerHTML = "AIE AIE AIE";
        setTimeout(()=>{divClick.innerHTML = "";}, 400)
    }
    else if (clickNumber === 30){
        divClick.innerHTML = "TU VAS ME CASSER";
        setTimeout(()=>{divClick.innerHTML = "";}, 400)
    }
    else if (clickNumber === 50) {

        clickConnexionButton.style.transitionDuration = ".5s";
        clickConnexionButton.style.position = "absolute";
        clickConnexionButton.style.transform = "rotate(48deg)"

        achievement('Le thème " Rouge incandescent "');
    }
})