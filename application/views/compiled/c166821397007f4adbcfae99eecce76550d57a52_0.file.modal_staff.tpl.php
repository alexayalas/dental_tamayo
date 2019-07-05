<?php /* Smarty version 3.1.27, created on 2017-06-13 18:00:25
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_staff.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:126954908759406e89d1c164_78047353%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c166821397007f4adbcfae99eecce76550d57a52' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/modal_staff.tpl',
      1 => 1497394553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126954908759406e89d1c164_78047353',
  'variables' => 
  array (
    'base_url' => 0,
    'nombre' => 0,
    'especialidad' => 0,
    'cop' => 0,
    'descripcion' => 0,
    'emp_grade' => 0,
    'sede' => 0,
    'imagen' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59406e89d6a355_34126626',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59406e89d6a355_34126626')) {
function content_59406e89d6a355_34126626 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '126954908759406e89d1c164_78047353';
?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/js/scripts.js"><?php echo '</script'; ?>
>

<div class="row">
                        
    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/staff/accion" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Nombre del Especialista:</label>
            <input type="text" class="form-control"  name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['nombre']->value)) {
echo $_smarty_tpl->tpl_vars['nombre']->value;
}?>" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Especialidad:</label>
            <input type="text" class="form-control"  name="especialidad" value="<?php if (isset($_smarty_tpl->tpl_vars['especialidad']->value)) {
echo $_smarty_tpl->tpl_vars['especialidad']->value;
}?>" />
            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> COP:</label>
            <input type="text" class="form-control"  name="cop" value="<?php if (isset($_smarty_tpl->tpl_vars['cop']->value)) {
echo $_smarty_tpl->tpl_vars['cop']->value;
}?>" />
            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk fa-xs text-red"></i> Decripcion:</label>
            <textarea class="form-control" name="descripcion" rows="4"><?php if (isset($_smarty_tpl->tpl_vars['descripcion']->value)) {
echo $_smarty_tpl->tpl_vars['descripcion']->value;
}?></textarea>
        </div>
    </div> 

    <?php if ($_smarty_tpl->tpl_vars['emp_grade']->value == '1' || $_smarty_tpl->tpl_vars['emp_grade']->value == '2' || $_smarty_tpl->tpl_vars['emp_grade']->value == '3') {?>
    <div class="col-xs-6 col-md-6">
        <div class="form-group has-feedback">
            <label><i class="fa fa-asterisk text-red"></i> Sede:</label>
            <?php if (isset($_smarty_tpl->tpl_vars['sede']->value)) {?>
            <?php echo $_smarty_tpl->tpl_vars['sede']->value;?>

            <?php } else { ?>
            <select name="sede" id="sede" class="form-control selectpicker">
                <option value="">Seleccione una Opción</option>
                </select>
            <?php }?>
        </div>
    </div> 
    <?php }?>
    

    <div class="col-md-10" style="margin-bottom: 15px;">
        <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen</label>
    </div> 

    <div class="col-md-12">
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <?php if (isset($_smarty_tpl->tpl_vars['imagen']->value)) {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" />
                    <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/usuario/empty.png" alt="...">                     
                    <?php }?>
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <div>
                    <span class="btn btn-primary btn-file"><span class="fileinput-new">Seleccionar Imagen</span><span class="fileinput-exists">Change</span><input type="file" name="imagen"></span>
                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Quitar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-10 col-sm-6 col-xs-12">
            <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar">
                <i class="fa fa-save"></i> Guardar
            </button><i class="load"></i>
            <a class="btn btn-social btn-danger m-close" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
            <input class="b-fase" type="hidden" name="id" value="<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {
echo $_smarty_tpl->tpl_vars['id']->value;
}?>" />
        </div>
    </div>
    </form>
</div><?php }
}
?>