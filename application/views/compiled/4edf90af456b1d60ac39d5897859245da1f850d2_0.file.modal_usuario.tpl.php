<?php /* Smarty version 3.1.27, created on 2017-06-13 18:07:31
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_usuario.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:196397448459407033437b22_54276139%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4edf90af456b1d60ac39d5897859245da1f850d2' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_usuario.tpl',
      1 => 1497394757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196397448459407033437b22_54276139',
  'variables' => 
  array (
    'emp_today' => 0,
    'base_url' => 0,
    'nombre' => 0,
    'usuario' => 0,
    'tipo' => 0,
    'password' => 0,
    'repassword' => 0,
    'nivel' => 0,
    'sede' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_594070334fd1d2_58907099',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_594070334fd1d2_58907099')) {
function content_594070334fd1d2_58907099 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '196397448459407033437b22_54276139';
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
                        
                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/usuario/accion" class="form" method="POST">
                            <div class="response"></div>
                            
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Nombres:</label>
                                    <input type="text" class="form-control"  name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['nombre']->value)) {
echo $_smarty_tpl->tpl_vars['nombre']->value;
}?>" />
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Usuario:</label>
                                    <input type="text" class="form-control"  name="usuario" value="<?php if (isset($_smarty_tpl->tpl_vars['usuario']->value)) {
echo $_smarty_tpl->tpl_vars['usuario']->value;
}?>" />
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                            </div>

                            <?php if ($_smarty_tpl->tpl_vars['tipo']->value == 'agregar') {?>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Password:</label>
                                    <input type="password" class="form-control"  name="password" value="<?php if (isset($_smarty_tpl->tpl_vars['password']->value)) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>" />
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Confirmar Password:</label>
                                    <input type="password" class="form-control"  name="repassword" value="<?php if (isset($_smarty_tpl->tpl_vars['repassword']->value)) {
echo $_smarty_tpl->tpl_vars['repassword']->value;
}?>" />
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                            </div>
                            <?php }?>                            

                            <div class="col-xs-6 col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Nivel de Usuario:</label>
                                    <?php if (isset($_smarty_tpl->tpl_vars['nivel']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['nivel']->value;?>

                                    <?php } else { ?>
                                    <select name="nivel" id="nivel" class="form-control selectpicker">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>  
						
							<div class="col-xs-6 col-md-6 cbxsede">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Sede:</label>
                                    <?php if (isset($_smarty_tpl->tpl_vars['sede']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['sede']->value;?>

                                    <?php } else { ?>
                                    <select name="sede" id="sede" class="form-control selectpicker">
                                        <option value="">Seleccione una Opción</option>
                                        </select>
                                    <?php }?>
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