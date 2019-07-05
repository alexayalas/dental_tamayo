<?php /* Smarty version 3.1.27, created on 2019-07-05 15:49:22
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\view\home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:144695d1fb7d2174a85_70926094%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ed2dec57afb7df988b9e9d08afa3a4cc38e9ef5' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\view\\home.tpl',
      1 => 1562359758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144695d1fb7d2174a85_70926094',
  'variables' => 
  array (
    'slider' => 0,
    'base_url' => 0,
    'sl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1fb7d22f85c6_47447009',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1fb7d22f85c6_47447009')) {
function content_5d1fb7d22f85c6_47447009 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '144695d1fb7d2174a85_70926094';
?>
<div class="home-slider clearfix">
    <div class="flexslider loading">
        <ul class="slides">
           
            <?php if (isset($_smarty_tpl->tpl_vars['slider']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['slider']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sl'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sl']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['sl']->value) {
$_smarty_tpl->tpl_vars['sl']->_loop = true;
$foreach_sl_Sav = $_smarty_tpl->tpl_vars['sl'];
?>
                <li>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/slider/<?php echo $_smarty_tpl->tpl_vars['sl']->value['imagen'];?>
"  alt="<?php echo $_smarty_tpl->tpl_vars['sl']->value['titulo1'];?>
"/>
                    <div class="content-wrapper clearfix">
                        <div class="container">
                            <div class="slide-content clearfix display-bg">
                                <h1><?php echo $_smarty_tpl->tpl_vars['sl']->value['titulo1'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['sl']->value['titulo2'];?>
</span></h1>
                                <p><?php echo $_smarty_tpl->tpl_vars['sl']->value['subtitulo'];?>
</p>
                            </div>
                        </div>
                    </div>
                </li>  
            <?php
$_smarty_tpl->tpl_vars['sl'] = $foreach_sl_Sav;
}
?>
            <?php }?>

        </ul>
    </div>
</div>


<div class="home-features clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <div class="features-intro clearfix">
                    <h2>Dental Tamayo <span>Su Clínica Dental de Confianza</span></h2>

                    <p>Más de 20 años y miles de sonrisas alrededor del Perú nos respaldan como la primera y mejor Clínica Dental del pais. ¡Compruébalo tu mismo!</p>
                    <a class="read-more" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/cita-en-linea">¡Reserva tu Cita en Línea!</a>                
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 ">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-medkit"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/especialidades/">Conoce nuestras Especialidades</a>                                </h3>
                                <p>Cada uno de nuestros Odontólogos destaca en su especialidad, porque para nosotros es importante brindarte calidez humana junto con tecnología de punta.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-ambulance"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/emergencias/">Atención 24 Horas</a>                                </h3>
                                <p>Llámanos al (01) 441-3000 y visítanos en Av. Arequipa 4105, Miraflores a toda hora, todos los días.</p>
                            </div>
                        </div>
                    </div>
                    <div class="visible-lg clearfix"></div>
                    <div class="visible-md clearfix"></div>
                    <div class="visible-sm clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-building-o"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/sedes/">30+ Sedes y Contando</a>                                </h3>
                                <p>En todo el Perú, crecemos año tras año buscando cada día estar más cerca a ti.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-credit-card"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/servicios/multident-card/">Multident Card</a>                                </h3>
                                <p>Empieza a disfrutar de múltiples beneficios para ti y 6 familiares, inscríbete en todas nuestras sedes.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalPresentacion" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content m-content" style="min-height:500px;border-radius: 0px;max-width: 500px;">
            <!--<div class="modal-header" style="border-bottom: 0px">
                <h4 class="modal-title mo-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>-->
            <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="" class="img-responsive img-home">
				<a class="fancybox fan-home" id="mul" rel="group">
                    <img class="img-home" alt="">
                </a>
            </div>
        </div>
    </div>
</div><?php }
}
?>