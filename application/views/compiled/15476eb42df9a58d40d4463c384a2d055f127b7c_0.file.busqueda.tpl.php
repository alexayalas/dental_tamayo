<?php /* Smarty version 3.1.27, created on 2017-03-19 21:30:19
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/busqueda.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:910471358cf3ebb4b78d9_52923595%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15476eb42df9a58d40d4463c384a2d055f127b7c' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/busqueda.tpl',
      1 => 1480976620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '910471358cf3ebb4b78d9_52923595',
  'variables' => 
  array (
    'filtro' => 0,
    'blogs' => 0,
    'base_url' => 0,
    'bg' => 0,
    'paginacion' => 0,
    'categorias' => 0,
    'ct' => 0,
    'masVistos' => 0,
    'mv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58cf3ebb65c544_38578238',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58cf3ebb65c544_38578238')) {
function content_58cf3ebb65c544_38578238 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '910471358cf3ebb4b78d9_52923595';
?>
<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1>Resultados de la busqueda con: <b><?php echo $_smarty_tpl->tpl_vars['filtro']->value;?>
</b></h1>                    
                
            </div>
        </div>
    </div>
</div>

<div class="blog-page clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-7 col-sm-12 ">
                <div class="blog-post-listing clearfix" itemprop="mainContentOfPage" itemscope="itemscope">

                    <?php if (isset($_smarty_tpl->tpl_vars['blogs']->value)) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['blogs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['bg'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['bg']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bg']->value) {
$_smarty_tpl->tpl_vars['bg']->_loop = true;
$foreach_bg_Sav = $_smarty_tpl->tpl_vars['bg'];
?>
                        <article class="clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                            <!-- Post Date and Comments -->
                            <div class="left_blog">
                                <!--<time class="entry-time" itemprop="datePublished" datetime="2016-11-10T19:00:42+00:00">         Nov <strong>10</strong>
                                </time>
                                <span class="comments_count clearfix entry-comments-link"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/que-es-el-diseno-de-sonrisa/#respond">0</a></span>-->
                            </div>

                            <!-- Post contents -->
                            <div class="right-contents">
                                <header class="entry-header">
                                    <figure>
                                        <p class="p-blog"><span class="meta-date" title="24-11-2016 13:00:19"><i class="fa fa-calendar"></i> <?php echo $_smarty_tpl->tpl_vars['bg']->value['f_registro'];?>
</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span class="meta-date"><i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['bg']->value['visitas'];?>
</span></p>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['bg']->value['url'];?>
">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
thumbs/732/346/publicacion_<?php echo $_smarty_tpl->tpl_vars['bg']->value['imagen'];?>
" />                
                                        </a>
                                    </figure>
                                    <h3 class="entry-title"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['bg']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['bg']->value['titulo'];?>
</a>
                                    </h3>
                                    <div class="text-left">
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['bg']->value['url'];?>
" onclick="gec.fn.popup(this,event)" class="share-face" style="margin-left: 0px;"><i class="fa fa-facebook fa-2x"></i>
                                        </a>

                                        <!--<a href="#" data-href="https://twitter.com/intent/tweet?original_referer=http://portal.petabytesolutions.com.pe/articulo/facebook-sufre-por-donald-trump-y-acusaciones-de-desinformacion-508&amp;&amp;&amp;text=Facebook sufre por Donald Trump y acusaciones de desinformación&amp;tw_p=tweetbutton&amp;url=http://portal.petabytesolutions.com.pe/articulo/facebook-sufre-por-donald-trump-y-acusaciones-de-desinformacion-508&amp;via=petabyteperu" onclick="gec.fn.popup(this,event)" class="share-twit"><i class="fa fa-twitter fa-2x"></i></a>-->
                                    </div>

                                    <span class="entry-author">
                                        Publicado por Multident
                                    </span>
                                </header>
                                <div class="entry-content" itemprop="text">
                                    <?php echo $_smarty_tpl->tpl_vars['bg']->value['desccorta'];?>

                                </div>
                                <a class="read-more" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['bg']->value['url'];?>
" rel="bookmark">Leer Más</a>    
                            </div>
                        </article><!-- Post -->
                    <?php
$_smarty_tpl->tpl_vars['bg'] = $foreach_bg_Sav;
}
?>

                    <?php if (isset($_smarty_tpl->tpl_vars['paginacion']->value)) {
echo $_smarty_tpl->tpl_vars['paginacion']->value;
}?>
                    <?php } else { ?>
                        <h2>No se encontraron resultados...</h2>
                    <?php }?>

                    

                </div>
            </div>
                
            <div class="col-lg-3 col-md-4 col-sm-12 ">
                <aside class="sidebar clearfix">
                    <section id="search-2" class="widget widget_search">
                        <div class="input-group lr7-botuasbusq">
                            <input id="buscador" type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button id="buscar" class="btn btn-primary" type="button">Ir</button>
                            </span>
                        </div>
                    </section>

                    <section id="categories-2" class="widget widget_categories">
                        <h3 class="title">Categorías</h3>     
                        <?php if (!empty($_smarty_tpl->tpl_vars['categorias']->value)) {?>
                        <ul>
                        <?php
$_from = $_smarty_tpl->tpl_vars['categorias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ct'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ct']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ct']->value) {
$_smarty_tpl->tpl_vars['ct']->_loop = true;
$foreach_ct_Sav = $_smarty_tpl->tpl_vars['ct'];
?>
                            <li class="cat-item ">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/categoria/<?php echo $_smarty_tpl->tpl_vars['ct']->value['url'];?>
" ><?php echo $_smarty_tpl->tpl_vars['ct']->value['nombre'];?>
</a>
                            </li>
                        <?php
$_smarty_tpl->tpl_vars['ct'] = $foreach_ct_Sav;
}
?>
                        </ul>
                        <?php }?>
                    </section>

                    <section id="tabs_widget-2" class="widget tabs-widget">
                        <div class="tabs clearfix">
                            <div class = "tab-head active">
                                <h6>MÁS VISTOS</h6>
                            </div>
                            
                            <div class="tabs-content clearfix">                    
                                <?php if (isset($_smarty_tpl->tpl_vars['masVistos']->value)) {?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['masVistos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['mv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['mv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['mv']->value) {
$_smarty_tpl->tpl_vars['mv']->_loop = true;
$foreach_mv_Sav = $_smarty_tpl->tpl_vars['mv'];
?>
                                    <div class="tab-post-listing clearfix">
                                        <figure>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['mv']->value['url'];?>
">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
thumbs/732/346/publicacion_<?php echo $_smarty_tpl->tpl_vars['mv']->value['imagen'];?>
" />
                                            </a>
                                        </figure>
                                        <div class="post-content">
                                            <h6>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['mv']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['mv']->value['titulo'];?>
</a>
                                            </h6>
                                            <span><?php echo $_smarty_tpl->tpl_vars['mv']->value['f_registro'];?>
</span>
                                        </div>
                                    </div>
                                <?php
$_smarty_tpl->tpl_vars['mv'] = $foreach_mv_Sav;
}
?>
                                <?php }?>
                                
                            </div>

                        </div>
                    </section>
                </aside>                
            </div>
        </div>
    </div>
</div>

<?php }
}
?>