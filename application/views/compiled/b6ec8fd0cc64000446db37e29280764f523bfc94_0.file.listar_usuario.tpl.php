<?php /* Smarty version 3.1.27, created on 2019-07-04 09:24:56
         compiled from "C:\xampp5\htdocs\WebMultident\httpdocs\application\views\templates\admin\view\listar_usuario.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:47395d1e0c38266b46_75993365%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6ec8fd0cc64000446db37e29280764f523bfc94' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\WebMultident\\httpdocs\\application\\views\\templates\\admin\\view\\listar_usuario.tpl',
      1 => 1562189643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47395d1e0c38266b46_75993365',
  'variables' => 
  array (
    'base_url' => 0,
    'lista' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1e0c3833ae50_63612972',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1e0c3833ae50_63612972')) {
function content_5d1e0c3833ae50_63612972 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '47395d1e0c38266b46_75993365';
?>
<div class="content-wrapper">
    <section class="content-header">
        
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/usuario/listar"><i class="fa fa-list"></i> Listado de Usuarios</a></li>
        </ol>
        <a data-url="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/usuario/agregar" class="btn btn-social btn-success m-add"><i class="fa fa-plus"></i> Nuevo</a>
    </section>
    <section class="content">
        <div class="response"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Usuarios</h3>
                    </div>
                    <div class="box-body">

                        <div class="direct-chat-msg table-responsive">
                                 <table class="table table-bordered table-hover example-table" style="text-align: center">
                                 <thead>
                                    <tr class="tr-lista" style="text-align: center;">
                                        <th style="width: 35px; text-align: center;">N°</th>
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Usuario</th>
                                        <th style="text-align: center">Nivel de Usuario</th>
                                        <th style="text-align: center">Fecha Registro</th>
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
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['usuario'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['nivel'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['l']->value['f_registro'];?>
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