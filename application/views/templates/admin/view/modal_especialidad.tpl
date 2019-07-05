<div class="row">
    <div class="col-md-12">
        <div class="direct-chat-msg">
            <div class='direct-chat-info clearfix'>
                <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
            </div>
        </div>
    </div>
                        
    <form action="{$base_url}admin/especialidad/accion" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Nombre:</label>
            <input type="text" class="form-control"  name="nombre" value="{if isset($nombre)}{$nombre}{/if}" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
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