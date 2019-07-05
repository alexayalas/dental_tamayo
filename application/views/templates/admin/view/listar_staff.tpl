<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li class="active"><a href="{$base_url}admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="{$base_url}admin/staff/listar"><i class="fa fa-list"></i> Lista de Staff</a></li>
        </ol>
        <a data-url="{$base_url}admin/staff/agregar" class="btn btn-social btn-success m-add"><i class="fa fa-plus"></i> Nuevo</a>
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
                                        <th style="text-align: center">Imagen</th>
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Especialidad</th>
                                        <th style="text-align: center">Sede</th>
                                        <th style="text-align: center">Accion</th>
                                    </tr>
                                </thead>
                                   
                                {if isset($lista)}
                                {foreach $lista as $l}
                                        <tr class="resultado">
                                            <td>{$l.numero}</td>
                                            <td>
                                                <img src="{$l.imagen}" class="img-circle" style="width:100px; height:100px;border: 1px solid #00B3E7 ">
                                            </td>
                                            <td>{$l.nombre}</td>
                                            <td>{$l.especialidad}</td>
                                            <td>{$l.sede}</td>
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
