<?php /* Smarty version 3.1.27, created on 2017-08-10 10:00:03
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_formulario_helpingdent.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1758293282598c74f3ae3bd3_97837604%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36c30f979f77bd3dca2275a0826c08cd6ec37418' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_formulario_helpingdent.tpl',
      1 => 1502377163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1758293282598c74f3ae3bd3_97837604',
  'variables' => 
  array (
    'base_url' => 0,
    'titulo' => 0,
    'lista' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_598c74f3bcba01_40245168',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_598c74f3bcba01_40245168')) {
function content_598c74f3bcba01_40245168 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1758293282598c74f3ae3bd3_97837604';
?>
<div class="content-wrapper">
    <section class="content-header">
        
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/formulario_helpingdent/listar"><i class="fa fa-list"></i> Solicitudes web</a></li>
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
                <a class="btn btn-social btn-success export-form-helping"><i class="fa fa-file-excel-o"></i>Exportar</a>
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
                                        <th style="text-align: center">Nombres y Apellidos</th>
                                        <th style="text-align: center">Email</th>
                                        <th style="text-align: center">Telefono</th>
                                        <th style="text-align: center">Especialidad</th>
                                        <th style="text-align: center">Sede</th>
										<th style="text-align: center">Direccion Sede</th>
                                        <th style="text-align: center">Fecha Registro</th>
                                        <th style="text-align: center">Fecha Cita</th>
                                        <th style="text-align: center">Accion</th>
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
                                        <tr class="resultado">
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['numero'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['nombre'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['email'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['telefono'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['especialidad'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['sede'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['l']->value['direccion'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_registro'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_cita'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['accion'];?>
</td>
                                        </tr>                                       
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