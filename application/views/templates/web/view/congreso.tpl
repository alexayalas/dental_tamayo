<style>
	.btnPor{
		color: #000;
	}
	#filaPlanDental{
		display: none;
	}
    .b_coctel_acomp{
        display: none;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        
        font-size: 20px !important;
    }

</style>

<div class="container">

	<div class="row">
		<div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">LISTA DE PARTICIPANTES DEL CONGRESO </h3>
                        <legend></legend>
                    </div>
                    <div class="box-body">

                        <div class="direct-chat-msg table-responsive">
                            <table class="table table-bordered table-hover example-table" style="text-align: center">
                                <thead>
                                    <tr class="tr-lista" style="text-align: center;">
                                        <th style="width: 35px; text-align: center;">N°</th>
                                        
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Accion</th>
                                    </tr>
                                </thead>
                                   
                                {if isset($lista)}
                                {foreach $lista as $l}
                                        <tr class="resultado">
                                            <td style="font-size: 20px;">{$l.item}</td>
                                            <td style="font-size: 20px;">{$l.entidad}</td>
                                            <td>
                                                {if $l.asistio == '1'}
                                                    <a class="btn btn-success b_congreso_marcar_no_asistencia" data-id="{$l.idcongreso}" data-estado="{$l.asistio}">ASISTIO</a>
                                                    <a class="btn btn-success b_coctel_acomp">marcar con acompañante</a>
                                                {else}
                                                    <a class="btn btn-danger b_congreso_marcar_asistencia" data-id="{$l.idcongreso}" data-estado="{$l.asistio}">marcar asistencia</a>
                                                    <a class="btn btn-success b_coctel_acomp">marcar con acompañante</a>
                                                {/if}
                                                
                                            </td>
                                        </tr>                                       
                                {/foreach}
                                {/if}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		
	</div>
</div>




