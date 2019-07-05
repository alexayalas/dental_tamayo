<?php /* Smarty version 3.1.27, created on 2017-03-15 09:08:13
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_historial_accesos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:113355048058c94acd3510b0_99669234%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95533644989a4eb187fa3efd82c67dde385e8bc6' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_historial_accesos.tpl',
      1 => 1482335896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113355048058c94acd3510b0_99669234',
  'variables' => 
  array (
    'base_url' => 0,
    'titulo' => 0,
    'lista' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c94acd397db7_82032851',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c94acd397db7_82032851')) {
function content_58c94acd397db7_82032851 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '113355048058c94acd3510b0_99669234';
?>
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 25px">
        <ol class="breadcrumb" >
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/acceso/listar"><i class="fa fa-list"></i> Historial de accesos</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="response"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
                    </div>
                    <div class="box-body">

                    <div class="direct-chat-msg table-responsive">
                        <table class="table table-bordered table-hover example-table" style="text-align: center">
                            <thead>
                                <tr class="tr-lista" style="text-align: center;">
                                    <th style="width: 35px; text-align: center;">N°</th>
                                    <th style="text-align: center">Usuario</th>
                                    <th style="text-align: center">Accion</th>
                                    <th style="text-align: center">IP</th>
                                    <th style="text-align: center">Fecha Registro</th>
                                </tr>
                            </thead>
                                   
                            <?php if (isset($_smarty_tpl->tpl_vars['lista']->value)) {?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['lista']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['l']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
$foreach_l_Sav = $_smarty_tpl->tpl_vars['l'];
?>
                                    <?php if ($_smarty_tpl->tpl_vars['l']->value['tipo'] == '1') {?>
                                    <tr class="resultado" style="background: #9ff790;">
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['usuario'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['accion'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['ip'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_registro'];?>
</td>
                                    </tr> 
                                    <?php } else { ?>
                                    <tr class="resultado" style="background: #fffc8c;">
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['usuario'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['accion'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['ip'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_registro'];?>
</td>
                                    </tr> 
                                    <?php }?>                                      
                                <?php
$_smarty_tpl->tpl_vars['l'] = $foreach_l_Sav;
}
?>
                            <?php }?>
                            </table>

                                
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<div id="modalContenido" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="tituloModal" class="modal-title"></h4>
            </div>
            <div id="modalContenidoBody" class="modal-body">
            </div>
        </div>
    </div>
</div>
<?php }
}
?>