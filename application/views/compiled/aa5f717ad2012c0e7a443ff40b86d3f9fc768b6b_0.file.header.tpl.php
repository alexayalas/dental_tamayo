<?php /* Smarty version 3.1.27, created on 2019-07-06 09:55:41
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\admin\structure\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:180665d20b66dce1467_49502846%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa5f717ad2012c0e7a443ff40b86d3f9fc768b6b' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\admin\\structure\\header.tpl',
      1 => 1562189624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180665d20b66dce1467_49502846',
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'base_url' => 0,
    'favicon_logo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d20b66de265e9_09239005',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d20b66de265e9_09239005')) {
function content_5d20b66de265e9_09239005 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '180665d20b66dce1467_49502846';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $_smarty_tpl->tpl_vars['titulo_pagina']->value;?>
</title>
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/favicon/<?php if (isset($_smarty_tpl->tpl_vars['favicon_logo']->value)) {
echo $_smarty_tpl->tpl_vars['favicon_logo']->value;
}?>" type="image/icon" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/bootstrap/css/bootstrap.min.css">
        <?php echo '<script'; ?>
> var base_url = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";<?php echo '</script'; ?>
>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/font-awesome/css/font-awesome.min.css">

        <!-- Theme Style -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/theme/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/theme/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/css/estilos.css" rel="stylesheet" type="text/css" />

        <!-- ############# DATEPICKER ############# -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jqueryui/1.11.2/jquery-ui.css" rel="stylesheet" type="text/css" />

        <!-- TAGS -->
        <link type="text/css" href="http://fonts.googleapis.com/css?family=Brawler" rel="stylesheet" />
        <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/tags/css/jquery.tagit.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/tags/css/tagit.ui-zendesk.css" rel="stylesheet" />

        <!-- ############# DATEPICKER ############# -->
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datetimepicker/jquery-ui.css" />
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datetimepicker/jquery-ui-timepicker-addon.css" />
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datatable/css/dataTables.bootstrap.min.css" />
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jasny-bootstrap-fileinput/css/jasny-bootstrap-fileinput.min.css">
        <!-- JQUERY -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
>
        
        <!-- SWEETALERT -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/sweetalert-master/dist/sweetalert-dev.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/sweetalert-master/dist/sweetalert.css" type="text/css">


    </head>
<?php }
}
?>