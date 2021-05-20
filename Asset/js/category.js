let stockLine = document.getElementsByClassName("stockLine");
let categoryLine = document.getElementsByClassName("categoryLine");
let descriptionLine = document.getElementsByClassName("stockDescription")

for (let line of categoryLine){
    if (line.hasChildNodes()) {
        line.addEventListener("click", ()=>{
            for (let line of stockLine){
                line.style.height = "0";
            }
            for (let stock of line.childNodes){
                if (stock.className === "stockLine"){
                    stock.style.height = "auto";
                }
            }
        })
    }
}

for (let line of stockLine){
    if (line.hasChildNodes){
        for (let child of line.childNodes){
            if (child.className === "stockName"){
                child.addEventListener("click", ()=>{
                    for (let line of descriptionLine){
                        line.style.height = "0";
                    }
                    child.nextSibling.nextSibling.style.height = "auto";
                })
            }
        }
    }
}