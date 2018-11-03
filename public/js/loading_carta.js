$(document).ready(function () {
    function data_request() {
        $.ajax({
            url: "show_home_data",
            method: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data)
                $("#container_data").html(data.html)
            }
        })
    }
    // data_request()
});