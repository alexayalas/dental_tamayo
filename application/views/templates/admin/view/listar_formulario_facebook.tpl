<div class="content-wrapper">
    <section class="content-header">
        
        <ol class="breadcrumb">
            <li class="active"><a href="{$base_url}admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="{$base_url}admin/formulario_web/listar"><i class="fa fa-list"></i> Solicitudes web</a></li>
        </ol>
        
        <div class="col-md-12">
            <div class="col-md-2">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control datepicker efi"  name="fi" value="" placeholder="Fecha de Inicio" />
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control datepicker eff"  name="fi" value="" placeholder="Fecha de Fin" />
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-3">
                <a class="btn btn-social btn-success export-form-fa"><i class="fa fa-file-excel-o"></i>Exportar</a>
            </div>
        </div>
         

        

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
                                        <th style="text-align: center">Nombres y Apellidos</th>
                                        <th style="text-align: center">Email</th>
                                        <th style="text-align: center">Telefono</th>
                                        <th style="text-align: center">Referencia</th>
                                        <th style="text-align: center">Especialidad</th>
                                        <th style="text-align: center">Sede</th>
                                        <th style="text-align: center">Dirección Sede</th>
                                        <th style="text-align: center">Fecha Registro</th>
                                        <th style="text-align: center">Fecha Cita</th>
                                        <th style="text-align: center">Accion</th>
                                    </tr>
                                 </thead>
                                   
                                    {if isset($lista)}
                                    {foreach $lista as $l}
                                        <tr class="resultado">
                                            <td>{$l.numero}</td>
                                            <td>{$l.nombre}</td>
                                            <td>{$l.email}</td>
                                            <td>{$l.telefono}</td>
                                            <td>{$l.referencia}</td>
                                            <td>{$l.especialidad}</td>
                                            <td>{$l.sede}</td>
                                            <td>{$l.direccion}</td>
                                            <td>{$l.f_registro}</td>
                                            <td>{$l.f_cita}</td>
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
