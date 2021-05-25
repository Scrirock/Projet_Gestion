let stockLine = document.getElementsByClassName("stockLine");
let categoryLine = document.getElementsByClassName("categoryLine");
let descriptionLine = document.getElementsByClassName("stockDescription");
let goToBasket = document.getElementsByClassName("goToBasket");
let shoppingForm = document.getElementById("shoppingForm");
let shoppingBasket = document.getElementById("shoppingBasket");
let basketTitle = document.getElementById("basketTitle");

for (let line of categoryLine){
    if (line.hasChildNodes()) {
        line.addEventListener("click", (e)=>{
            if (e.target.nodeName !== "I") {
                for (let line2 of stockLine) {
                    line2.style.height = "0";
                }
                for (let stock of line.childNodes) {
                    if (stock.className === "stockLine") {
                        stock.style.height = "auto";
                    }
                }
            }
        })
    }
}

for (let line of stockLine){
    if (line.hasChildNodes){
        for (let child of line.childNodes){
            if (child.className === "stockName"){
                child.addEventListener("click", (e)=>{
                    if (e.target.nodeName !== "I") {
                        for (let line of descriptionLine) {
                            line.style.height = "0";
                        }
                        child.nextSibling.nextSibling.style.height = "auto";
                    }
                })
            }
        }
    }
}

for (let addOne of goToBasket){
    addOne.addEventListener("click", (e)=>{
        let name = e.target.parentNode.parentNode.previousSibling.previousSibling.innerHTML;
        let div = document.createElement("div");
        div.className = "shoppingLine";
        let div2 = document.createElement("div");
        div2.className = "group";
        let span = document.createElement("span");
        span.innerHTML = name;
        span.className = "shoppingName";
        let input = document.createElement("input");
        input.value = "0";
        input.className = "shoppingInput"
        input.name = name;
        let span2 = document.createElement("span");
        span2.innerHTML = "<i class=\"fas fa-times-circle\"></i>"
        span2.className = "shoppingDelete";
        div.appendChild(span);
        div2.appendChild(input);
        div2.appendChild(span2);
        div.appendChild(div2);
        shoppingForm.prepend(div);

        span2.addEventListener("click", (e)=>{
            let divDeleting = e.target.parentNode.parentNode;
            let divDeleting2 = e.target.parentNode.parentNode.previousSibling;
            divDeleting.remove();
            divDeleting2.remove();
        });
    });
}

let clickCheck = false;
basketTitle.addEventListener("click", ()=>{
    if (clickCheck){
        shoppingBasket.style.width = "55px";
        shoppingBasket.style.height = "55px";
        shoppingBasket.style.borderRadius = "99rem";
        clickCheck = false;
    }
    else {
        shoppingBasket.style.width = "300px";
        shoppingBasket.style.height = "auto";
        shoppingBasket.style.borderRadius = "0";
        clickCheck = true;
    }
});