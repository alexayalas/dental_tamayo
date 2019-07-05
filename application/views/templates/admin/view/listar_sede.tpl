<div class="content-wrapper">
    <section class="content-header">
        
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li class="active"><a href="{$base_url}admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="{$base_url}admin/sede/listar"><i class="fa fa-list"></i> Listado de Sedes</a></li>
        </ol>
        <a data-url="{$base_url}admin/sede/agregar" class="btn btn-social btn-success m-add"><i class="fa fa-plus"></i> Nuevo</a>
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
                                {if $emp_grade == '4' || $emp_grade == '3'}
                                <table class="table table-bordered table-hover example-table" style="text-align: center">
                                 <thead>
                                    <tr class="tr-lista" style="text-align: center;">
                                        <th style="width: 35px; text-align: center;">N°</th>
                                        <th style="text-align: center">Origen</th>
                                        <th style="text-align: center">Codigo Interno</th>
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Dirección</th>
                                        <th style="text-align: center">Telefono</th>
                                        <th style="text-align: center">Fecha Registro</th>
                                        <th style="text-align: center">Accion</th>
                                    </tr>
                                 </thead>
                                   
                                    {if isset($lista)}
                                    {foreach $lista as $l}
                                        <tr class="resultado">
                                            <td>{$l.numero}</td>
                                            <td>{$l.origen}</td>
                                            <td>{$l.codigo}</td>
                                            <td>{$l.nombre}</td>
                                            <td>{$l.direccion}</td>
                                            <td>{$l.telefono}</td>
                                            <td>{$l.f_registro}</td>
                                            <td>{$l.accion}</td>
                                        </tr>                                       
                                    {/foreach}
                                    {/if}
                                </table>
                                {else}
                                <table class="table table-bordered table-hover example-table" style="text-align: center">
                                 <thead>
                                    <tr class="tr-lista" style="text-align: center;">
                                        <th style="width: 35px; text-align: center;">N°</th>
                                        <th style="text-align: center">Origen</th>
                                        <th style="text-align: center">Codigo Interno</th>
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Dirección</th>
                                        <th style="text-align: center">Telefono</th>
                                        <th style="text-align: center">Fecha Registro</th>
                                        <th style="text-align: center">Directo</th>
                                        <th style="text-align: center">Accion</th>
                                    </tr>
                                 </thead>
                                   
                                    {if isset($lista)}
                                    {foreach $lista as $l}
                                        <tr class="resultado">
                                            <td>{$l.numero}</td>
                                            <td>{$l.origen}</td>
                                            <td>{$l.codigo}</td>
                                            <td>{$l.nombre}</td>
                                            <td>{$l.direccion}</td>
                                            <td>{$l.telefono}</td>
                                            <td>{$l.f_registro}</td>
                                            <td>
                                                {if $l.directo == '1'}
                                                    <span class="label label-success">SI</span>
                                                {else}
                                                    <span class="label label-danger">NO</span>
                                                {/if}
                                            </td>
                                            <td>{$l.accion}</td>
                                        </tr>                                       
                                    {/foreach}
                                    {/if}
                                </table>
                                {/if}

                                
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
