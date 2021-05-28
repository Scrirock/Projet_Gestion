const error = document.getElementById('error');
const succeed = document.getElementById('succeed');

if (error !== null){
    setTimeout(()=>{
        error.style.display = "none";
    }, 3000)
}

if (succeed !== null){
    setTimeout(()=>{
        succeed.style.display = "none";
    }, 3000)
}

function search(e){
    if (e.key === "Enter"){
        window.location = "/?controller=search&r="+requestInput.value;
    }
}

const requestInput = document.getElementById('searchInput');
requestInput.addEventListener("keyup", (e) => search(e));