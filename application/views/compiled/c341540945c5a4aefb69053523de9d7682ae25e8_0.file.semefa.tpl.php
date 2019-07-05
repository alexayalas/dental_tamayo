<?php /* Smarty version 3.1.27, created on 2017-03-13 16:07:05
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/semefa.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28239281658c709f924d870_81366644%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c341540945c5a4aefb69053523de9d7682ae25e8' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/semefa.tpl',
      1 => 1487720271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28239281658c709f924d870_81366644',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c709f92f8fb9_13281074',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c709f92f8fb9_13281074')) {
function content_58c709f92f8fb9_13281074 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '28239281658c709f924d870_81366644';
?>
<div class="container">
	<div class="row text-center">
		<div class="col-md-12">
			<h2>Verificación Semefa</h2>
		</div>
		<div class="col-md-12">
			<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/accion_semefa" class="form" method="POST">
            	<div class="response"></div>
            	<div class="col-md-offset-3 col-md-6">
	            	<div class="form-group has-feedback">
	            		<label>Ingrese Documento de Identidad</label>
	                    <input type="text" class="form-control frm-regist"  name="documento" value=""  />
	                    <span class="fa fa-user form-control-feedback gly-regist"></span>
	                </div>
                </div>

                <div class="col-md-12 text-center">
                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Verificar">
                        <i class="fa fa-check"></i> Verificar</button><i class="load"></i>

                    <button type="reset" class="btn btn-social btn-primary btn-regist" data-toggle="tooltip" title="Limpiar">
                        <i class="fa fa-refresh"></i> Limpiar</button>
            	</div>
            </form>
		</div>
	</div>
</div>
<?php }
}
?>