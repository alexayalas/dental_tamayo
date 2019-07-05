<?php /* Smarty version 3.1.27, created on 2017-03-14 08:28:41
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_sede.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:158530974658c7f009d45545_60090776%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a5554e8d942836ebd51f5ba65703fcf59e22d19' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_sede.tpl',
      1 => 1482770952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158530974658c7f009d45545_60090776',
  'variables' => 
  array (
    'emp_today' => 0,
    'base_url' => 0,
    'origen' => 0,
    'codigo' => 0,
    'nombre' => 0,
    'direccion' => 0,
    'telefono' => 0,
    'latitud' => 0,
    'longitud' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c7f009e057c6_19106817',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c7f009e057c6_19106817')) {
function content_58c7f009e057c6_19106817 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '158530974658c7f009d45545_60090776';
?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="direct-chat-msg">
                            <div class='direct-chat-info clearfix'>
                                <span class='direct-chat-timestamp pull-right'><?php if (isset($_smarty_tpl->tpl_vars['emp_today']->value)) {
echo $_smarty_tpl->tpl_vars['emp_today']->value;
}?></span>
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
                        
                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/sede/accion" class="form" method="POST">
                            <div class="response"></div>
                            
                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Origen:</label>
                                    <?php if (isset($_smarty_tpl->tpl_vars['origen']->value)) {
echo $_smarty_tpl->tpl_vars['origen']->value;
}?>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Codigo Interno:</label>
                                    <input type="text" class="form-control"  name="codigo" value="<?php if (isset($_smarty_tpl->tpl_vars['codigo']->value)) {
echo $_smarty_tpl->tpl_vars['codigo']->value;
}?>" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div> 

                            <div class="col-md-9">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Nombre:</label>
                                    <input type="text" class="form-control"  name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['nombre']->value)) {
echo $_smarty_tpl->tpl_vars['nombre']->value;
}?>" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Dirección:</label>
                                    <input type="text" class="form-control"  name="direccion" value="<?php if (isset($_smarty_tpl->tpl_vars['direccion']->value)) {
echo $_smarty_tpl->tpl_vars['direccion']->value;
}?>" />
                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Telefono:</label>
                                    <input type="text" class="form-control"  name="telefono" value="<?php if (isset($_smarty_tpl->tpl_vars['telefono']->value)) {
echo $_smarty_tpl->tpl_vars['telefono']->value;
}?>" />
                                    <span class="fa fa-phone form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Latitud:</label>
                                    <input type="text" class="form-control"  name="latitud" value="<?php if (isset($_smarty_tpl->tpl_vars['latitud']->value)) {
echo $_smarty_tpl->tpl_vars['latitud']->value;
}?>" />
                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Longitud:</label>
                                    <input type="text" class="form-control"  name="longitud" value="<?php if (isset($_smarty_tpl->tpl_vars['longitud']->value)) {
echo $_smarty_tpl->tpl_vars['longitud']->value;
}?>" />
                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                </div>
                            </div>                       
                                            
                            <div class="col-md-12">
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar">
                                        <i class="fa fa-save"></i> Guardar
                                    </button><i class="load"></i>
                                    <a class="btn btn-social btn-danger m-close" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
                                    <input class="b-fase" type="hidden" name="id" value="<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {
echo $_smarty_tpl->tpl_vars['id']->value;
}?>" />
                                </div>
                            </div>
                        </form>
                    </div><?php }
}
?>