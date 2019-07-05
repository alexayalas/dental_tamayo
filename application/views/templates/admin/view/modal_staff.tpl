<script src="{$base_url}public/admin/js/scripts.js"></script>

<div class="row">
                        
    <form action="{$base_url}admin/staff/accion" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Nombre del Especialista:</label>
            <input type="text" class="form-control"  name="nombre" value="{if isset($nombre)}{$nombre}{/if}" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Especialidad:</label>
            <input type="text" class="form-control"  name="especialidad" value="{if isset($especialidad)}{$especialidad}{/if}" />
            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> COP:</label>
            <input type="text" class="form-control"  name="cop" value="{if isset($cop)}{$cop}{/if}" />
            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Decripcion:</label>
            <textarea class="form-control" name="descripcion" rows="4">{if isset($descripcion)}{$descripcion}{/if}</textarea>
        </div>
    </div> 

    {if $emp_grade == '1' || $emp_grade == '2' || $emp_grade == '3'}
    <div class="col-xs-6 col-md-6">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk text-red"></i> Sede:</label>
            {if isset($sede)}
            {$sede}
            {else}
            <select name="sede" id="sede" class="form-control selectpicker">
                <option value="">Seleccione una Opción</option>
                </select>
            {/if}
        </div>
    </div> 
    {/if}
    

    <div class="col-md-10" style="margin-bottom: 15px;">
        <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen</label>
    </div> 

    <div class="col-md-12">
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    {if isset($imagen)}
                        <img src="{$imagen}" />
                    {else}
                        <img src="{$base_url}public/imagen/usuario/empty.png" alt="...">                     
                    {/if}
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <div>
                    <span class="btn btn-primary btn-file"><span class="fileinput-new">Seleccionar Imagen</span><span class="fileinput-exists">Change</span><input type="file" name="imagen"></span>
                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Quitar</a>
                </div>
            </div>
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