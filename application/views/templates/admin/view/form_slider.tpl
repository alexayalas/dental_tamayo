<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 25px">
        {if $tipo == 'agregar'}
            <ol class="breadcrumb">
                <li class="active"><a href="{$base_url}admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="{$base_url}admin/slider/agregar"><i class="fa fa-plus"></i> Agregar Imagen para Slider</a></li>
            </ol>
        {else}
            <ol class="breadcrumb">
                <li class="active"><a href="{$base_url}admin"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active"><a href="{$base_url}admin/slider/editar/{$id}"><i class="fa fa-pencil"></i> Editar Imagen para Slider</a></li>
            </ol>
        {/if}
    </section>

    <section class="content">
        <div class="row">    

            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Recomendación técnica.</h4>
                    <ul>
                        <li>
                            Recuerde respetar el tamaño de la imagen de 2000 x 800 pixeles para poder obtener una mejor presentación en la pagina web.
                        </li>
                        <li>
                            La cantidad de caracteres para el titulo debe ser maximo de : 50 caracteres
                        </li>
                        <li>
                            La cantidad de caracteres para el titulo debe ser maximo de : 50 caracteres
                        </li>
                    </ul>
                        
                </div>  
            </div>
    
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">{$titulo}</h3>
                    </div>
                    <div class="box-body"> 
                        <div class="direct-chat-msg">
                            <div class='direct-chat-info clearfix'>
                                <span class='direct-chat-timestamp pull-right'>{if isset($emp_today)}{$emp_today}{/if}</span>
                            </div>
                        </div>   

                        <form action="{$base_url}admin/slider/accion" class="form" method="POST">
                            <div class="response"></div>

                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Titulo:</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  name="titulo1" value="{if isset($titulo1)}{$titulo1}{/if}" placeholder="texto sin negrita" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  name="titulo2" value="{if isset($titulo2)}{$titulo2}{/if}" placeholder="texto que va ir en negrita" />
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label><i class="fa fa-asterisk fa-xs text-red"></i> Subtitulo:</label>
                                    <input type="text" class="form-control"  name="subtitulo" value="{if isset($subtitulo)}{$subtitulo}{/if}" maxlength="50" />
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                            </div> 

                            <div class="col-md-7" style="margin-bottom: 15px;">
                                <label><i class="fa fa-asterisk fa-xs text-red"></i> Imagen <span class="text-red">[tamaño de 2000 x 800 px]</span></label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Examinar... <input type="file" name="imagen" />
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" value="{if isset($imagen)}{$imagen}{/if}" readonly />
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
                                </div>
                                {if isset($imagen)}
                                    <img src="{$base_url}public/imagen/slider/{$imagen}" style="width: 200px;margin-top: 5px">
                                {/if}
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

