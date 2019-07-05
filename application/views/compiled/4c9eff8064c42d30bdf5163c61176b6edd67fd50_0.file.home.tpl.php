<?php /* Smarty version 3.1.27, created on 2017-03-14 08:28:28
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:67003965458c7effc86e2f4_27605674%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c9eff8064c42d30bdf5163c61176b6edd67fd50' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/home.tpl',
      1 => 1479852978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67003965458c7effc86e2f4_27605674',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c7effc8c2b48_17977305',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c7effc8c2b48_17977305')) {
function content_58c7effc8c2b48_17977305 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '67003965458c7effc86e2f4_27605674';
?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<div class="content-wrapper">
    <section class="content-header">
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                            <h3 class="box-title">Bienvenido</h3>
                    </div>
                    <div class="box-body">
                    	Bienvenido a su panel de administración
                    </div>
                </div>    
            </div>
        </div>
    </section>

</div>

<?php }
}
?>