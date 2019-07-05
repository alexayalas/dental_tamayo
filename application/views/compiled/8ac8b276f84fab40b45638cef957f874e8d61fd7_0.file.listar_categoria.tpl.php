<?php /* Smarty version 3.1.27, created on 2017-07-03 20:07:49
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_categoria.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:553594312595aea6530fb93_65255704%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ac8b276f84fab40b45638cef957f874e8d61fd7' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/listar_categoria.tpl',
      1 => 1480364364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '553594312595aea6530fb93_65255704',
  'variables' => 
  array (
    'base_url' => 0,
    'titulo' => 0,
    'lista' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_595aea653477c5_32597457',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_595aea653477c5_32597457')) {
function content_595aea653477c5_32597457 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '553594312595aea6530fb93_65255704';
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/home"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/categoria/listar"><i class="fa fa-list"></i> Listado de Categorias</a></li>
        </ol>
        <a data-url="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/categoria/agregar" class="btn btn-social btn-success m-add"><i class="fa fa-plus"></i> Nuevo</a>
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
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Fecha de Registro</th>
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