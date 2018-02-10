/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

baseUrl = "";
var ajax_load = "<div class='progress'>" + "<div id='progress_id' class='progress-bar progress-bar-striped bg-success active' " +
        "role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>" +
        "n/100</div></div>";

$('a.dropdown-item').on("click", function (ev) {
    ancho = 400;
    if (matchMedia('only screen and (max-width: 479px)').matches) {
        ancho = "98%";
    }

    if (matchMedia('only screen and (max-width: 768px)').matches) {
        ancho = '98%';
    }
    $('#myProgressBar').dialog({
        autoOpen: true,
        modal: true,
        title: 'Cargando',
        position: {
            my: 'top',
            at: 'top'
                    //of: $('#some_div')
        },
        open: function () {

            $("#myProgressBar").css("visibility", "visible");
        },
        height: 150,
        width: ancho
    });
    ev.preventDefault();
    var href = $(this).attr('href');
    $("#myProgressBar").html(ajax_load);
    $.ajax({
        url: baseUrl + href,
        success: function (xhr) {
            $('#myProgressBar').dialog();
            $('#myProgressBar').dialog('close');
            $('#myProgressBar').dialog("destroy");
            $("#myProgressBar").css("visibility", "hidden");
            // $(location).attr('href', href);
            //window.location.href = data.redirect;                             
            //location.href = xhr.getResponseHeader("Location");
            //window.location.href = xhr.getResponseHeader("Location")
        },
        xhr: function () {
            var xhr = $.ajaxSettings.xhr();
            xhr.onprogress = function (evt) {
                var porcentaje = Math.floor((evt.loaded / evt.total * 100));
                $("#progress_id").text(porcentaje + "/100");
                $("#progress_id").attr("aria-valuenow", porcentaje);
                $("#progress_id").css("width", porcentaje + "%");
            };
            return xhr;
        },

        complete: function (xhr) {
            //location.href = xhr.getResponseHeader("Location");
            alert(xhr.status);
        }
    });
});


