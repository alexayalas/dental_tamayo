<?php /* Smarty version 3.1.27, created on 2019-02-21 15:33:47
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_password.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20691558825c6f0b2bab6b27_91290031%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccaa6cc8834da982967b4f4f131f18c48debe667' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_password.tpl',
      1 => 1477502210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20691558825c6f0b2bab6b27_91290031',
  'variables' => 
  array (
    'emp_fullname' => 0,
    'emp_today' => 0,
    'emp_imagen' => 0,
    'base_url' => 0,
    'usuario' => 0,
    'password' => 0,
    'repassword' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c6f0b2bbafc72_03753146',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c6f0b2bbafc72_03753146')) {
function content_5c6f0b2bbafc72_03753146 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20691558825c6f0b2bab6b27_91290031';
?>
                <div class="row">

                    <div class="col-md-12">

                        <div class="direct-chat-msg">

                            <div class='direct-chat-info clearfix'>

                                <span class='direct-chat-name pull-left'><?php if (isset($_smarty_tpl->tpl_vars['emp_fullname']->value)) {
echo $_smarty_tpl->tpl_vars['emp_fullname']->value;
}?></span>

                                <span class='direct-chat-timestamp pull-right'><?php if (isset($_smarty_tpl->tpl_vars['emp_today']->value)) {
echo $_smarty_tpl->tpl_vars['emp_today']->value;
}?></span>

                            </div>

                            <img class="direct-chat-img" src="<?php if (isset($_smarty_tpl->tpl_vars['emp_imagen']->value)) {
echo $_smarty_tpl->tpl_vars['emp_imagen']->value;
}?>" />

                            <div class="direct-chat-text">

                                Recuerda, los espacion con <i class="fa fa-asterisk text-red"></i> son obligatorios

                            </div>

                        </div>

                    </div>

                        

                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/usuario/accion_password" class="form" method="POST">

                            <div class="response"></div>

                            

                            <div class="col-md-offset-3 col-md-6">

                                <div class="form-group has-feedback">

                                    <label> Usuario:</label>

                                    <input type="text" class="form-control"  name="usuario" value="<?php if (isset($_smarty_tpl->tpl_vars['usuario']->value)) {
echo $_smarty_tpl->tpl_vars['usuario']->value;
}?>" readonly="" />

                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group has-feedback">

                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Nueva Password:</label>

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