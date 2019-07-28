<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">Convenios</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                        <li><a href="{$base_url}site">Dental Tamayo</a><span class="divider"></span></li><li class="active">Convenios</li>
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
                                    {if isset($convenio)}
                                    {foreach $convenio as $co}
                                        <div class="col-lg-4 col-md-4 col-sm-4" style="/*margin-bottom:10px*/">
                                            <img class="aligncenter" src="{$base_url}public/imagen/convenio/{$co['imagen']}" alt="{$co['nombre']}" />
                                        </div>
                                        {if $co['numero'] % 3 == 0}
                                             <div class="clearfix"></div>
                                        {/if}
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