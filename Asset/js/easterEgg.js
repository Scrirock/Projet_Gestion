import {achievement} from "./achievements.js";

const connexionButton = document.getElementById('connexionButton');
const searchInput = document.getElementById('searchInput');
const category = document.getElementById('categoryMenu');
let link = document.getElementById("themeChanger");
if(localStorage.getItem('theme') === null){
    localStorage.setItem('theme', 'default');
}
link.href = "Asset/css/"+localStorage.getItem('theme')+".css";

/**
 * Show the achievement menu
 * @param e
 */
function achievementPage(e){
    e.preventDefault();
    document.getElementById("achievementPage").style.display = "initial";
}

document.addEventListener("keydown", (e) => {
    if (e.key === "Control"){
        connexionButton.addEventListener("click", achievementPage);
    }
});

document.addEventListener("keyup", (e) => {
    if (e.key === "Control"){
        connexionButton.removeEventListener("click", achievementPage);
    }
});


const code = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "b", "a"];
let i = 0;
function checkKey(e){
    /**
     * Check if th user enter correctly the konami code
     */
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

    /**
     * Show an image of a pc if the content of the search barr is PC
     */
    if (e.key === "Enter"){
        if (searchInput.value === "PC"){
            searchInput.value = "";
            console.log("aled");
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

