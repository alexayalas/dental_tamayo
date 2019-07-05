<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 20px">
        
        <ol class="breadcrumb">
            <li class="active"><a href="{$base_url}admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="{$base_url}admin/suscriptor/listar"><i class="fa fa-list"></i> Suscriptores</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="response"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">{$titulo}</h3>
                    </div>
                    <div class="box-body">

                        <div class="direct-chat-msg table-responsive">
                                 <table class="table table-bordered table-hover example-table" style="text-align: center">
                                 <thead>
                                    <tr class="tr-lista" style="text-align: center;">
                                        <th style="width: 35px; text-align: center;">N°</th>
                                        <th style="text-align: center">Nombres</th>
                                        <th style="text-align: center">Email</th>
                                        <th style="text-align: center">IP</th>
                                        <th style="text-align: center">Fecha Registro</th>
                                        <th style="text-align: center">Confirmacion</th>
                                        <th style="text-align: center">Accion</th>
                                    </tr>
                                 </thead>
                                   
                                    {if isset($lista)}
                                    {foreach $lista as $l}
                                        <tr class="resultado">
                                            <td>{$l.numero}</td>
                                            <td>{$l.nombre}</td>
                                            <td>{$l.email}</td>
                                            <td>{$l.ip}</td>
                                            <td>{$l.f_registro}</td>
                                            {if $l.confirmar == '1'}
                                                <td><span class="label label-success">SI</span></td>
                                            {else}
                                                <td><span class="label label-danger">NO</span></td>
                                            {/if}
                                            
                                            <td>{$l.accion}</td>
                                        </tr>                                       
                                    {/foreach}
                                    {/if}
                                </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<div id="modalContenido" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="tituloModal" class="modal-title"></h4>
            </div>
            <div id="modalContenidoBody" class="modal-body">
            </div>
        </div>
    </div>
</div>
