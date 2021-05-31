let defaultTheme = document.getElementById("defaultTheme");
let redTheme = document.getElementById("redTheme");
let neonTheme = document.getElementById("neonTheme");
let link = document.getElementById("themeChanger");

/**
 * Change the theme depending on the button clicked
 */

defaultTheme.addEventListener("click", ()=>{
    localStorage.setItem('theme', 'default');
    link.href = "Asset/css/"+localStorage.getItem('theme')+".css";
});

neonTheme.addEventListener("click", ()=>{
    localStorage.setItem('theme', 'neon');
    link.href = "Asset/css/"+localStorage.getItem('theme')+".css";
});

redTheme.addEventListener("click", ()=>{
    localStorage.setItem('theme', 'anger');
    link.href = "Asset/css/"+localStorage.getItem('theme')+".css";
});