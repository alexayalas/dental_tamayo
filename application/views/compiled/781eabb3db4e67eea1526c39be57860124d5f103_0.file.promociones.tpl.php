<?php /* Smarty version 3.1.27, created on 2017-03-13 15:04:39
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/promociones.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:197597134958c6fb576d03e2_42990249%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '781eabb3db4e67eea1526c39be57860124d5f103' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/promociones.tpl',
      1 => 1481322928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197597134958c6fb576d03e2_42990249',
  'variables' => 
  array (
    'base_url' => 0,
    'promocion' => 0,
    'pr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c6fb57794c62_64650172',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c6fb57794c62_64650172')) {
function content_58c6fb57794c62_64650172 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '197597134958c6fb576d03e2_42990249';
?>
<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">Promociones</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Multident</a><span class="divider"></span></li><li class="active">Promociones</li>
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
                    <article id="post-301" class=" clearfix post-301 page type-page status-publish hentry">
                        <div class="full-width-contents">
                            <div class="entry-content" itemprop="text">
                                <h1 class="h1 text-center">Promociones Corporativas</h1>
                                <div class="text-center" style="margin-bottom: 20px;">Siempre hay una buena razón para sonreir</div>
                                <div class="row">
                                    <?php if (isset($_smarty_tpl->tpl_vars['promocion']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['promocion']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->value) {
$_smarty_tpl->tpl_vars['pr']->_loop = true;
$foreach_pr_Sav = $_smarty_tpl->tpl_vars['pr'];
?>
                                    <div class="col-md-4 text-center">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/promocion/<?php echo $_smarty_tpl->tpl_vars['pr']->value['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['pr']->value['nombre'];?>
" class="aligncenter"/>
                                        <a class="btn btn-promocion" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/cita-en-linea">Solicita Tu Cita</a>
                                    </div>
                                    <?php
$_smarty_tpl->tpl_vars['pr'] = $foreach_pr_Sav;
}
?>
                                    <?php }?>
                                    
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