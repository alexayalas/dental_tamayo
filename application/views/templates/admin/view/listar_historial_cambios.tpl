<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 25px">
        <ol class="breadcrumb" >
            <li class="active"><a href="{$base_url}admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="{$base_url}admin/cambios/listar"><i class="fa fa-list"></i> Historial de cambios</a></li>
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
                                    <th style="text-align: center">Modulo</th>
                                    <th style="text-align: center">Accion</th>
                                    <th style="text-align: center">Usuario responsable</th>
                                    <th style="text-align: center">Fecha Registro</th>
                                </tr>
                            </thead>
                                   
                            {if isset($lista)}
                                {foreach $lista as $l}
                                    {if $l.tipo == '1'}
                                    <tr class="resultado" style="background: green;color:#fff">
                                        <td>{$l.numero}</td>
                                        <td>{$l.modulo}</td>
                                        <td>{$l.descripcion}</td>
                                        <td>{$l.usuario}</td>
                                        <td>{$l.f_registro}</td>
                                    </tr> 
                                    {elseif $l.tipo == '2'}
                                    <tr class="resultado" style="background: yellow;">
                                        <td>{$l.numero}</td>
                                        <td>{$l.modulo}</td>
                                        <td>{$l.descripcion}</td>
                                        <td>{$l.usuario}</td>
                                        <td>{$l.f_registro}</td>
                                    </tr> 
                                    {else}
                                    <tr class="resultado" style="background: red; color:#fff">
                                        <td>{$l.numero}</td>
                                        <td>{$l.modulo}</td>
                                        <td>{$l.descripcion}</td>
                                        <td>{$l.usuario}</td>
                                        <td>{$l.f_registro}</td>
                                    </tr> 
                                    {/if}                                      
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
