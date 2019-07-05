<?php /* Smarty version 3.1.27, created on 2018-03-08 18:19:38
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_especialidad.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1641742335aa1c50a6d1812_60460566%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ecde72536c564f2a395ad8a7bf427a848cec12e' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_especialidad.tpl',
      1 => 1479856592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1641742335aa1c50a6d1812_60460566',
  'variables' => 
  array (
    'emp_today' => 0,
    'base_url' => 0,
    'nombre' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5aa1c50a859bf9_88627948',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5aa1c50a859bf9_88627948')) {
function content_5aa1c50a859bf9_88627948 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1641742335aa1c50a6d1812_60460566';
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
admin/especialidad/accion" class="form" method="POST">
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