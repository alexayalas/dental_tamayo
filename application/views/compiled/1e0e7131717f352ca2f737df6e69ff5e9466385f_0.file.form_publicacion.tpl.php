<?php /* Smarty version 3.1.27, created on 2018-10-11 15:01:45
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/form_publicacion.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17336824375bbfac2917af71_11039580%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e0e7131717f352ca2f737df6e69ff5e9466385f' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/form_publicacion.tpl',
      1 => 1483459406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17336824375bbfac2917af71_11039580',
  'variables' => 
  array (
    'base_url' => 0,
    'tipo' => 0,
    'id' => 0,
    'titulo2' => 0,
    'emp_today' => 0,
    'categoria' => 0,
    'autor' => 0,
    'titulo' => 0,
    'titulo_seo' => 0,
    'desccorta' => 0,
    'descgeneral' => 0,
    'imagen' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5bbfac293510b7_98949219',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5bbfac293510b7_98949219')) {
function content_5bbfac293510b7_98949219 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17336824375bbfac2917af71_11039580';
?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 25px">
        <?php if ($_smarty_tpl->tpl_vars['tipo']->value == 'agregar') {?>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/publicacionPublicación/agregar"><i class="fa fa-plus"></i> Agregar Publicación</a></li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/publicacion/editar/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><i class="fa fa-pencil"></i> Editar Publicación</a></li>
            </ol>
        <?php }?>
    </section>

    <section class="content">
        <div class="row">    

            <!--<div class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Recomendación técnica.</h4>
                        Coordinar con su diseñador gráfico o programador web la configuración de las fotos de su personal administrativo y odontológico con el fin de optimizar la calidad del servicio y del producto. La características de todas las fotos serán las siguiente: Altura 150 pixeles, ancho 150 pixeles, el peso de promedio entre cada fotografía debe oscilar entre 1 o 2 mb, así mismo el rostro en la foto al menos 75 al 80% de la fotografía. 
                </div>  
            </div>-->
    
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['titulo2']->value;?>
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
admin/publicacion/accion" class="form" method="POST">
                            <div class="response"></div>

                            <div class="col-xs-10 col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Categoria:</label>
                                    <?php if (isset($_smarty_tpl->tpl_vars['categoria']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>

                                    <?php } else { ?>
                                    <select name="categoria" id="categoria" class="form-control selectpicker">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                    <?php }?>
                                </div>
                            </div> 

                            <div class="col-xs-10 col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Autor:</label>
                                    <?php if (isset($_smarty_tpl->tpl_vars['autor']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['autor']->value;?>

                                    <?php } else { ?>
                                    <select name="autor" id="autor" class="form-control selectpicker">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>  

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Titulo:</label>
                                    <input type="text" class="form-control"  name="titulo" value="<?php if (isset($_smarty_tpl->tpl_vars['titulo']->value)) {
echo $_smarty_tpl->tpl_vars['titulo']->value;
}?>" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Titulo para SEO:</label>
                                    <input type="text" class="form-control"  name="titulo_seo" value="<?php if (isset($_smarty_tpl->tpl_vars['titulo_seo']->value)) {
echo $_smarty_tpl->tpl_vars['titulo_seo']->value;
}?>" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Descripción corta:</label>
                                    <textarea class="form-control" name="desccorta">
                                    <?php if (isset($_smarty_tpl->tpl_vars['desccorta']->value)) {
echo $_smarty_tpl->tpl_vars['desccorta']->value;
}?></textarea>
                                    <?php echo '<script'; ?>
>CKEDITOR.replace('desccorta', {skin: 'office2013'});<?php echo '</script'; ?>
>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Descripción General:</label>
                                    <textarea class="form-control" name="descgeneral">
                                    <?php if (isset($_smarty_tpl->tpl_vars['descgeneral']->value)) {
echo $_smarty_tpl->tpl_vars['descgeneral']->value;
}?></textarea>
                                    <?php echo '<script'; ?>
>CKEDITOR.replace('descgeneral', {skin: 'office2013'});<?php echo '</script'; ?>
>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom: 15px;">
                                <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen <span class="text-red">[tamaño de 732 x 346 px]</span></label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Examinar... <input type="file" name="imagen"/>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['imagen']->value)) {
echo $_smarty_tpl->tpl_vars['imagen']->value;
}?>" readonly />
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="glyphicon glyphicon-asterisk text-red"></i> Tags:</label>
                                    <div style="height:50px">
                                        <input type="text" id="tag" class="texto auto" readonly name="tag_publicacion" value="<?php if (isset($_smarty_tpl->tpl_vars['tag']->value)) {
echo $_smarty_tpl->tpl_vars['tag']->value;
}?>" style="display: none;" />
                                        <ul class="simple_tag"></ul>
                                    </div>
                                </div> 
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