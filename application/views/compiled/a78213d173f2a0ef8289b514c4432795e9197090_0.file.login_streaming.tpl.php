<?php /* Smarty version 3.1.27, created on 2017-03-13 14:44:14
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/login_streaming.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16799446858c6f68e3cf969_06322316%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a78213d173f2a0ef8289b514c4432795e9197090' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/login_streaming.tpl',
      1 => 1489434052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16799446858c6f68e3cf969_06322316',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c6f68e3e7a49_65138930',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c6f68e3e7a49_65138930')) {
function content_58c6f68e3e7a49_65138930 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16799446858c6f68e3cf969_06322316';
?>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <h2>Panel de Acceso para Streaming</h2>
        </div>
        <div class="col-md-12">
            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/login" class="form" method="POST">
                <div class="response"></div>
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-group has-feedback">
                        <label></label>
                        <input type="text" class="form-control frm-regist"  name="correo" value="" placeholder="ingrese su usuario"  />
                        <span class="fa fa-user form-control-feedback gly-regist"></span>
                    </div>
                </div>

                <div class="col-md-offset-3 col-md-6">
                    <div class="form-group has-feedback">
                        <label></label>
                        <input type="password" class="form-control frm-regist"  name="password" value="" placeholder="ingrese su contraseña" />
                        <span class="fa fa-lock form-control-feedback gly-regist"></span>
                    </div>
                </div>


                <div class="col-md-12 text-center">
                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Verificar">
                        <i class="fa fa-sign-in"></i> Ingresar</button><i class="load"></i>

                    <button type="reset" class="btn btn-social btn-primary btn-regist" data-toggle="tooltip" title="Limpiar">
                        <i class="fa fa-refresh"></i> Limpiar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
?>