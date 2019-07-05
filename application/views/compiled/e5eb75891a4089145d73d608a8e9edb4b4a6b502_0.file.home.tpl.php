<?php /* Smarty version 3.1.27, created on 2019-07-04 09:24:50
         compiled from "C:\xampp5\htdocs\WebMultident\httpdocs\application\views\templates\admin\view\home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:179365d1e0c3215ba56_54073708%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5eb75891a4089145d73d608a8e9edb4b4a6b502' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\WebMultident\\httpdocs\\application\\views\\templates\\admin\\view\\home.tpl',
      1 => 1562189659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179365d1e0c3215ba56_54073708',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1e0c32166589_97376880',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1e0c32166589_97376880')) {
function content_5d1e0c32166589_97376880 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '179365d1e0c3215ba56_54073708';
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