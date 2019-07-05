/*
 * Maquetación del input de imágenes
 */
$(document).on('change', '.btn-file :file', function () {
    var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});
$('.btn-file :file').on('fileselect', function (event, numFiles, label) {
    var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
    if (input.length) {
        input.val(log);
    } else {
        if (log)
            alert(log);
    }
});

// PARA AGREGAR PERSONAL PARA EL DIA
$('#usuario').on('change', function () {
    var pers = $(this).val();
    var texto = $('#usuario option:selected').text();

    if(!$('tr').hasClass('item-'+pers)){
        var TBL = $('#table-item');
        //TBL.find('.none').hide();
        var html = '<tr class="item-'+pers+'" style="height: 40px;">';
        html += '<td style="text-align: center;"><input name="" value="'+texto+'" class="form-control" type="text" readonly></td><input type="hidden" name="usuario_id[]" value="'+pers+'">';
        html += '<td style="text-align: center;"><a class="btn btn-sm btn-danger remove-tr" data-toggle="tooltip" title="Eliminar""><i class="fa fa-trash"></i></a></td>';
        html += '</tr>';
        TBL.append(html);
        $(this).val('');
    }else{
        alerta('El usuario ya fue seleccionado...');
    }
   
});

$(document).on('click', '.remove-tr', function() {
    $(this).parent().parent().remove();
    return false;
});
