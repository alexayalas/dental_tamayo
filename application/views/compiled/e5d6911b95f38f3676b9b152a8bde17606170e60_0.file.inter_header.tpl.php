<?php /* Smarty version 3.1.27, created on 2019-07-05 15:26:25
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\structure\inter_header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:49165d1fb271f1dc69_69545104%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5d6911b95f38f3676b9b152a8bde17606170e60' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\structure\\inter_header.tpl',
      1 => 1562358381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49165d1fb271f1dc69_69545104',
  'variables' => 
  array (
    'base_url' => 0,
    'active1' => 0,
    'active2' => 0,
    'active4' => 0,
    'active6' => 0,
    'active7' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1fb272051b65_63459894',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1fb272051b65_63459894')) {
function content_5d1fb272051b65_63459894 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '49165d1fb271f1dc69_69545104';
?>
<body>
	<!-- Google Tag Manager (noscript) -->
	
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2NC25"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	
	<!-- End Google Tag Manager (noscript) -->
	
    <div class="header-top clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12  text-right">
                    <p>
                        Horario : <span>Lunes a Sábados - 8am a 8pm</span><br class="visible-xs" />&nbsp;&nbsp;Contáctenos : <span>+51 (01) 273-3333</span> 
						<!--<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/login_streaming" class="btn btn-xs btn-danger btn-stre"><i class="fa fa-video-camera"></i> Streaming</a>-->
                    </p>
                </div>
            </div>
        </div>
    </div>

    <header id="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Website Logo -->
                    <div class="logo clearfix">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/logo/logo-tamayo.png" alt="Multident" class="logo-mltd"/>
                        </a>
                    </div>

                    <!-- Main Navigation -->
                    <nav class="main-menu">
                        <ul id="menu-main-menu" class="header-nav clearfix">
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active1']->value)) {
echo $_smarty_tpl->tpl_vars['active1']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site"><i class="fa fa-home fa-fw"></i>Inicio</a>
                            </li>
                                
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active2']->value)) {
echo $_smarty_tpl->tpl_vars['active2']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/nosotros"><i class="fa fa-group fa-fw"></i>Nosotros</a>
                            </li>
                            
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active4']->value)) {
echo $_smarty_tpl->tpl_vars['active4']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/especialidades"><i class="fa fa-medkit fa-fw"></i>Especialidades</a>
                            </li>
                            
                            <li  class="<?php if (isset($_smarty_tpl->tpl_vars['active6']->value)) {
echo $_smarty_tpl->tpl_vars['active6']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blogs"><i class="fa fa-edit fa-fw"></i>Blog</a>
                            </li>
                            
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active7']->value)) {
echo $_smarty_tpl->tpl_vars['active7']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/cita-en-linea"><i class="fa fa-calendar fa-fw"></i>Cita en Línea</a>
                            </li>

                        </ul>
                    </nav>

                    <div id="responsive-menu-container"></div>

                </div>
            </div>
        </div>
    </header>

<?php }
}
?>