<?php /* Smarty version 3.1.27, created on 2017-05-09 10:57:35
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_datos_suscriptor.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17175052755911e6efe308d1_46698681%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '820c256218bd9d23b3928415300bd68cdf3dad9c' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_datos_suscriptor.tpl',
      1 => 1483047780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17175052755911e6efe308d1_46698681',
  'variables' => 
  array (
    'nombre' => 0,
    'email' => 0,
    'ip' => 0,
    'f_registro' => 0,
    'f_confirmacion' => 0,
    'procedencia' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5911e6efe929b2_51462990',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5911e6efe929b2_51462990')) {
function content_5911e6efe929b2_51462990 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17175052755911e6efe308d1_46698681';
?>
                    <div class="box-body">
                        <div style="padding-left: 20px; padding-right: 20px;" class="form-group has-feedback">
                            <div class=" table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td><strong> Nombre </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</td>
                                        <td><strong> Email </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</td>
                                    </tr>
                                    <tr>
                                        <td><strong> IP </strong></td>
                                        <td colspan="3"><?php echo $_smarty_tpl->tpl_vars['ip']->value;?>
</td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong> Fecha Registro</strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['f_registro']->value;?>
</td>
                                        <td><strong> Fecha Confirmación </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['f_confirmacion']->value;?>
</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="4"><strong> Link de Procedencia </strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><?php echo $_smarty_tpl->tpl_vars['procedencia']->value;?>
</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-10 col-sm-6 col-xs-12">
                                <a class="btn btn-social btn-danger m-close" data-type="4" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i> Cerrar</a>
                            </div>
                        </div>
                    </div><?php }
}
?>