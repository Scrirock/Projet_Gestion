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