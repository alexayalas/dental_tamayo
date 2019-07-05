<?php /* Smarty version 3.1.27, created on 2018-05-25 17:51:11
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/coberturas_mltd.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5627375765b08935fe5ba16_86299673%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef21f6e23ae5737da2bf1df16b7d036f9731d88b' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/coberturas_mltd.tpl',
      1 => 1527287907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5627375765b08935fe5ba16_86299673',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5b08935feee748_19144666',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b08935feee748_19144666')) {
function content_5b08935feee748_19144666 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5627375765b08935fe5ba16_86299673';
?>
<style>
	.btnPor{
		color: #000;
	}
	#filaPlanDental{
		display: none;
	}
</style>

<div class="container">
	<div class="row text-center">
		<div class="col-md-offset-3 col-md-6" style="margin-top: 30px">
			<!-- <h2>Verificación Semefa</h2> -->
			<div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                	<button type="button" class="btn btn-default btnPor active" id="btnSemefa">Semefa</button>
                </div>
                <div class="btn-group" role="group">
                	<button type="button" class="btn btn-default btnPor" id="btnPD">Plan Dental</button>
                </div>
            </div>
		</div>

		<div id="filaSemefa">
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

		<div id="filaPlanDental">
			<div class="col-md-12">
				<h2>Verificación Plan Dental</h2> 
			</div>
			
			<div class="col-md-12">
				<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/accion_plan_dental" class="form" method="POST">
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
</div>
<?php }
}
?>