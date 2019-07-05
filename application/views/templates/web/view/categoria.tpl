<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1>Blogs de la Categoría: <b>{$categoriaActual['nombre']}</b></h1>                    
                
            </div>
        </div>
    </div>
</div>

<div class="blog-page clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-7 col-sm-12 ">
                <div class="blog-post-listing clearfix" itemprop="mainContentOfPage" itemscope="itemscope">

                    {if isset($blogs)}
                    {foreach $blogs as $bg}
                        <article class="clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                            <!-- Post Date and Comments -->
                            <div class="left_blog">
                                <!--<time class="entry-time" itemprop="datePublished" datetime="2016-11-10T19:00:42+00:00">         Nov <strong>10</strong>
                                </time>
                                <span class="comments_count clearfix entry-comments-link"><a href="{$base_url}/que-es-el-diseno-de-sonrisa/#respond">0</a></span>-->
                            </div>

                            <!-- Post contents -->
                            <div class="right-contents">
                                <header class="entry-header">
                                    <figure>
                                        <p class="p-blog"><span class="meta-date" title="24-11-2016 13:00:19"><i class="fa fa-calendar"></i> {$bg['f_registro']}</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span class="meta-date"><i class="fa fa-eye"></i> {$bg['visitas']}</span></p>
                                        <a href="{$base_url}site/blog/{$bg['url']}">
                                            <img src="{$base_url}thumbs/732/346/publicacion_{$bg['imagen']}" />                
                                        </a>
                                    </figure>
                                    <h3 class="entry-title"><a href="{$base_url}site/blog/{$bg['url']}">{$bg['titulo']}</a>
                                    </h3>
                                    <div class="text-left">
                                        <a href="http://www.facebook.com/sharer.php?u={$base_url}site/blog/{$bg['url']}" onclick="gec.fn.popup(this,event)" class="share-face" style="margin-left: 0px;"><i class="fa fa-facebook fa-2x"></i>
                                        </a>

                                        <!--<a href="#" data-href="https://twitter.com/intent/tweet?original_referer=http://portal.petabytesolutions.com.pe/articulo/facebook-sufre-por-donald-trump-y-acusaciones-de-desinformacion-508&amp;&amp;&amp;text=Facebook sufre por Donald Trump y acusaciones de desinformación&amp;tw_p=tweetbutton&amp;url=http://portal.petabytesolutions.com.pe/articulo/facebook-sufre-por-donald-trump-y-acusaciones-de-desinformacion-508&amp;via=petabyteperu" onclick="gec.fn.popup(this,event)" class="share-twit"><i class="fa fa-twitter fa-2x"></i></a>-->
                                    </div>

                                    <span class="entry-author">
                                        Publicado por Multident
                                    </span>
                                </header>
                                <div class="entry-content" itemprop="text">
                                    {$bg['desccorta']}
                                </div>
                                <a class="read-more" href="{$base_url}site/blog/{$bg['url']}" rel="bookmark">Leer Más</a>    
                            </div>
                        </article><!-- Post -->
                    {/foreach}

                    {if isset($paginacion)}{$paginacion}{/if}
                    {else}
                        <h2>Esta categoría no tiene blogs...</h2>
                    {/if}

                    

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
                        {if !empty($categorias)}
                        <ul>
                        {foreach $categorias as $ct}
                            <li class="cat-item ">
                                <a href="{$base_url}site/categoria/{$ct['url']}" >{$ct['nombre']}</a>
                            </li>
                        {/foreach}
                        </ul>
                        {/if}
                    </section>

                    <section id="tabs_widget-2" class="widget tabs-widget">
                        <div class="tabs clearfix">
                            <div class = "tab-head active">
                                <h6>MÁS VISTOS</h6>
                            </div>
                            
                            <div class="tabs-content clearfix">                    
                                {if isset($masVistos)}
                                {foreach $masVistos as $mv}
                                    <div class="tab-post-listing clearfix">
                                        <figure>
                                            <a href="{$base_url}site/blog/{$mv['url']}">
                                                <img src="{$base_url}thumbs/732/346/publicacion_{$mv['imagen']}" />
                                            </a>
                                        </figure>
                                        <div class="post-content">
                                            <h6>
                                                <a href="{$base_url}site/blog/{$mv['url']}">{$mv['titulo']}</a>
                                            </h6>
                                            <span>{$mv['f_registro']}</span>
                                        </div>
                                    </div>
                                {/foreach}
                                {/if}
                                
                            </div>

                        </div>
                    </section>
                </aside>                
            </div>
        </div>
    </div>
</div>

