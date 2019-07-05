<?php /* Smarty version 3.1.27, created on 2017-03-13 17:26:28
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/modal_password.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:82880611958c71c948c72b4_91610262%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd63bed5ef1d94d6b6980817a07ba9504a996c96a' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/modal_password.tpl',
      1 => 1489429139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82880611958c71c948c72b4_91610262',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c71c9495d6e6_03116703',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c71c9495d6e6_03116703')) {
function content_58c71c9495d6e6_03116703 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '82880611958c71c948c72b4_91610262';
?>
<div class="row">                       
    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/change_password" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label>Contraseña Actual:</label>
            <input type="password" class="form-control"  name="password" value="" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label>Nueva Contraseña:</label>
            <input type="password" class="form-control"  name="newpassword" value="" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label>Confirmar Contraseña:</label>
            <input type="password" class="form-control"  name="confirmarpassword" value="" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-10 col-sm-6 col-xs-12">
            <button class="btn btn-social btn-primary btn-regist save" data-toggle="tooltip" title="Guardar">
                <i class="fa fa-save"></i> Guardar
            </button><i class="load"></i>
            <a class="btn btn-social btn-danger m-close" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
        </div>
    </div>
    </form>
</div><?php }
}
?>