<?php /* Smarty version 3.1.27, created on 2018-10-17 10:51:50
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_convenio.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13874614925bc75a968f9534_92332662%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2faa2a3b6ac937107be3f0b56b7d3a69a2fe29c' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_convenio.tpl',
      1 => 1479935624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13874614925bc75a968f9534_92332662',
  'variables' => 
  array (
    'base_url' => 0,
    'emp_today' => 0,
    'nombre' => 0,
    'imagen' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5bc75a96a39c65_10049928',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5bc75a96a39c65_10049928')) {
function content_5bc75a96a39c65_10049928 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13874614925bc75a968f9534_92332662';
?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/js/scripts.js"><?php echo '</script'; ?>
>
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
admin/convenio/accion" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Nombre:</label>
            <input type="text" class="form-control"  name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['nombre']->value)) {
echo $_smarty_tpl->tpl_vars['nombre']->value;
}?>" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
    </div> 

    <div class="col-md-10" style="margin-bottom: 15px;">
        <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Examinar... <input type="file" name="imagen" />
                </span>
            </span>
            <input type="text" class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['imagen']->value)) {
echo $_smarty_tpl->tpl_vars['imagen']->value;
}?>" readonly />
            <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
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