<?php /* Smarty version 3.1.27, created on 2018-08-25 00:07:39
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/congreso.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5078125595b80e41bf25594_28700757%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6296164bdd40dbf4e5555719d836f9e77e38fab9' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/congreso.tpl',
      1 => 1535173506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5078125595b80e41bf25594_28700757',
  'variables' => 
  array (
    'lista' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5b80e41c09f0b5_59734035',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b80e41c09f0b5_59734035')) {
function content_5b80e41c09f0b5_59734035 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5078125595b80e41bf25594_28700757';
?>
<style>
	.btnPor{
		color: #000;
	}
	#filaPlanDental{
		display: none;
	}
    .b_coctel_acomp{
        display: none;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        
        font-size: 20px !important;
    }

</style>

<div class="container">

	<div class="row">
		<div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">LISTA DE PARTICIPANTES DEL CONGRESO </h3>
                        <legend></legend>
                    </div>
                    <div class="box-body">

                        <div class="direct-chat-msg table-responsive">
                            <table class="table table-bordered table-hover example-table" style="text-align: center">
                                <thead>
                                    <tr class="tr-lista" style="text-align: center;">
                                        <th style="width: 35px; text-align: center;">N°</th>
                                        
                                        <th style="text-align: center">Nombre</th>
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
                                            <td style="font-size: 20px;"><?php echo $_smarty_tpl->tpl_vars['l']->value['item'];?>
</td>
                                            <td style="font-size: 20px;"><?php echo $_smarty_tpl->tpl_vars['l']->value['entidad'];?>
</td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['l']->value['asistio'] == '1') {?>
                                                    <a class="btn btn-success b_congreso_marcar_no_asistencia" data-id="<?php echo $_smarty_tpl->tpl_vars['l']->value['idcongreso'];?>
" data-estado="<?php echo $_smarty_tpl->tpl_vars['l']->value['asistio'];?>
">ASISTIO</a>
                                                    <a class="btn btn-success b_coctel_acomp">marcar con acompañante</a>
                                                <?php } else { ?>
                                                    <a class="btn btn-danger b_congreso_marcar_asistencia" data-id="<?php echo $_smarty_tpl->tpl_vars['l']->value['idcongreso'];?>
" data-estado="<?php echo $_smarty_tpl->tpl_vars['l']->value['asistio'];?>
">marcar asistencia</a>
                                                    <a class="btn btn-success b_coctel_acomp">marcar con acompañante</a>
                                                <?php }?>
                                                
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
</div>




<?php }
}
?>