$(document).ready( function ( ){

    msj_pwd.style.display = "none";
    pwd_confirm.addEventListener("keyup", function () {
        if(pwd_confirm.value === password.value) {
            btn_send.disabled = false
            msj_pwd.style.display = "none";
        }else {
            msj_pwd.style.display = "block"
        }
    });

    email.addEventListener("blur", function () {
        const arraEmail = email.value.split("@");
        if(arraEmail.length > 1) {
            $.ajax({
                data: {email: email.value, _token: $('meta[name="csrf-token"]').attr('content')},
                url: "valid_email",
                method: "POST",
                dataType: "json",
                success: function (data) {
                    console.log(data)
                    if(data.status == 500) {
                        msj_email.style.color = "red"
                    }else  {
                        msj_email.style.color = "green"
                    }
                    msj_email.textContent = data.value
                }
            })
        }else {
            msj_email.style.color = "red"
            msj_email.textContent = "Email no válido"
        }
        // console.log(arraEmail)

    })

    frm_create.addEventListener("submit", function (e) {
        e.preventDefault();
    $.ajax({
            data: $("#frm_create").serialize(),
            url:  "user_create",
            method: "POST",
            dataType: "JSON",
            success: function (data) {
                alertify.success(data.value);
                window.location.href = "home";
            }
        });


    })

});