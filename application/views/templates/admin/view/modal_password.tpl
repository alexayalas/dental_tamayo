                <div class="row">
                    <div class="col-md-12">
                        <div class="direct-chat-msg">
                            <div class='direct-chat-info clearfix'>
                                <span class='direct-chat-name pull-left'>{if isset($emp_fullname)}{$emp_fullname}{/if}</span>
                                <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
                            </div>
                            <img class="direct-chat-img" src="{if isset($emp_imagen)}{$emp_imagen}{/if}" />
                            <div class="direct-chat-text">
                                Recuerda, los espacion con <i class="fa fa-asterisk text-red"></i> son obligatorios
                            </div>
                        </div>
                    </div>
                        
                    <form action="{$base_url}admin/usuario/accion_password" class="form" method="POST">
                            <div class="response"></div>
                            
                            <div class="col-md-offset-3 col-md-6">
                                <div class="form-group has-feedback">
                                    <label> Usuario:</label>
                                    <input type="text" class="form-control"  name="usuario" value="{if isset($usuario)}{$usuario}{/if}" readonly="" />
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Nueva Password:</label>
                                    <input type="password" class="form-control"  name="password" value="{if isset($password)}{$password}{/if}" />
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Confirmar Password:</label>
                                    <input type="password" class="form-control"  name="repassword" value="{if isset($repassword)}{$repassword}{/if}" />
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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