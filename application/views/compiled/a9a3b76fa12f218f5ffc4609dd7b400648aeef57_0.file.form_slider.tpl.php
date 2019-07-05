<?php /* Smarty version 3.1.27, created on 2018-11-08 14:08:40
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/form_slider.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20965327955be489b8701343_26769449%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9a3b76fa12f218f5ffc4609dd7b400648aeef57' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/form_slider.tpl',
      1 => 1482506346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20965327955be489b8701343_26769449',
  'variables' => 
  array (
    'tipo' => 0,
    'base_url' => 0,
    'id' => 0,
    'titulo' => 0,
    'emp_today' => 0,
    'titulo1' => 0,
    'titulo2' => 0,
    'subtitulo' => 0,
    'imagen' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5be489b88b7e35_99722225',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5be489b88b7e35_99722225')) {
function content_5be489b88b7e35_99722225 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20965327955be489b8701343_26769449';
?>
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 25px">
        <?php if ($_smarty_tpl->tpl_vars['tipo']->value == 'agregar') {?>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/slider/agregar"><i class="fa fa-plus"></i> Agregar Imagen para Slider</a></li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/slider/editar/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><i class="fa fa-pencil"></i> Editar Imagen para Slider</a></li>
            </ol>
        <?php }?>
    </section>

    <section class="content">
        <div class="row">    

            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Recomendación técnica.</h4>
                    <ul>
                        <li>
                            Recuerde respetar el tamaño de la imagen de 2000 x 800 pixeles para poder obtener una mejor presentación en la pagina web.
                        </li>
                        <li>
                            La cantidad de caracteres para el titulo debe ser maximo de : 50 caracteres
                        </li>
                        <li>
                            La cantidad de caracteres para el titulo debe ser maximo de : 50 caracteres
                        </li>
                    </ul>
                        
                </div>  
            </div>
    
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
                    </div>
                    <div class="box-body"> 
                        <div class="direct-chat-msg">
                            <div class='direct-chat-info clearfix'>
                                <span class='direct-chat-timestamp pull-right'><?php if (isset($_smarty_tpl->tpl_vars['emp_today']->value)) {
echo $_smarty_tpl->tpl_vars['emp_today']->value;
}?></span>
                            </div>
                        </div>   

                        <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/slider/accion" class="form" method="POST">
                            <div class="response"></div>

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Titulo:</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  name="titulo1" value="<?php if (isset($_smarty_tpl->tpl_vars['titulo1']->value)) {
echo $_smarty_tpl->tpl_vars['titulo1']->value;
}?>" placeholder="texto sin negrita" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  name="titulo2" value="<?php if (isset($_smarty_tpl->tpl_vars['titulo2']->value)) {
echo $_smarty_tpl->tpl_vars['titulo2']->value;
}?>" placeholder="texto que va ir en negrita" />
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Subtitulo:</label>
                                    <input type="text" class="form-control"  name="subtitulo" value="<?php if (isset($_smarty_tpl->tpl_vars['subtitulo']->value)) {
echo $_smarty_tpl->tpl_vars['subtitulo']->value;
}?>" maxlength="50" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div> 

                            <div class="col-md-7" style="margin-bottom: 15px;">
                                <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen <span class="text-red">[tamaño de 2000 x 800 px]</span></label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Examinar... <input type="file" name="imagen" />
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['imagen']->value)) {
echo $_smarty_tpl->tpl_vars['imagen']->value;
}?>" readonly />
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
                                </div>
                                <?php if (isset($_smarty_tpl->tpl_vars['imagen']->value)) {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/slider/<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" style="width: 200px;margin-top: 5px">
                                <?php }?>
                            </div> 
         
                            <div class="col-md-12">
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar">
                                        <i class="fa fa-save"></i> Guardar
                                    </button><i class="load"></i>
                                    <a href="javascript:history.back(1)" class="btn btn-social btn-danger" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
                                    <input type="hidden" name="id" value="<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {
echo $_smarty_tpl->tpl_vars['id']->value;
}?>" />
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    
</div>

<?php }
}
?>