<?php /* Smarty version 3.1.27, created on 2017-03-14 08:29:04
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_correo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:32040950358c7f02092c9d4_75626190%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab084977dce9dca25903e15bf46f2ee52e388447' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_correo.tpl',
      1 => 1480691674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32040950358c7f02092c9d4_75626190',
  'variables' => 
  array (
    'base_url' => 0,
    'emp_today' => 0,
    'nombre' => 0,
    'listaCorreo' => 0,
    'co' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c7f0209fe7c1_19932177',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c7f0209fe7c1_19932177')) {
function content_58c7f0209fe7c1_19932177 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '32040950358c7f02092c9d4_75626190';
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
admin/correo/accion" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-10">
        <div class="col-md-10">
            <div class="form-group has-feedback">
                <label><i class="fa fa-asterisk fa-xs text-red"></i> Correo:</label>
                <input type="text" class="form-control scorreo"  name="e" value="<?php if (isset($_smarty_tpl->tpl_vars['nombre']->value)) {
echo $_smarty_tpl->tpl_vars['nombre']->value;
}?>" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
        </div>
        <a class="btn btn-sm btn-success add-alt" style="margin-top: 28px;"><i class="fa fa-plus"></i></a>

    </div> 

    <div class="col-md-12">
        <table width="100%" class="table" id="table-item">
            <tbody>
                <tr style="height: 40px;background: rgba(60, 141, 188, 0.72);color: #fff;">
                    <td width="40%" style="text-align: center;">Lista de Correos</td>
                    <td width="10%" style="text-align: center;"></td>
                </tr>
                <?php if (isset($_smarty_tpl->tpl_vars['listaCorreo']->value)) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['listaCorreo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['co'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['co']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['co']->value) {
$_smarty_tpl->tpl_vars['co']->_loop = true;
$foreach_co_Sav = $_smarty_tpl->tpl_vars['co'];
?>
                    <tr class="item-<?php echo $_smarty_tpl->tpl_vars['co']->value['correo'];?>
" style="height: 40px;">
                        <td style="text-align: center;">
                            <input name="ecorreo[]" value="<?php echo $_smarty_tpl->tpl_vars['co']->value['correo'];?>
" class="form-control" type="text">
                            <input name="idecorreo[]" value="<?php echo $_smarty_tpl->tpl_vars['co']->value['idcorreo'];?>
" class="form-control" type="hidden">
                        </td>
                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-danger delete-co" data-id="<?php echo $_smarty_tpl->tpl_vars['co']->value['idsedecorreo'];?>
" data-toggle="tooltip" title="Eliminar Correo"><i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['co'] = $foreach_co_Sav;
}
?>
                <?php }?>                                                            
            </tbody>
        </table>    
    </div> 

    <div class="col-md-12">
        <div class="col-md-10 col-sm-6 col-xs-12">
            <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar">
                <i class="fa fa-save"></i> Guardar
            </button><i class="load"></i>
            <a class="btn btn-social btn-danger m-close" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
            <input class="b-fase" type="hidden" name="idsede" value="<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {
echo $_smarty_tpl->tpl_vars['id']->value;
}?>" />
        </div>
    </div>
    </form>
</div><?php }
}
?>