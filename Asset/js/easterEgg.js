import {achievement} from "./achievements.js";

const connexionButton = document.getElementById('connexionButton');
const searchInput = document.getElementById('searchInput');
const category = document.getElementById('category');

function achievementPage(e){
    e.preventDefault();
    document.getElementById("achievementPage").style.display = "initial";
}

document.addEventListener("keydown", (e) => {
    if (e.key === "Control"){
        connexionButton.addEventListener("click", (e)=>{achievementPage(e)});
    }
});

document.addEventListener("keyup", (e) => {
    if (e.key === "Control"){
        connexionButton.removeEventListener("click", (e)=>{achievementPage(e)});
    }
});

const code = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "b", "a"];
let i = 0;
function checkKey(e){
    if(e.key === code[i]){
        i++;
    }
    else {
        i = 0;
    }

    if (i === 10){
        i = 0;
        achievement("Les mini-jeux")
    }

    if (e.key === "Enter"){
        if (searchInput.value === "PC"){
            searchInput.value = "";
            let divPC = document.createElement("div");
            divPC.id =  "divPc";
            category.appendChild(divPC);
            divPC.addEventListener("click", ()=>{
                achievement('Le thème " Matrix "');
                category.removeChild(divPC);
            })
        }
    }
}

document.addEventListener("keyup", (e) => checkKey(e));

