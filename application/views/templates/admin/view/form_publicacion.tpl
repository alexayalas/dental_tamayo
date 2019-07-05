<script src="{$base_url}public/plugins/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 25px">
        {if $tipo == 'agregar'}
            <ol class="breadcrumb">
                <li class="active"><a href="{$base_url}admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="{$base_url}admin/publicacionPublicación/agregar"><i class="fa fa-plus"></i> Agregar Publicación</a></li>
            </ol>
        {else}
            <ol class="breadcrumb">
                <li class="active"><a href="{$base_url}admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="{$base_url}admin/publicacion/editar/{$id}"><i class="fa fa-pencil"></i> Editar Publicación</a></li>
            </ol>
        {/if}
    </section>

    <section class="content">
        <div class="row">    

            <!--<div class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Recomendación técnica.</h4>
                        Coordinar con su diseñador gráfico o programador web la configuración de las fotos de su personal administrativo y odontológico con el fin de optimizar la calidad del servicio y del producto. La características de todas las fotos serán las siguiente: Altura 150 pixeles, ancho 150 pixeles, el peso de promedio entre cada fotografía debe oscilar entre 1 o 2 mb, así mismo el rostro en la foto al menos 75 al 80% de la fotografía. 
                </div>  
            </div>-->
    
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">{$titulo2}</h3>
                    </div>
                    <div class="box-body"> 
                        <div class="direct-chat-msg">
                            <div class='direct-chat-info clearfix'>
                                <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
                            </div>
                        </div>   

                        <form action="{$base_url}admin/publicacion/accion" class="form" method="POST">
                            <div class="response"></div>

                            <div class="col-xs-10 col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Categoria:</label>
                                    {if isset($categoria)}
                                    {$categoria}
                                    {else}
                                    <select name="categoria" id="categoria" class="form-control selectpicker">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                    {/if}
                                </div>
                            </div> 

                            <div class="col-xs-10 col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk text-red"></i> Autor:</label>
                                    {if isset($autor)}
                                    {$autor}
                                    {else}
                                    <select name="autor" id="autor" class="form-control selectpicker">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                    {/if}
                                </div>
                            </div>  

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Titulo:</label>
                                    <input type="text" class="form-control"  name="titulo" value="{if isset($titulo)}{$titulo}{/if}" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Titulo para SEO:</label>
                                    <input type="text" class="form-control"  name="titulo_seo" value="{if isset($titulo_seo)}{$titulo_seo}{/if}" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Descripción corta:</label>
                                    <textarea class="form-control" name="desccorta">
                                    {if isset($desccorta)}{$desccorta}{/if}</textarea>
                                    {literal}<script>CKEDITOR.replace('desccorta', {skin: 'office2013'});</script>{/literal}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Descripción General:</label>
                                    <textarea class="form-control" name="descgeneral">
                                    {if isset($descgeneral)}{$descgeneral}{/if}</textarea>
                                    {literal}<script>CKEDITOR.replace('descgeneral', {skin: 'office2013'});</script>{/literal}
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom: 15px;">
                                <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen <span class="text-red">[tamaño de 732 x 346 px]</span></label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Examinar... <input type="file" name="imagen"/>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" value="{if isset($imagen)}{$imagen}{/if}" readonly />
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="glyphicon glyphicon-asterisk text-red"></i> Tags:</label>
                                    <div style="height:50px">
                                        <input type="text" id="tag" class="texto auto" readonly name="tag_publicacion" value="{if isset($tag)}{$tag}{/if}" style="display: none;" />
                                        <ul class="simple_tag"></ul>
                                    </div>
                                </div> 
                            </div> 

                            <div class="col-md-12">
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <button class="btn btn-social btn-primary save" data-toggle="tooltip" title="Guardar">
                                        <i class="fa fa-save"></i> Guardar
                                    </button><i class="load"></i>
                                    <a href="javascript:history.back(1)" class="btn btn-social btn-danger" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
                                    <input type="hidden" name="id" value="{if isset($id)}{$id}{/if}" />
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>

        </div>
    </section>

    
</div>

