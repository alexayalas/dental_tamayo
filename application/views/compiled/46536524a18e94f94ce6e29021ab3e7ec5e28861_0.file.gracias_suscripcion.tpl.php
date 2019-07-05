<?php /* Smarty version 3.1.27, created on 2017-03-13 18:33:57
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/gracias_suscripcion.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:123242723358c72c65c12cc7_18339645%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46536524a18e94f94ce6e29021ab3e7ec5e28861' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/gracias_suscripcion.tpl',
      1 => 1483646882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123242723358c72c65c12cc7_18339645',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c72c65c25260_61214424',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c72c65c25260_61214424')) {
function content_58c72c65c25260_61214424 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '123242723358c72c65c12cc7_18339645';
?>
<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">¡Gracias!</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Multident</a><span class="divider"></span></li><li class="active">¡Gracias!</li>
                    </ul>                
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="blog-page default-page full-width clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-page-single clearfix">
                    <article id="post-20" class=" clearfix post-20 page type-page status-publish hentry">
                    	<div class="full-width-contents">
                            <div class="entry-content" itemprop="text">
                                <h3>¡Gracias por suscribirse!</h3>
								<p>Le llegará un correo para confirmar su suscripción</p>
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