function showProduct(){
    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
        let stock = JSON.parse(xhr.responseText);
        let divStock = document.getElementById("containerStock");
        divStock.innerHTML = "";
        let i = 0;

        stock.forEach(stock => {
            divStock.innerHTML += `
                <div class="productLine">
                    <div class="color"></div><span class="productName">${stock.name}: </span>
                    <span class="productStock">${stock.stock}</span>
                    <span class="stockMin">(stock Minimum ${stock.stockMin}) </span>
                </div>
            `;
            let stockColor = document.getElementsByClassName("color");
            let stockMin = stock.stockMin;
            if (stock.stock >= stockMin+(.5*stockMin)){
                stockColor[i].className = "color  green";
            }
            else if (stock.stock < stockMin+(.5*stockMin) && stock.stock >= stockMin){
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
}
showProduct();
setInterval(showProduct, 360000);
