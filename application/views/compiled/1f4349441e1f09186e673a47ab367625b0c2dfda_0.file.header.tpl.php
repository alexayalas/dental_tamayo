<?php /* Smarty version 3.1.27, created on 2019-07-05 08:19:42
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\structure\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:237625d1f4e6e0a1c04_20456123%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f4349441e1f09186e673a47ab367625b0c2dfda' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\structure\\header.tpl',
      1 => 1562189671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237625d1f4e6e0a1c04_20456123',
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'descripcion' => 0,
    'base_url' => 0,
    'f_titulo' => 0,
    'f_descripcion' => 0,
    'f_imagen' => 0,
    'f_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1f4e6e1cc459_00666762',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1f4e6e1cc459_00666762')) {
function content_5d1f4e6e1cc459_00666762 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '237625d1f4e6e0a1c04_20456123';
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="es-ES"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="es-ES"><![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html>
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_smarty_tpl->tpl_vars['titulo_pagina']->value;?>
</title>
        <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
">
        <meta name="author" content="MULTIDENT">
        <meta name="keywords" content="">
        
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/favicon/favicon.ico" type="image/x-icon" />
        <!-- METAS PARA FACEBOOK -->
        <meta property="fb:admins" content="94846763717" />
        <meta property="article:publisher" content="MULTIDENT" />
        <meta property="og:type" content="article" />
        <meta property="og:site_name" content="MULTIDENT" />
        <meta property="og:title" content="<?php if (isset($_smarty_tpl->tpl_vars['f_titulo']->value)) {
echo $_smarty_tpl->tpl_vars['f_titulo']->value;
}?>" />
        <meta property="og:description" content="<?php if (isset($_smarty_tpl->tpl_vars['f_descripcion']->value)) {
echo $_smarty_tpl->tpl_vars['f_descripcion']->value;
}?>"/>
        <meta property="og:image" content="<?php if (isset($_smarty_tpl->tpl_vars['f_imagen']->value)) {
echo $_smarty_tpl->tpl_vars['f_imagen']->value;
}?>"/>
        <meta property="og:url" content="<?php if (isset($_smarty_tpl->tpl_vars['f_url']->value)) {
echo $_smarty_tpl->tpl_vars['f_url']->value;
}?>"/>
        <!--BOOTSTRAP-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/bootstrap/css/bootstrap.min.css">

        <!--GLYPHICONS-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/font-awesome/css/font-awesome.min.css">
        
        <!--ESTILOS-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/web/css/estilo.css?v=1.0">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/web/css/estilo_base.css?v=1.1">

        <link rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/css/meanmenu.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins//css/custom-responsive.css' type='text/css' media='all' />
        <!--SLIDER -->
        <link  rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/css/flexslider.css' type='text/css' media='all' />

        <link rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/google-map/css/mappress.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/fancy/source/jquery.fancybox.css' type='text/css' media='all' />

       <link rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/fancybox/css/fancybox/jquery.fancybox-buttons' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/fancybox/css/fancybox/jquery.fancybox-thumbs.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/fancybox/css/fancybox/jquery.fancybox.css' type='text/css' media='all' />
		
        <?php echo '<script'; ?>
 type='text/javascript'>mapp = {data : []};<?php echo '</script'; ?>
>


        <!-- ############# DATEPICKER ############# -->
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datetimepicker/jquery-ui.css" />
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datetimepicker/jquery-ui-timepicker-addon.css" />
		
		<!-- Google Tag Manager -->
		
		<?php echo '<script'; ?>
>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-P2NC25');<?php echo '</script'; ?>
>
		
		<!-- End Google Tag Manager -->
		
		<!-- Facebook Pixel Code -->
		
		<?php echo '<script'; ?>
>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		 fbq('init', '149798685684281'); 
		fbq('track', 'PageView');
		<?php echo '</script'; ?>
>
		<noscript>
		 <img height="1" width="1" 
		src="https://www.facebook.com/tr?id=149798685684281&ev=PageView
		&noscript=1"/>
		</noscript>
		
		<!-- End Facebook Pixel Code -->


        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datatable/css/dataTables.bootstrap.min.css">
        

    </head><?php }
}
?>