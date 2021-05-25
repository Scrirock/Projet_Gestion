//setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
        let stock = JSON.parse(xhr.responseText);
        let divStock = document.getElementById("containerStock");
        divStock.innerHTML = "";
        let i = 0;

        stock.forEach(stock => {
            divStock.innerHTML += `
                <div class="productLine">
                    <div class="color"></div><span class="productName">${stock.name}: <span class="productStock">${stock.stock}</span></span>
                </div>
            `;
            let stockColor = document.getElementsByClassName("color");
            if (stock.stock >= 500){
                stockColor[i].className = "color  green";
            }
            else if (stock.stock < 500 && stock.stock >= 100){
                stockColor[i].className = "color orange";
            }
            else{
                stockColor[i].className = "color red";
            }
            i++;
        });
    };

    xhr.open('GET', './api/stockAPI.php');
    xhr.send();
//}, 1000);