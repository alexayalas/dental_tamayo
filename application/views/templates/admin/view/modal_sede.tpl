                <div class="row">
                    <div class="col-md-12">
                        <div class="direct-chat-msg">
                            <div class='direct-chat-info clearfix'>
                                <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-info"></i> Observación.</h4>
                            <ul>
                                <li>
                                    Para poder obtener las coordenadas para generar la ubicación de la sede en el mapa debera ingresar al siguiente link :  <a href="http://www.coordenadas-gps.com/" target="_blanl">Obtener coordenadas</a>
                                </li>
                            </ul>
                                
                        </div>  
                    </div>
                        
                    <form action="{$base_url}admin/sede/accion" class="form" method="POST">
                            <div class="response"></div>
                            
                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Origen:</label>
                                    {if isset($origen)}{$origen}{/if}
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Codigo Interno:</label>
                                    <input type="text" class="form-control"  name="codigo" value="{if isset($codigo)}{$codigo}{/if}" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div> 

                            <div class="col-md-9">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Nombre:</label>
                                    <input type="text" class="form-control"  name="nombre" value="{if isset($nombre)}{$nombre}{/if}" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Dirección:</label>
                                    <input type="text" class="form-control"  name="direccion" value="{if isset($direccion)}{$direccion}{/if}" />
                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Telefono:</label>
                                    <input type="text" class="form-control"  name="telefono" value="{if isset($telefono)}{$telefono}{/if}" />
                                    <span class="fa fa-phone form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Latitud:</label>
                                    <input type="text" class="form-control"  name="latitud" value="{if isset($latitud)}{$latitud}{/if}" />
                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Longitud:</label>
                                    <input type="text" class="form-control"  name="longitud" value="{if isset($longitud)}{$longitud}{/if}" />
                                    <span class="fa fa-map-marker form-control-feedback"></span>
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