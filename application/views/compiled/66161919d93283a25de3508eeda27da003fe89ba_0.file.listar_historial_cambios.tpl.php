<?php /* Smarty version 3.1.27, created on 2017-03-15 09:08:14
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_historial_cambios.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:212234395658c94ace25f3c3_10216569%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66161919d93283a25de3508eeda27da003fe89ba' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_historial_cambios.tpl',
      1 => 1482870870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212234395658c94ace25f3c3_10216569',
  'variables' => 
  array (
    'base_url' => 0,
    'titulo' => 0,
    'lista' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c94ace2b6fd2_86975409',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c94ace2b6fd2_86975409')) {
function content_58c94ace2b6fd2_86975409 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '212234395658c94ace25f3c3_10216569';
?>
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 25px">
        <ol class="breadcrumb" >
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/cambios/listar"><i class="fa fa-list"></i> Historial de cambios</a></li>
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
                                    <th style="text-align: center">Modulo</th>
                                    <th style="text-align: center">Accion</th>
                                    <th style="text-align: center">Usuario responsable</th>
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
                                    <tr class="resultado" style="background: green;color:#fff">
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['modulo'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['descripcion'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['usuario'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_registro'];?>
</td>
                                    </tr> 
                                    <?php } elseif ($_smarty_tpl->tpl_vars['l']->value['tipo'] == '2') {?>
                                    <tr class="resultado" style="background: yellow;">
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['modulo'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['descripcion'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['usuario'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_registro'];?>
</td>
                                    </tr> 
                                    <?php } else { ?>
                                    <tr class="resultado" style="background: red; color:#fff">
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['modulo'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['descripcion'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['usuario'];?>
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