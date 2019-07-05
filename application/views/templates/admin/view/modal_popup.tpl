<script src="{$base_url}public/admin/js/scripts.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="direct-chat-msg">
            <div class='direct-chat-info clearfix'>
                <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
            </div>
        </div>
    </div>
                        
    <form action="{$base_url}admin/popup/accion" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Titulo:</label>
            <input type="text" class="form-control"  name="titulo" value="{if isset($titulo)}{$titulo}{/if}" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
    </div> 

    <div class="col-md-6">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Fecha Vencimiento:</label>
            <input type="text" class="form-control datepicker2"  name="f_vencimiento" value="{if isset($f_vencimiento)}{$f_vencimiento}{/if}" />
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
        </div>
    </div> 

    <div class="col-md-10" style="margin-bottom: 15px;">
        <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Examinar... <input type="file" name="imagen" />
                </span>
            </span>
            <input type="text" class="form-control" value="{if isset($imagen)}{$imagen}{/if}" readonly />
            <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
        </div>
    </div> 

    <div class="col-md-12">
        <div class="col-md-10 col-sm-6 col-xs-12">
            <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar">
                <i class="fa fa-save"></i> Guardar
            </button><i class="load"></i>
            <a class="btn btn-social btn-danger m-close" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
            <input class="b-fase" type="hidden" name="id" value="{if isset($id)}{$id}{/if}" />
        </div>
    </div>
    </form>
</div>

<script type="text/javascript">

    $('.datepicker2').datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '2016:2020',
    });
</script>