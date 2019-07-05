<?php /* Smarty version 3.1.27, created on 2018-01-10 23:26:13
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_referencia.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:735819305a56e765aff070_49369817%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b108519bff8c8e457372f9a89c9118547a586dba' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_referencia.tpl',
      1 => 1479854784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '735819305a56e765aff070_49369817',
  'variables' => 
  array (
    'emp_today' => 0,
    'base_url' => 0,
    'nombre' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a56e765c86ae5_99098228',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a56e765c86ae5_99098228')) {
function content_5a56e765c86ae5_99098228 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '735819305a56e765aff070_49369817';
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
admin/referencia/accion" class="form" method="POST">
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