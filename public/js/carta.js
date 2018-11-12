$(document).ready( function () {
    const td_lugar =  document.querySelectorAll(".td_lugar")
    for(let i = 0; i< td_lugar.length; i++) {
        let newtText = "";

            let ltext = td_lugar[i].innerText

            if(ltext.length> 30) {
                //console.log(td_lugar[i].innerText);

                newtText = ltext.slice(0, 20);
                td_lugar[i].innerHTML = newtText + "...";

            }
    }
});
const btnCarta = document.querySelectorAll(".btnCarta")
    for(let i = 0; i < btnCarta.length; i++) {
        btnCarta[i].addEventListener("click", function () {
            $.ajax({
                url: "get_information_for_id",
                method: "POST",
                dataType: "JSON",
                data: {id: btnCarta[i].id, _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    console.log(btnCarta[i].id)

                    nombre.value = data.nombre
                    apellido.value = data.apellido
                    email.value = data.email
                    id_user.value = data.id
                    lugar.value =  data.lugar_nacimiento
                    hora.value = data.hora_nacimiento
                    fecha.value =  data.fecha_nacimiento

                }
            })
        })
     }
