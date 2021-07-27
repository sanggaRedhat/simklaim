var base_url = window.location.origin;

$.ajax({
    type: "get",
    url: base_url+"/keuangan/reminder-uthorize-m",
    dataType: "json",
    success: function (response) {
        alert(response.crekon);
    }
});