<style>
body
{
    overflow-y: scroll;
}</p>
<p>p, ul, ol, table, pre, dl
{
    margin: 0 0 20px;
}</p>
<p>table
{
    width: 100%;
    border-collapse: collapse;
}</p>
<p>th, td
{
    text-align: left;
    padding: 5px 10px;
    border-top: 1px solid #aaa;
}</p>
<p>th
{
    border-top: 0;
}</p>
<p>label
{
    font-weight: bold;
}</p>
<p>#tabledata .dist     { width: 9%; }
#tabledata .dire  { width: 43%; }
#tabledata .adic { width: 40%; }
#tabledata .mapa   { width: 9%; }
.list-header   { display: block; padding: 0 0 0 20px; }
#carddata > *
{
    display: inline-block;
    position: relative;
    width: 265px;
    margin: 15px;
    border: 1px solid #aaa;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    -ms-border-radius: 15px;
    -o-border-radius: 15px;
    border-radius: 15px;
    -webkit-box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 2px;
    -moz-box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 2px;
    box-shadow: rgba(0, 0, 0, 0.2) 3px 3px 8px;
}
#carddata:after
{
    content: " ";
    clear: both;
    display: table;
}
#carddata .dist, #carddata .dire, #carddata .adic, #carddata .mapa
{
    color: #888;
    text-align: center;
    font-size: 11px;
}
#carddata .dist, #carddata .mapa
{
    display: inline-block;
    margin: 5px;
    padding: 2px 5px;
    width: auto;
    background: #67c9e0;
    color: white;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    border-radius: 10px;
}
#carddata .mapa
{
    float: right;
        background: transparent;
}
#carddata .dist
{
    float: left;
        width: 96%;
        font-size: 14px;
}
#carddata .dire
{
    font-size: 14px;
    color: inherit;
}
#carddata .cit
{
    float: left;
        color: #f15b5a;
        font-size: 14px;
        background: transparent;
        padding: 9px 24px;
        font-weight: 700</p>
<p>}
.highlight
{
    background-color: #fd0;
}
</style>

<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">Sedes</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                        <li><a href="{$base_url}">Multident</a><span class="divider"></span></li>
                        <li class="active">Sedes</li>
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
                    <article id="post-246" class=" clearfix post-246 page type-page status-publish hentry">
                        <div class="full-width-contents">
                            <div class="entry-content" itemprop="text">
                                <h1 class="h1" style="text-align: center;">Más de 45 sedes en todo el Perú</h1>
                                <p style="text-align: center;">Ubíquenos facilmente, visítenos y sonría</p>

                                <div id="mapa"></div>

                                <a id="topMap" name="topMap"></a>&nbsp;
                                <div id="mapp0_layout" class="mapp-layout mapp-align-center" style="width: 90%;margin-bottom: 50px;">
                                    <div id="mapp0_links" class="mapp-map-links">
                                    </div>
                                    <div id="mapp0_dialog" class="mapp-dialog">
                                    </div>
                                    <div id="mapp0" class="mapp-canvas" style="width: 100%; height: 400px; ">
                                    </div>
                                    <div id="mapp0_directions" class="mapp-directions" style="width:100%">
                                    </div>
                                    <div id="mapp0_poi_list" class="mapp-poi-list" style="width:100%">
                                    </div>
                                </div>

                                <h2 class="text-center">Lima</h2>
                                {if !empty($sedeLima)}
                                <div class="text-center" id="carddata" style="margin-bottom: 70px;">
                                {foreach $sedeLima as $sl}
                                    
                                    <div class="card">
                                    <div class="dist">{$sl['nombre']}</div>
                                    <div class="dire">{$sl['direccion']}</div>
                                    <div class="adic">{$sl['telefono']}</div>
                                    <div class="cit"><a href="{$base_url}site/cita-en-linea?sede={$sl['idsede']}">Reservar Cita</a></div>
                                    <div class="mapa"><a href="javascript: centerMapp0('{$sl['orden']}');"><img src="{$base_url}public/imagen/extras/map.png" data-toggle="tooltip" title="Ver Ubicación"></a></div>
                                    </div>
                                {/foreach}
                                </div>
                                {/if}

                                <h2 class="text-center">Provincia</h2>
                                {if !empty($sedeProvincia)}
                                <div class="text-center" id="carddata">
                                {foreach $sedeProvincia as $sp}
                                    
                                    <div class="card">
                                    <div class="dist">{$sp['nombre']}</div>
                                    <div class="dire">{$sp['direccion']}</div>
                                    <div class="adic">{$sp['telefono']}</div>
                                    <div class="cit"><a href="{$base_url}site/cita-en-linea?sede={$sp['idsede']}">Reservar Cita</a></div>
                                    <div class="mapa"><a href="javascript: centerMapp0('{$sp['orden']}');"><img src="{$base_url}public/imagen/extras/map.png" data-toggle="tooltip" title="Ver Ubicación"></a></div>
                                    </div>
                                {/foreach}
                                </div>
                                {/if}


                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>