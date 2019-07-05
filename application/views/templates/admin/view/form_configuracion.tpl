<script src="{$base_url}public/plugins/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 20px">
        {if $tipo == 'agregar'}
            <ol class="breadcrumb">
                <li class="active"><a href="{$base_url}admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="{$base_url}admin/configuracion"><i class="fa fa-cogs"></i> Panel Configuracion</a></li>
            </ol>
        {else}
            <ol class="breadcrumb">
                <li class="active"><a href="{$base_url}admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="{$base_url}admin/producto/editar/{$id}"><i class="fa fa-pencil"></i> Editar Producto</a></li>
            </ol>
        {/if}
    </section>
    <section class="content">
        <div class="row">
            <form action="{$base_url}admin/configuracion/accion" class="form" method="POST">
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title">{$titulo}</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">    
                            <div class="direct-chat-msg">
                                <div class='direct-chat-info clearfix'>
                                    <span class='direct-chat-name pull-left'>{if isset($emp_fullname)}{$emp_fullname}{/if}</span>
                                    <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
                                </div>
                                <img class="direct-chat-img" src="{if isset($emp_imagen)}{$emp_imagen}{/if}" />
                                <div class="direct-chat-text">
                                    Recuerda, los espacion con <i class="glyphicon glyphicon-asterisk text-red"></i> son obligatorios
                                </div>
                            </div>

                            <div class="response"></div>
                            <!-- -->
                            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="box box-primary box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title text-bold">Datos Principales.</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="container-fluid">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label><i class="glyphicon glyphicon-asterisk text-red"></i> Nombre de la Web:</label>
                                                        <input type="text" class="form-control" value="{$proyecto_nombre['valor']}" name="proyecto" size="70" minlenght="3" />
                                                        <span class="fa fa-pencil form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group">
				                            <label><i class="glyphicon glyphicon-asterisk text-red"></i>Logo:</label>
				                            <div class="input-group">
				                                <span class="input-group-btn">
				                                    <span class="btn btn-default btn-file">
				                                        Examinar... <input type="file" name="logo"/>
				                                    </span>
				                                </span>
				                                <input type="text" class="form-control" value="{$logo['valor']}" readonly />
				                                <div class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></div>
				                            </div>
				                            </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group">
				                            <label><i class="glyphicon glyphicon-asterisk text-red"></i>Favicon:</label>
				                            <div class="input-group">
				                                <span class="input-group-btn">
				                                    <span class="btn btn-default btn-file">
				                                        Examinar... <input type="file" name="favicon"/>
				                                    </span>
				                                </span>
				                                <input type="text" class="form-control" value="{$favicon['valor']}" readonly />
				                                <div class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></div>
				                            </div>
				                        </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label><i class="glyphicon glyphicon-asterisk text-red"></i> Script de GoogleMap:</label>
				                        <textarea type="text" class="form-control textarea" name="map" cols="100" rows="5">{$map['valor']}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="box box-primary box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title text-bold">Redes Sociales.</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="container-fluid">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label> Facebook:</label>
                                                        <input type="text" class="form-control" value="{$facebook['valor']}" name="facebook"  size="60" minlenght="3" />
                                                        <span class="fa fa-facebook form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label> Twitter:</label>
                                                        <input type="text" class="form-control" value="{$twitter['valor']}" name="twitter"   size="60" minlenght="3" />
                                                        <span class="fa fa-twitter form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label> LinkedIn:</label>
                                                        <input type="text" class="form-control" value="{$linkedin['valor']}" name="linked" size="60" minlenght="3" />
                                                        <span class="fa fa-linkedin form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="box box-primary box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title text-bold">Datos Principales.</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="container-fluid">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label><i class="glyphicon glyphicon-asterisk text-red"></i> Dirección:</label>
                                                        <input type="text" class="form-control" value="{$direccion['valor']}" name="direccion" size="60" minlenght="3" />
                                                        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label><i class="glyphicon glyphicon-asterisk text-red"></i> Telefono:</label>
                                                        <input type="text" class="form-control" value="{$telefono['valor']}" name="telefono" size="60" minlenght="3" />
                                                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label><i class="glyphicon glyphicon-asterisk text-red"></i> Correo de Contacto:</label>
                                                        <input type="text" class="form-control" value="{$correo['valor']}" name="correo" size="60" minlenght="3" />
                                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="box box-primary box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title text-bold">Datos Principales.</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="container-fluid">
                                           
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row-fluid pull-left">
                                                    <div class="form-group has-feedback">
                                                        <label><i class="glyphicon glyphicon-asterisk text-red"></i> Mensaje de Bienvenida:</label>
				                        <textarea type="text" class="form-control textarea" name="mensaje" cols="100" rows="10">{$mensaje['valor']}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            
                             
                        <div class="col-md-12">
                            <div class="col-md-offset-4 col-md-6 col-sm-6 col-xs-12">
                                <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar Cambios">
                                    <i class="fa fa-save"></i> Guardar Cambios
                                </button>
                                <input type="hidden" name="id" value="{if isset($id)}{$id}{/if}" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
</div>
