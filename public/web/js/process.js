$(document).on('submit', '.form', function() {
    frm = $(this);
    btn = frm.find(".save");
    method = frm.attr("method");
    btn.attr("disabled", "disabled");
    $('.load').html('cargando...<img src="'+base_url+'public/img/load2.gif" style="width: 30px">');
    $.ajax({
        url: frm.attr('action'),
        type: method,
        data: frm.serialize(),
        data: new FormData(this),
                contentType: false,
        cache: false,
        processData: false,
    })
            .done(function(data)
            {
                btn.removeAttr("disabled");
                $('.load').html('');
                frm.find('.response').html(data).hide().slideDown();
            })
            .error(function(data, msg)
            {
                btn.removeAttr("disabled");
                frm.find('.response').html("Ha ocurrido un error interno");
            });
    return false;
});



/*FACEBOK*/
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/*TWITTER*/
!function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = p + '://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, 'script', 'twitter-wjs');

function showContent() {
    element = document.getElementById("content");
    check = document.getElementById("check");
    if (check.checked) {
        element.style.display = 'block';
    }
    else {
        element.style.display = 'none';
    }
}
/* ------------------------------------------------------------------------ */

var gec;
!function ($) { 'use strict';
    gec = {
        utils: {
            preventDefault: function (event) {
                if (event.preventDefault)
                    event.preventDefault();
                else
                    event.returnValue = false;
            }
        },
        fn: {
            popup: function (t, e) {
                gec.utils.preventDefault(e);
                var $t = $(t),
                        _href = "";
                if ($t.data("href"))
                    _href = $t.data("href");
                else
                    _href = $t.attr("href");
                window.open(_href, 'gec_popup', 'width=500,height=450,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');
            },
            print: function (e) {
                gec.utils.preventDefault(e), window.print()
            }
        }
    };
}(window.jQuery);


/* ---------------------------------------------------------------------------------------------------- */
$("#buscar").on("click", function(e) {
    e.preventDefault();
    var buscar = $("#buscador").val();
    var url_buscar = buscar.replace(/\s/g, "-");
    location.href = base_url + "site/busqueda/" + url_buscar;
    //alert(buscar);
});

$("#buscador").on('keypress', function(e) {
    if (e.which == 13) {
        $("#buscar").trigger("click");
    }
});

/*$(function () {
    var url = base_url + 'site';
    var url2 = base_url + 'site/';
    var urlDestino = base_url + 'admin/popup/verificar';
    if (url == window.location || url2 == window.location) {
        $.post(urlDestino,
            {dato:'home'},
        function (response) {
            //alert(response);
            if(response != ''){
                //$('.m-content').css("background","url('public/imagen/popup/"+response+"') no-repeat");
                $('.img-home').attr("src",base_url + "public/imagen/popup/"+response+"");
                $('#modalPresentacion').modal('show');
            }
            
        },'json');

        
    }

});*/

$(function () {
    var url = base_url + 'site';
    var url2 = base_url + 'site/';
    var urlDestino = base_url + 'admin/popup/verificar';
    if (url == window.location || url2 == window.location) {
        $.post(urlDestino,
            {dato:'home'},
        function (response) {
            //alert(response);
            if(response != ''){
                //$('.m-content').css("background","url('public/imagen/popup/"+response+"') no-repeat");
                
                $('.fan-home').attr("href",base_url + "public/imagen/popup/"+response+"");
                $('.img-home').attr("src",base_url + "public/imagen/popup/"+response+"");
                $('.fan-home').trigger('click');
                //$('#modalPresentacion').modal('show');
            }
            
        },'json');

        
    }

});


// PARA ABRIR MODAL PARA NUEVO REGISTRO
$(document).on('click', '.m-add', function (e) {
    e.preventDefault();
    var url = $(this).attr("data-url");
    $.post(url,
        {},
        function (response) {
            $("#tituloModal").html(response.titulo);
            $("#modalContenido").modal({ backdrop: 'static', keyboard: false });
            $("#modalContenidoBody").html(response.contenido);
            $("#modalContenido").modal("show");
    }, 'json');

});

// PARA CERRAR EL MODAL
$(document).on('click', '.m-close', function (e) {
    e.preventDefault();
    $("#modalContenido").modal("hide");
    $("#modalPassword").modal("hide");
});


// PARA ABRIR MODAL PARA NUEVO REGISTRO
$(document).on('click', '.view-staff', function (e) {
    e.preventDefault();
    $("#modalStaff").modal("show");
    /*var url = $(this).attr("data-url");
    $.post(url,
        {},
        function (response) {
            $("#tituloModal").html(response.titulo);
            $("#modalContenido").modal({ backdrop: 'static', keyboard: false });
            $("#modalContenidoBody").html(response.contenido);
            $("#modalContenido").modal("show");
    }, 'json');
*/
});

// PARA ABRIR MODAL PARA NUEVO REGISTRO
$(document).on('click', '.view-staff2', function (e) {
    e.preventDefault();
    $("#modalStaff2").modal("show");
    /*var url = $(this).attr("data-url");
    $.post(url,
        {},
        function (response) {
            $("#tituloModal").html(response.titulo);
            $("#modalContenido").modal({ backdrop: 'static', keyboard: false });
            $("#modalContenidoBody").html(response.contenido);
            $("#modalContenido").modal("show");
    }, 'json');
*/
});


$(document).on('click', '.btn-staff', function (e) {
    e.preventDefault();
    var idsede = $(this).attr('data-id');
    var url = base_url + 'site/staff_medico/' + idsede;
    //alert(url);
    $.post(url,
        {},
        function (response) {
            //$("#tituloModal").html(response.titulo);
            //$("#modalContenido").modal({ backdrop: 'static', keyboard: false });
            $("#modalContenidoBody").html(response.contenido);
            $("#modalStaff").modal("show");
    }, 'json');

});

$(document).ready(function(){
    /*var response = grecaptcha.getResponse();

    if(response.length == 0)
        $(".btn-regist").attr("disabled", "disabled");

    else{

    }*/

    var correctCaptcha = function(response) {
        alert(response);
    };

});

/*$(document).ready(function(){

    var CaptchaCallback = function() {
        grecaptcha.render('Recaptcha1', {'sitekey' : '6LeizisUAAAAAAlgxeditjer-NR21hAa4eQWBiT_'});
        grecaptcha.render('Recaptcha2', {'sitekey' : '6LeizisUAAAAAAlgxeditjer-NR21hAa4eQWBiT_'});
    };
});*/

$(document).on('click', '.m-terminos', function (e) {
    e.preventDefault();
    $("#modalTerminos").modal("show");

});

$(document).on('click', '#btnPD', function (e) {
    $("#filaSemefa").hide();
    $("#filaPlanDental").show();
    $(this).addClass("active");
    $("#btnSemefa").removeClass("active");

});

$(document).on('click', '#btnSemefa', function (e) {
    $("#filaSemefa").show();
    $("#filaPlanDental").hide();
    $(this).addClass("active");
    $("#btnPD").removeClass("active");

});

$(document).on('click', '.b_marcar_asistencia', function(e) {
    e.preventDefault();

    id = $(this).attr('data-id');
    estado = $(this).attr('data-estado');
    //alert(id);
    btn = $(this);

    btn.attr("disabled", "disabled");
    url = base_url + 'formulario/marcar_asistencia';
    $.post(url,
        {id:id, estado:estado},
        function(response) {
            if(response == 1){
                btn.attr("class","btn btn-success b_marcar_no_asistencia");
                btn.text('ASISTIO');
                btn.removeAttr("disabled");
                btn.attr("data-estado", "1");

            }else {
                btn.attr("class","btn btn-danger b_marcar_asistencia");
                btn.text('marcar asistencia');
                btn.attr("data-estado", "0");
                btn.removeAttr("disabled");
            }
    });

});


$(document).on('click', '.b_marcar_no_asistencia', function(e) {
    e.preventDefault();

    id = $(this).attr('data-id');
    estado = $(this).attr('data-estado');
    //alert(id);
    btn = $(this);
    
    btn.attr("disabled", "disabled");
    url = base_url + 'formulario/marcar_asistencia';
    $.post(url,
        {id:id, estado:estado},
        function(response) {
            if(response == 1){
                btn.attr("class","btn btn-success b_marcar_no_asistencia");
                btn.text('ASISTIO');
                btn.removeAttr("disabled");
                btn.attr("data-estado", "1");

            }else {
                btn.attr("class","btn btn-danger b_marcar_asistencia");
                btn.text('marcar asistencia');
                btn.attr("data-estado", "0");
                btn.removeAttr("disabled");
            }
    });

});



$(document).on('click', '.b_congreso_marcar_asistencia', function(e) {
    e.preventDefault();

    id = $(this).attr('data-id');
    estado = $(this).attr('data-estado');
    //alert(id);
    btn = $(this);

    btn.attr("disabled", "disabled");
    url = base_url + 'formulario/marcar_asistencia_congreso';
    $.post(url,
        {id:id, estado:estado},
        function(response) {
            if(response == 1){
                btn.attr("class","btn btn-success b_congreso_marcar_no_asistencia");
                btn.text('ASISTIO');
                btn.removeAttr("disabled");
                btn.attr("data-estado", "1");

            }else {
                btn.attr("class","btn btn-danger b_congreso_marcar_asistencia");
                btn.text('marcar asistencia');
                btn.attr("data-estado", "0");
                btn.removeAttr("disabled");
            }
    });

});


$(document).on('click', '.b_congreso_marcar_no_asistencia', function(e) {
    e.preventDefault();

    id = $(this).attr('data-id');
    estado = $(this).attr('data-estado');
    //alert(id);
    btn = $(this);
    
    btn.attr("disabled", "disabled");
    url = base_url + 'formulario/marcar_asistencia_congreso';
    $.post(url,
        {id:id, estado:estado},
        function(response) {
            if(response == 1){
                btn.attr("class","btn btn-success b_congreso_marcar_no_asistencia");
                btn.text('ASISTIO');
                btn.removeAttr("disabled");
                btn.attr("data-estado", "1");

            }else {
                btn.attr("class","btn btn-danger b_congreso_marcar_asistencia");
                btn.text('marcar asistencia');
                btn.attr("data-estado", "0");
                btn.removeAttr("disabled");
            }
    });

});