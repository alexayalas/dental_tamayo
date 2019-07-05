<div class="content-wrapper">
    <section class="content-header">
        
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li class="active"><a href="{$base_url}admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="{$base_url}admin/pregunta/listar"><i class="fa fa-list"></i> Listado de Preguntas</a></li>
        </ol>
        <a href="{$base_url}admin/pregunta/agregar" class="btn btn-social btn-success"><i class="fa fa-plus"></i> Nuevo</a>
    </section>
    <section class="content">
        <div class="response"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">{$titulo}</h3>
                    </div>
                    <div class="box-body table-responsive">

                        <div class="direct-chat-msg">
                                 <table class="table table-bordered table-hover table-responsive" style="text-align: center">
                                    <tr class="tr-lista" style="text-align: center;">
                                        <th style="width: 35px; text-align: center;">N°</th>
                                        <th style="text-align: center">Descripcion</th>
                                        <th style="text-align: center">Alternativas</th>
                                        <th style="text-align: center">Orden</th>
                                        <th style="text-align: center">Accion</th>
                                    </tr>
                                    {if isset($lista)}
                                    {foreach $lista as $l}
                                        <tr class="resultado">
                                            <td>{$l.numero}</td>
                                            <td>{$l.nombre}</td>
                                            <td>
                                                <ul>
                                                    {if !empty($l.alternativa)}
                                                    {foreach $l.alternativa as $alt}
                                                        <li>{$alt['alternativa']}</li>
                                                    {/foreach}{/if}
                                                </ul>
                                            </td>
                                            <td>{$l.orden}</td>
                                            <td>{$l.accion}</td>
                                        </tr>                                       
                                    {/foreach}
                                    {else}
                                        <tr>
                                            <td colspan="10">No se encontraron registros...</td>
                                        </tr>
                                    {/if}
                                </table>
                                {if isset($paginacion)}{$paginacion}{/if}
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
