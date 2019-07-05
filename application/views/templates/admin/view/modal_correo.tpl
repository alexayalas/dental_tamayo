<script src="{$base_url}public/admin/js/scripts.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="direct-chat-msg">
            <div class='direct-chat-info clearfix'>
                <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
            </div>
        </div>
    </div>
                        
    <form action="{$base_url}admin/correo/accion" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-10">
        <div class="col-md-10">
            <div class="form-group has-feedback">
                <label><i class="fa fa-asterisk fa-xs text-red"></i> Correo:</label>
                <input type="text" class="form-control scorreo"  name="e" value="{if isset($nombre)}{$nombre}{/if}" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
        </div>
        <a class="btn btn-sm btn-success add-alt" style="margin-top: 28px;"><i class="fa fa-plus"></i></a>

    </div> 

    <div class="col-md-12">
        <table width="100%" class="table" id="table-item">
            <tbody>
                <tr style="height: 40px;background: rgba(60, 141, 188, 0.72);color: #fff;">
                    <td width="40%" style="text-align: center;">Lista de Correos</td>
                    <td width="10%" style="text-align: center;"></td>
                </tr>
                {if isset($listaCorreo)}
                {foreach $listaCorreo as $co}
                    <tr class="item-{$co['correo']}" style="height: 40px;">
                        <td style="text-align: center;">
                            <input name="ecorreo[]" value="{$co['correo']}" class="form-control" type="text">
                            <input name="idecorreo[]" value="{$co['idcorreo']}" class="form-control" type="hidden">
                        </td>
                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-danger delete-co" data-id="{$co['idsedecorreo']}" data-toggle="tooltip" title="Eliminar Correo"><i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                {/foreach}
                {/if}                                                            
            </tbody>
        </table>    
    </div> 

    <div class="col-md-12">
        <div class="col-md-10 col-sm-6 col-xs-12">
            <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar">
                <i class="fa fa-save"></i> Guardar
            </button><i class="load"></i>
            <a class="btn btn-social btn-danger m-close" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
            <input class="b-fase" type="hidden" name="idsede" value="{if isset($id)}{$id}{/if}" />
        </div>
    </div>
    </form>
</div>