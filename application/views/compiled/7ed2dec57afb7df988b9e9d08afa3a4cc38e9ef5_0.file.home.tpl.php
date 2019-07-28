<?php /* Smarty version 3.1.27, created on 2019-07-24 15:03:54
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\view\home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:223905d38b9aa010246_49356738%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ed2dec57afb7df988b9e9d08afa3a4cc38e9ef5' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\view\\home.tpl',
      1 => 1563998631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223905d38b9aa010246_49356738',
  'variables' => 
  array (
    'slider' => 0,
    'base_url' => 0,
    'sl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d38b9aa08d893_84614428',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d38b9aa08d893_84614428')) {
function content_5d38b9aa08d893_84614428 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '223905d38b9aa010246_49356738';
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
                    <h2>Nuestra Satistacción... <br/><span>Su Felicidad...</span></h2>

                    <p>Clínica Dental Tamayo a cargo de la Dr. Tatiana Quevedo Tamayo, quien cuenta con más de 20 años de experiencia en Estética y Salud Dental, tiempo el cual viene mejorando la sonrisa de todos sus pacientes en el distrito de San Borja.</p>
                    <p>Estamos comprometidos con brindarles un servicio personalizado de excelente calidad y con resultados en los tratamientos que son nuestra mejor carta de presentación.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 ">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-tags"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3 class="color-blue">
                                    Prevención
                                </h3>
                                <p>Cuida tus dientes. Cepíllate siempre y después de cada alimento. Usa hilo dental. Una sana costumbre para que tus dientes te duren toda la vida.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-tags"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3 class="color-blue">
                                    Detección
                                </h3>
                                <p>Visita al dentista por lo menos dos veces al año. Más vale una revisión profesional para evitar males posteriores.</p>
                            </div>
                        </div>
                    </div>
                    <div class="visible-lg clearfix"></div>
                    <div class="visible-md clearfix"></div>
                    <div class="visible-sm clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-tags"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3 class="color-blue">
                                    Solución
                                </h3>
                                <p>Cuando tengas dolor o malestar dental, visita de inmediato al dentista. La atención profesional siempre será la mejor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="features-intro clearfix">
                            <a class="read-more col-md-12 text-center" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/cita-en-linea">¡Reserva tu Cita en Línea!</a>                
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