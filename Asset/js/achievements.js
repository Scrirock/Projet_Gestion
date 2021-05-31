/**
 * Show the unlock achievement
 * @param unlock
 */
export function achievement(unlock){
    const littleBox = document.getElementById('achievement');
    const unlockP = document.getElementById('unlock');
    littleBox.style.top = "1rem";
    unlockP.innerHTML = unlock;

    setTimeout(()=>{
        littleBox.style.top = "-10rem";
    }, 4000)
}

