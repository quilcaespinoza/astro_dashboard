$(document).ready( function () {
    const td_lugar =  document.querySelectorAll(".td_lugar")
    for(let i = 0; i< td_lugar.length; i++) {
        let newtText = "";

            let ltext = td_lugar[i].innerText

            if(ltext.length> 30) {
                console.log(td_lugar[i].innerText)

                newtText = ltext.slice(0, 20)
                td_lugar[i].innerHTML = newtText + "...";

            }
    }
})