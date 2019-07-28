<?php /* Smarty version 3.1.27, created on 2019-07-09 16:36:11
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\view\convenio.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:298515d2508cb982a10_34981690%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80dfbc681fd119436b68427b5f3151726c1f2a4' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\view\\convenio.tpl',
      1 => 1562708168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '298515d2508cb982a10_34981690',
  'variables' => 
  array (
    'base_url' => 0,
    'convenio' => 0,
    'co' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d2508cb9fd467_57686619',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d2508cb9fd467_57686619')) {
function content_5d2508cb9fd467_57686619 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '298515d2508cb982a10_34981690';
?>
<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">Convenios</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site">Dental Tamayo</a><span class="divider"></span></li><li class="active">Convenios</li>
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
                    <article id="post-363" class=" clearfix post-363 page type-page status-publish hentry">
                        <div class="full-width-contents">
                            <div class="entry-content" itemprop="text">
                                <h1 class="h1 color-blue" style="text-align: center;">Tenemos Convenios con las Mejores Empresas</h1>
                                <!--<p style="text-align: center;">Confianza que se deja ver en cada sonrisa</p>-->
                                <p>&nbsp;</p>
                            
                                <div class="row text-center">
                                    <?php if (isset($_smarty_tpl->tpl_vars['convenio']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['convenio']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['co'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['co']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['co']->value) {
$_smarty_tpl->tpl_vars['co']->_loop = true;
$foreach_co_Sav = $_smarty_tpl->tpl_vars['co'];
?>
                                        <div class="col-lg-4 col-md-4 col-sm-4" style="/*margin-bottom:10px*/">
                                            <img class="aligncenter" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/convenio/<?php echo $_smarty_tpl->tpl_vars['co']->value['imagen'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['co']->value['nombre'];?>
" />
                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['co']->value['numero']%3 == 0) {?>
                                             <div class="clearfix"></div>
                                        <?php }?>
                                    <?php
$_smarty_tpl->tpl_vars['co'] = $foreach_co_Sav;
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
</div><?php }
}
?>