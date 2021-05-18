let defaultTheme = document.getElementById("defaultTheme");
let redTheme = document.getElementById("redTheme");
let neonTheme = document.getElementById("neonTheme");
let link = document.getElementById("themeChanger");

defaultTheme.addEventListener("click", ()=>{
    localStorage.setItem('theme', 'default');
    link.href = "Asset/css/"+localStorage.getItem('theme')+".css";
});

neonTheme.addEventListener("click", ()=>{
    console.log('ef')
    localStorage.setItem('theme', 'neon');
    link.href = "Asset/css/"+localStorage.getItem('theme')+".css";
});

redTheme.addEventListener("click", ()=>{
    localStorage.setItem('theme', 'redTest');
    link.href = "Asset/css/"+localStorage.getItem('theme')+".css";
});