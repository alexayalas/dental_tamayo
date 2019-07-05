<?php /* Smarty version 3.1.27, created on 2019-07-04 09:19:01
         compiled from "C:\xampp5\htdocs\WebMultident\httpdocs\application\views\templates\web\structure\inter_header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:117565d1e0ad56c3ce1_29499132%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '781bd63581c24ce00e0fc7a4e0e953509bcdc372' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\WebMultident\\httpdocs\\application\\views\\templates\\web\\structure\\inter_header.tpl',
      1 => 1562189670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117565d1e0ad56c3ce1_29499132',
  'variables' => 
  array (
    'base_url' => 0,
    'active1' => 0,
    'active2' => 0,
    'active3' => 0,
    'active4' => 0,
    'active5' => 0,
    'active6' => 0,
    'active7' => 0,
    'active8' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1e0ad56f9a59_51026008',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1e0ad56f9a59_51026008')) {
function content_5d1e0ad56f9a59_51026008 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '117565d1e0ad56c3ce1_29499132';
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
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/login_streaming" class="btn btn-xs btn-danger btn-stre"><i class="fa fa-video-camera"></i> Streaming</a>
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
public/imagen/logo/logo-25.png" alt="Multident" class="logo-mltd"/>
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
site/nosotros"><i class="fa fa-flag fa-fw"></i>Nosotros</a>
                                <ul class="sub-menu">
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/nosotros/reconocimientos">Reconocimientos</a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/nosotros/franquicias">Franquicias</a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/nosotros/convenios">Convenios</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active3']->value)) {
echo $_smarty_tpl->tpl_vars['active3']->value;
}?>">
                                <a href="#"><i class="fa fa-stethoscope fa-fw"></i>Servicios</a>
                                <ul class="sub-menu">
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/emergencias">Emergencias 24 horas</a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/plan-dental">Plan Dental</a>
                                    </li>
									
                                    <!--  RENOMBRE ACÁ PARA QUITAR SONRISA PERFECTA DE LA WEB
									<li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/sonrisa-perfecta">Sonrisa Perfecta</a>
                                    </li>
									-->  
									
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/multident-card">Multident Card</a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/multident-kids">Multident Kids</a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/multident-novias">Multident Novias</a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/dental-tour-peru">Dental Tour Perú</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active4']->value)) {
echo $_smarty_tpl->tpl_vars['active4']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/especialidades"><i class="fa fa-star fa-fw"></i>Especialidades</a>
                            </li>
                            
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active5']->value)) {
echo $_smarty_tpl->tpl_vars['active5']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/sedes"><i class="fa fa-map-marker fa-fw"></i>Sedes</a>
                            </li>
                            
                            <li  class="<?php if (isset($_smarty_tpl->tpl_vars['active6']->value)) {
echo $_smarty_tpl->tpl_vars['active6']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blogs"><i class="fa fa-file-text fa-fw"></i>Blog</a>
                            </li>
                            
                            <li class="<?php if (isset($_smarty_tpl->tpl_vars['active7']->value)) {
echo $_smarty_tpl->tpl_vars['active7']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/cita-en-linea"><i class="fa fa-calendar fa-fw"></i>Cita en Línea</a>
                            </li>

                            <!--<li class="<?php if (isset($_smarty_tpl->tpl_vars['active8']->value)) {
echo $_smarty_tpl->tpl_vars['active8']->value;
}?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/nosotros/franquicias"><i class="fa fa-building fa-fw"></i>Franquicias</a>
                            </li>-->
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