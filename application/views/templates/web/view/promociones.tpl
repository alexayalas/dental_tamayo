<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">Promociones</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                        <li><a href="{$base_url}">Multident</a><span class="divider"></span></li><li class="active">Promociones</li>
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
                                    {if isset($promocion)}
                                    {foreach $promocion as $pr}
                                    <div class="col-md-4 text-center">
                                        <img src="{$base_url}public/imagen/promocion/{$pr['imagen']}" alt="{$pr['nombre']}" class="aligncenter"/>
                                        <a class="btn btn-promocion" href="{$base_url}site/cita-en-linea">Solicita Tu Cita</a>
                                    </div>
                                    {/foreach}
                                    {/if}
                                    
                                </div>
                                

                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
