<?php /* Smarty version 3.1.27, created on 2017-03-13 15:01:07
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/blog_detalle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:181757006358c6fa83ac22d8_39490040%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80a21940abb77128c7b982116321ec48d02c966e' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/blog_detalle.tpl',
      1 => 1480976498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181757006358c6fa83ac22d8_39490040',
  'variables' => 
  array (
    'base_url' => 0,
    'urlcat' => 0,
    'categoria' => 0,
    'titulo' => 0,
    'f_registro' => 0,
    'visitas' => 0,
    'imagen' => 0,
    'url' => 0,
    'desccorta' => 0,
    'descgeneral' => 0,
    'aimagen' => 0,
    'autor' => 0,
    'adescripcion' => 0,
    'tags' => 0,
    'tg' => 0,
    'categorias' => 0,
    'ct' => 0,
    'masVistos' => 0,
    'mv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c6fa83b41528_56575279',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c6fa83b41528_56575279')) {
function content_58c6fa83b41528_56575279 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '181757006358c6fa83ac22d8_39490040';
?>
<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12 ">
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Multident</a><span class="divider"></span>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/categoria/<?php echo $_smarty_tpl->tpl_vars['urlcat']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</a> <span class="divider"></span>
                        </li>
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
</div>

<div class="blog-page clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-7 col-sm-12 ">
                <div class="blog-post-listing clearfix" itemprop="mainContentOfPage" itemscope="itemscope">

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
                                        <p class="p-blog"><span class="meta-date" title="<?php echo $_smarty_tpl->tpl_vars['f_registro']->value;?>
"><i class="fa fa-calendar"></i> <?php echo $_smarty_tpl->tpl_vars['f_registro']->value;?>
</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span class="meta-date"><i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['visitas']->value;?>
</span></p>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
thumbs/732/346/publicacion_<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" />                
                                        </a>
                                    </figure>
                                    <h3 class="entry-title"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
                                    <div class="text-left">
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" onclick="gec.fn.popup(this,event)" class="share-face" style="margin-left: 0px;"><i class="fa fa-facebook fa-2x"></i>
                                        </a>

                                        <!--<a href="#" data-href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
blog/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&amp;&amp;&amp;text=Facebook sufre por Donald Trump y acusaciones de desinformación&amp;tw_p=tweetbutton&amp;url=<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
blog/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&amp;via=petabyteperu" onclick="gec.fn.popup(this,event)" class="share-twit"><i class="fa fa-twitter fa-2x"></i></a>-->
                                    </div>

                                    <span class="entry-author">
                                        Publicado por Multident
                                    </span>
                                </header>
                                <div class="entry-content" itemprop="text">
                                    <?php echo $_smarty_tpl->tpl_vars['desccorta']->value;?>


                                    <?php echo $_smarty_tpl->tpl_vars['descgeneral']->value;?>

                                </div>
                                
                                <p>
                                <strong>
                                <a href="">
                                    <img class="alignleft size-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
thumbs/150/150/autor_<?php echo $_smarty_tpl->tpl_vars['aimagen']->value;?>
" alt="" />
                                </a></strong>
                                </p>
                                <p>&nbsp;</p>
                                <p><strong>Autor del Artículo</strong><br />
                                <span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['autor']->value;?>
<br />
                                <?php echo $_smarty_tpl->tpl_vars['adescripcion']->value;?>

                                    
                                <footer class="entry-footer">
                                    <p class="entry-meta">
                                        <span class="entry-categories">
                                            <i class="fa fa-folder-o"></i>&nbsp; <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/categoria/<?php echo $_smarty_tpl->tpl_vars['urlcat']->value;?>
" rel="category tag"><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</a>
                                        </span>
                                        <?php if (isset($_smarty_tpl->tpl_vars['tags']->value)) {?>
                                            <span class="entry-tags">
                                                <?php
$_from = $_smarty_tpl->tpl_vars['tags']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tg'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tg']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tg']->value) {
$_smarty_tpl->tpl_vars['tg']->_loop = true;
$foreach_tg_Sav = $_smarty_tpl->tpl_vars['tg'];
?>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/tag/<?php echo $_smarty_tpl->tpl_vars['tg']->value['urltag'];?>
"><i class="fa fa-tags"></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['tg']->value['tag'];?>
</a>
                                                <?php
$_smarty_tpl->tpl_vars['tg'] = $foreach_tg_Sav;
}
?>
                                            </span>
                                        <?php }?>

                                        
                                            
                                        
                                        </p>
                                </footer>
   
                            </div>
                        </article><!-- Post -->   
                        <div class="row">
                            <h5 id="comments-title">COMENTARIOS</h5>

                            <div class="fb-comments" data-href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/blog/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" data-numposts="5" ></div>
                            </div>
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