<?php /* Smarty version 3.1.27, created on 2019-07-26 05:41:59
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\view\contactenos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:192675d3ad8f7ea8a40_70826200%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab59fafbdc1d617d92dde09f2b98b99137b21c6a' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\view\\contactenos.tpl',
      1 => 1564137716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192675d3ad8f7ea8a40_70826200',
  'variables' => 
  array (
    'base_url' => 0,
    'origen' => 0,
    'uri' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d3ad8f7f1f4e8_57881198',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d3ad8f7f1f4e8_57881198')) {
function content_5d3ad8f7f1f4e8_57881198 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '192675d3ad8f7ea8a40_70826200';
?>
<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1>Contáctenos</h1>                    
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Dental Tamayo</a><span class="divider"></span></li><li>Contáctenos</li>
                    </ul>                    
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="blog-page clearfix">
    <div class="container">
        <div class="row section-padding3">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="blog-post-listing clearfix" itemprop="mainContentOfPage" itemscope="itemscope"> 
                        <div class="row">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.167764937091!2d-77.0043423857869!3d-12.100664946198698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7d77a74561b%3A0x91661d2bfff0cd68!2sDENTAL+TAMAYO!5e0!3m2!1ses!2spe!4v1563888714322!5m2!1ses!2spe" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>                        
                        </div>                  

                </div>
            </div>                
        </div>

        <!-- Contact Form Starts -->
        <section class="contact-form section-padding3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h3 class="color-blue text-center mt-n mb-20">Contáctenos</h3>
                        <div class="d-flex">
                            <div class="into-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="info-text">
                                <h3 class="h3-contactenos mt-n mb-n color-blue">San Borja, Lima</h3>
                                <p>Av.San Borja Sur 589 Dpto.301</p>
                            </div>
                        </div>
                        <div class="d-flex mt-10">
                            <div class="into-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-text">
                                <h3 class="h3-contactenos mt-5 mb-n color-blue">+(51) 226 1277</h3>
                                <p>Lunes a Sabado 8.00 am - 8.00 pm</p>
                            </div>
                        </div>
                        <div class="d-flex mt-10">
                            <div class="into-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="info-text">
                                <h3 class="h3-contactenos mt-n mb-n color-blue">consultas@dentaltamayo.com</h3>
                                <p>Envienos sus consultas en cualquier momento</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/accion_consulta" class="form" method="POST" id="input-mask">
                            <div class="response"></div>
                            <h3 class="color-blue text-center mt-n mb-20">Envíanos tus consultas</h3>
                            <div class="col-md-12 p-n">
                                <div class="col-md-6 mb-10 p-n">
                                    <div class="col-md-12 p-n">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="nombre" value="" placeholder="Nombres y Apellidos..." />                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12 p-n">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control"  name="email" value="" placeholder="Correo Electronico..." />                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12 p-n">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control"  name="asunto" value="" placeholder="Nombres y Apellidos..." />                                            
                                        </div>
                                    </div>                                                                                         
                                </div>
                                <div class="col-md-6 mb-10">
                                    <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <textarea class="form-control" name="mensaje" cols="20" rows="6"  placeholder="Ingresa tu consulta"></textarea>                                            
                                        </div>
                                    </div>                            
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <label style="font-size: 14px;">
                                            <input type="checkbox" value="1" name="terminos"> He leído, entendido y acepto los términos y condiciones de sus <a href="#" class="m-terminos"> <u>Políticas de Privacidad. </u></a>
                                        </label>
                                    </div>
                                </div>                             
                                <div class="text-center">
                                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Ingresar">
                                        <i class="fa fa-paper-plane"></i> Enviar Mensaje</button><i class="load"></i>
                                    <input type="hidden" name="origen" value="<?php if (isset($_smarty_tpl->tpl_vars['origen']->value)) {
echo $_smarty_tpl->tpl_vars['origen']->value;
}?>">
                                    <input type="hidden" name="u" value="<?php if (isset($_smarty_tpl->tpl_vars['uri']->value)) {
echo $_smarty_tpl->tpl_vars['uri']->value;
}?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Form End -->        

    </div>
</div>

<?php }
}
?>