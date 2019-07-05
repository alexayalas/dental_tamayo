<?php /* Smarty version 3.1.27, created on 2018-04-02 08:11:16
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_datos_formulario.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20846233805ac22bf425d899_75036913%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '920faf7c71e51588164d906c054f42422beb9baf' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_datos_formulario.tpl',
      1 => 1481571986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20846233805ac22bf425d899_75036913',
  'variables' => 
  array (
    'taller' => 0,
    'km' => 0,
    'horas' => 0,
    'costo' => 0,
    'f_realizacion' => 0,
    'usuario' => 0,
    'comentario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5ac22bf4341145_37278960',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5ac22bf4341145_37278960')) {
function content_5ac22bf4341145_37278960 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20846233805ac22bf425d899_75036913';
?>
                    <div class="box-body">
                        <div style="padding-left: 20px; padding-right: 20px;" class="form-group has-feedback">
                            <div class=" table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <!--<tr>
                                        <td><strong> Taller </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['taller']->value;?>
</td>
                                        <td><strong> KM Actual </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['km']->value;?>
</td>
                                    </tr>
                                    <tr>
                                        <td><strong> Horas Taller </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['horas']->value;?>
</td>
                                        <td><strong> Costo </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['costo']->value;?>
</td>
                                    </tr>
                                    <tr>
                                        <td><strong> Fecha Realizacion</strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['f_realizacion']->value;?>
</td>
                                        <td><strong> Registrado por </strong></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</td>
                                    </tr>-->
                                    <tr class="text-center">
                                        <td><strong> Comentario </strong></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['comentario']->value;?>
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