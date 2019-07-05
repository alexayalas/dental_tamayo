<?php /* Smarty version 3.1.27, created on 2019-07-05 15:27:10
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\view\cita_en_linea.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:194335d1fb29e1f2779_90981807%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27325a1721d28539291957536089cfa353b1ed06' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\view\\cita_en_linea.tpl',
      1 => 1562189675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194335d1fb29e1f2779_90981807',
  'variables' => 
  array (
    'base_url' => 0,
    'referencia' => 0,
    'especialidad' => 0,
    'sede' => 0,
    'origen' => 0,
    'uri' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1fb29e2cd661_21562020',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1fb29e2cd661_21562020')) {
function content_5d1fb29e2cd661_21562020 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '194335d1fb29e1f2779_90981807';
?>
<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">Cita en Línea</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix"><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Multident</a><span class="divider"></span></li><li class="active">Cita en Línea</li></ul>                </nav>
            </div>
        </div>
    </div>
</div>


<div class="blog-page default-page full-width clearfix">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-page-single clearfix">
                    <article id="post-188" class=" clearfix post-188 page type-page status-publish hentry">
                        <div class="full-width-contents">
                            <div class="entry-content" itemprop="text">
                                <h1 class="h1 text-center">Solicita Una Cita</h1>
                                <p class="h2 text-center">Ahora atendemos de Lunes a Sábado de 8am a 8pm</p>
                                <p class="text-center">Completa el formulario y nos comunicaremos contigo ¡Gracias!</p>

                                <div class="row cajon-recla">

        <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/accion_cita" class="form" method="POST" id="input-mask">
            <div class="response"></div>
                            
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control frm-regist"  name="nombre" value="" placeholder="Nombres y Apellidos..." />
                    <span class="fa fa-user form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-5">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control frm-regist"  name="email" value="" placeholder="Correo Electronico..." />
                    <span class="fa fa-at form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control frm-regist"  name="telefono" value="" placeholder="Telefono o Celular" />
                    <span class="fa fa-phone form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-4">
                <div class="form-group has-feedback">
                    <?php if (isset($_smarty_tpl->tpl_vars['referencia']->value)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['referencia']->value;?>

                    <?php } else { ?>
                    <select  name="referencia" class="form-control selectpicker" data-live-search="true">
                        <option value="">--- Como se entero ---</option>
                    
                    </select>
                    <?php }?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <?php if (isset($_smarty_tpl->tpl_vars['especialidad']->value)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['especialidad']->value;?>

                    <?php } else { ?>
                    <select  name="especialidad" class="form-control selectpicker" data-live-search="true">
                        <option value="">Seleccione una Especialidad</option>
                    </select>
                    <?php }?>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-4">
                <div class="form-group has-feedback">
                    <?php if (isset($_smarty_tpl->tpl_vars['sede']->value)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['sede']->value;?>

                    <?php } else { ?>
                    <select  name="sede" class="form-control selectpicker" data-live-search="true">
                        <option value="">Seleccione una Sede</option>                    
                    </select>
                    <?php }?>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group has-feedback">
                    <input type="text" style="padding: 0px;height:51px" class="form-control frm-regist datepicker2"  name="fecha" placeholder="Fecha"  data-inputmask="'alias': 'mm-dd-yyyy'"/>
                    <span class="fa fa-calendar form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group has-feedback">
                    <input type="text" style="padding: 0px;" class="form-control frm-regist frm-hour"  name="hora" value="" placeholder="Hora" data-inputmask="'alias': 'hh:mm'" />
                    <span class="fa fa-clock-o form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
                <div class="form-group has-feedback">
                    <textarea name="comentario" class="form-control frm-regist" rows="4" placeholder="Ingrese un comentario..."></textarea>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
                <div class="form-group has-feedback">
                    <label style="font-size: 14px;">
                        <input type="checkbox" value="1" name="terminos"> He leído, entendido y acepto los términos y condiciones de sus <a href="#" class="m-terminos"> <u>Políticas de Privacidad. </u></a>
                    </label>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
                <div class="g-recaptcha" id="Recaptcha2"></div>
            </div>

      
            <div class="col-md-12 text-center">
                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Ingresar">
                        <i class="fa fa-paper-plane"></i> Enviar</button><i class="load"></i>
                        <input type="hidden" name="origen" value="<?php if (isset($_smarty_tpl->tpl_vars['origen']->value)) {
echo $_smarty_tpl->tpl_vars['origen']->value;
}?>">
                        <input type="hidden" name="u" value="<?php if (isset($_smarty_tpl->tpl_vars['uri']->value)) {
echo $_smarty_tpl->tpl_vars['uri']->value;
}?>">
            </div>

            <div class="col-md-offset-2 col-md-10">
                <label style="color:red;font-size:12px">*La fecha y hora de la solicitud de cita va estar sujeta a disponibidad de vacantes en la sede </label>
            </div>
        </form>
    </div>
                                    </div>
                                </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }
}
?>