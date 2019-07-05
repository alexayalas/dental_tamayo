$(document).on('submit', '.form', function () {
    var frm = $(this);
    var btn = frm.find(".save");
    var method = frm.attr("method");
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
            .done(function (data)
            {
                console.log(data);
                btn.removeAttr("disabled");
                $('.load').html('');
                frm.find('.response').html(data).hide().slideDown();
            })
            .error(function (data, msg)
            {
                btn.removeAttr("disabled");
                frm.find('.response').html("Ha ocurrido un error interno");
            });
    return false;
});

//para la confirmacion del cambiar de estado
$(document).on('click', '.denegar', function (e) {
    e.preventDefault();
    var url = $(this).attr("data-url");
    var mensaje = '¿Esta seguro que desea eliminar este registro?';
    confirmar(mensaje,"",url,1);
});


$(document).on('click', '.permitir', function (e) {
    e.preventDefault();
    var url = $(this).attr("data-url");
    var mensaje = '¿Esta seguro que desea desbloquear este registro?';
    confirmar(mensaje,"",url,1);
});

$(document).on('click', '.directo', function (e) {
    e.preventDefault();
    var url = $(this).attr("data-url");
    var mensaje = '¿Esta seguro que desea bloquear los correos?';
    confirmar(mensaje,"",url,1);
});


$(document).on('click', '.indirecto', function (e) {
//    alert("llego");
    e.preventDefault();
    var url = $(this).attr("data-url");
    var mensaje = '¿Esta seguro que desea desbloquear los correos?';
    confirmar(mensaje,"",url,1);
});


//para la confirmacion de la eliminacion de un registro
$(document).on('click', '.eliminar', function (e) {
    e.preventDefault();
    var url = $(this).attr("data-url");
    alertify.confirm('<h3>¿Esta seguro que desea eliminar este registro?</h3><h4>recuerde que la eliminacion sera permantente</h4>')
            .set('title', 'Importante')
            .set('labels', {ok: 'Confirmar', cancel: 'Cancelar'})
            .set('onok', function (closeEvent) {
                $.post(url,
                        {},
                        function (response) {
                            $('.response').html(response);
                        });
            })
});

//para actualizar el captcha
$(document).on('click', '#actualizarCaptcha', function (e) {
    e.preventDefault();
    var url = base_url + 'admin/home/recaptcha'; 
    $.post(url,
        {},
        function (response) {
            $('#captcha').html(response);
    });

});

//Script para el ordenamiento de imágenes
$(document).on('click', '.subir', function(e) {
    e.preventDefault();
    url = $(this).attr("data-url");
    id = $(this).attr("data-id");
    $.post(url,
            {id: id},
    function(response) {
        $('.response').html(response);
    });
});

$(document).on('click', '.bajar', function(e) {
    e.preventDefault();
    url = $(this).attr("data-url");
    id = $(this).attr("data-id");
    $.post(url,
            {id: id},
    function(response) {
        $('.response').html(response);
    });
});


//PARA CERRAR SESSION
$(document).on('click', '.sclose', function (e) {
    e.preventDefault();
    url = $(this).attr("data-url");
    $.post(url,
        {},
        function (response) {
            $('.response').html(response);
    });
    
});


// FUNCION PARA CONFIRMAR
function confirmar(title,text,url,type){
    if(type == 1){
        swal({   
            title: title,   
            text: text,   
            type: "warning",   
            showCancelButton: true,
            animation: "slide-from-top",
            html: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "OK",   
            cancelButtonText: "Cancelar",   
            closeOnConfirm: false,  
            
        }, function(){   
                $.post(url,
                    {},
                    function (response) {
                    $('.response').html(response);
                });
        });
    }else if (type == 2) {
        swal({   
            title: title,   
            text: text,   
            type: "warning",   
            showCancelButton: true,
            animation: "slide-from-top",
            html: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "OK",   
            cancelButtonText: "Cancelar",   
            closeOnConfirm: false,
            closeOnCancel: false   
            
        }, function(isConfirm){   
            if (isConfirm) {     
                $.post(url,
                    {},
                    function (response) {
                    $('.response').html(response);
                }); 
            } else {     
                swal("Acción Cancelada", "", "error");   
            } 
        });
    }
}


$(document).on('click', '.remove-tr', function() {
    $(this).parent().parent().remove();
    return false;
});


// PARA ELIMINAR UNA SEDE DE UN DOCTOR
$(document).on('click', '.delete-co', function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var url = base_url + 'admin/correo/eliminar_correo/' + id;
    var mensaje = '¿Esta seguro que desea eliminar este correo?';
    confirmar(mensaje,"",url,1);
});

// FIN DE LAS SCRIPT PARA SEDES POR DOCTOR

// PARA AGREGAR ALTERNATIVAS
$(document).on('click', '.add-alt', function() {
    var correo = $('.scorreo').val();    
    if(correo == ''){
        alerta('Debe de ingresar un correo valido...');
    }else{
        if(!$('tr').hasClass('item-'+correo)){
            TBL = $('#table-item');
            //TBL.find('.none').hide();
            html = '<tr class="item-'+correo+'" style="height: 40px;">';
            html += '<td style="text-align: center;"><input name="fcorreo[]" value="'+correo+'" class="form-control" type="text"></td>';
            html += '<td style="text-align: center;"><a class="btn btn-sm btn-danger remove-tr" data-toggle="tooltip" title="Eliminar""><i class="fa fa-trash"></i></a></td>';
            html += '</tr>';
            TBL.append(html);
            $('.scorreo').val("");
        }else{
            alerta('El correo ya fue ingresado...');
        }   
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

// PARA ABRIR MODAL PARA EDITAR UN REGISTRO
$(document).on('click', '.editar', function (e) {
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

// PARA ABRIR MODAL PARA DATOS UN REGISTRO
$(document).on('click', '.observar', function (e) {
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

// PARA ABRIR MODAL PARA EDITAR UN REGISTRO
$(document).on('click', '.correo', function (e) {
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

// PARA ABRIR MODAL PARA CAMBIAR PASSWORD
$(document).on('click', '.password', function (e) {
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


// FUNCIONES DE ALERTA EN GENERAL
function alerta(msj){
    swal({
        title: "",
        text:  msj ,
        type: "error",
        html: true
        });
}


$(document).on('click', '.doct-select', function (e) {
    e.preventDefault();
    id = $(this).attr("data-id");
    
    var url = base_url + 'admin/doctor/aprobar/' + id;
    $.post(url,
        {},
        function (response) {
           $('.response').html(response); 
           $(".content-doctor").load(location.href + " .content-doctor");
    });

});


// ---------------------------------------------------------------------------------

// PARA ABRIR MODAL PARA EDITAR UN REGISTRO
$(document).on('click', '.views', function (e) {
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

// PARA ABRIR MODAL PARA PASSWORD
$(document).on('click', '.m-password', function (e) {
    e.preventDefault();
    var url = base_url + 'admin/usuario/form_password';
    $.post(url,
        {},
        function (response) {
            $("#tituloModal1").html(response.titulo);
            $("#modalPassword").modal({ backdrop: 'static', keyboard: false });
            $("#modalContenidoBody1").html(response.contenido);
            $("#modalPassword").modal("show");
    }, 'json');

});

//PARA EXPORTAR FORMULARIOS WEB
$(document).on('click', '.export-form', function (e) {
    e.preventDefault();
    fi = $(".efi").val();
    ff = $(".eff").val();

    if(fi == '' || ff == ''){
        alerta('Debe seleccionar <b>Fecha de Inicio</b> y <b>Fin</b> para exportar datos...'); return false;
    }

    location.href=base_url + 'admin/excel/exportar_formulario_web?fi='+fi+'&ff='+ff;  
    
});


//PARA EXPORTAR FORMULARIOS WEB
$(document).on('click', '.export-form-fa', function (e) {
    e.preventDefault();
    fi = $(".efi").val();
    ff = $(".eff").val();

    if(fi == '' || ff == ''){
        alerta('Debe seleccionar <b>Fecha de Inicio</b> y <b>Fin</b> para exportar datos...'); return false;
    }

    location.href=base_url + 'admin/excel/exportar_formulario_facebook?fi='+fi+'&ff='+ff;  
    
});


//PARA EXPORTAR STREAMING WEB
$(document).on('click', '.export-streaming', function (e) {
    e.preventDefault();
    fi = $(".efi").val();
    ff = $(".eff").val();

    if(fi == '' || ff == ''){
        alerta('Debe seleccionar <b>Fecha de Inicio</b> y <b>Fin</b> para exportar datos...'); return false;
    }

    location.href=base_url + 'admin/excel/exportar_streaming?fi='+fi+'&ff='+ff;  
    
});