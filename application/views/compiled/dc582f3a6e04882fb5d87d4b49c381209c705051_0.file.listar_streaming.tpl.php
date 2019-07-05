<?php /* Smarty version 3.1.27, created on 2017-03-14 12:05:27
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_streaming.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:65977485758c822d74cb577_85759841%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc582f3a6e04882fb5d87d4b49c381209c705051' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_streaming.tpl',
      1 => 1489511101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65977485758c822d74cb577_85759841',
  'variables' => 
  array (
    'base_url' => 0,
    'titulo' => 0,
    'lista' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c822d7519b76_74550925',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c822d7519b76_74550925')) {
function content_58c822d7519b76_74550925 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '65977485758c822d74cb577_85759841';
?>
<div class="content-wrapper">
    <section class="content-header">
        
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/streaming/listar"><i class="fa fa-list"></i> Participantes Streaming</a></li>
        </ol>
        
        <div class="col-md-12">
            <div class="col-md-2">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control datepicker efi"  name="fi" value="" placeholder="Fecha de Inicio" />
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control datepicker eff"  name="fi" value="" placeholder="Fecha de Fin" />
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-3">
                <a class="btn btn-social btn-success export-streaming"><i class="fa fa-file-excel-o"></i>Exportar</a>
            </div>
        </div>
         

        

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
                                        <th style="text-align: center">Tipo</th>
                                        <th style="text-align: center">Nombres y Apellidos</th>
                                        <th style="text-align: center">Correo</th>
                                        <th style="text-align: center">Sede</th>
                                        <th style="text-align: center">Tipo de Registro</th>
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
                                        <?php if ($_smarty_tpl->tpl_vars['l']->value['registro'] == '1') {?>
                                            <tr class="resultado" style="color: green;">
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['tipo'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['personal'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['correo'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['sede'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['descrip'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['ip'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_registro'];?>
</td>
                                            </tr> 
                                        <?php } else { ?>
                                            <tr class="resultado" style="color: red;">
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['tipo'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['personal'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['correo'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['sede'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['l']->value['descrip'];?>
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