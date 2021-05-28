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

function showHistory(){
    let xhr2 = new XMLHttpRequest();
    xhr2.onload = function() {
        let history = JSON.parse(xhr2.responseText);
        let divHistory = document.getElementById("containerHistory");
        divHistory.innerHTML = "";

        history.forEach(history => {
            let historyLine = document.createElement("div");
            historyLine.className = "historyLine";
            let span = document.createElement("span");
            span.className = "historyProductName";
            span.innerHTML = history.name + ": "
            let span2 = document.createElement("span");
            span2.className = "historyDifference";
            span2.innerHTML = history.stock
            let p = document.createElement("p");
            p.className = "historyDate";
            p.innerHTML = history.date;
            historyLine.append(span);
            historyLine.append(span2);
            historyLine.append(p);
            divHistory.prepend(historyLine);
        });
    };

    xhr2.open('GET', './api/historyAPI.php');
    xhr2.send();
}
showHistory();
setInterval(showHistory, 360000);
