<style>
	.btnPor{
		color: #000;
	}
	#filaPlanDental{
		display: none;
	}
</style>

<div class="container">
	<div class="row text-center">
		<div class="col-md-offset-3 col-md-6" style="margin-top: 30px">
			<!-- <h2>Verificación Semefa</h2> -->
			<div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                	<button type="button" class="btn btn-default btnPor active" id="btnSemefa">Semefa</button>
                </div>
                <div class="btn-group" role="group">
                	<button type="button" class="btn btn-default btnPor" id="btnPD">Plan Dental</button>
                </div>
            </div>
		</div>

		<div id="filaSemefa">
			<div class="col-md-12">
				<h2>Verificación Semefa</h2> 
			</div>

			<div class="col-md-12">
				<form action="{$base_url}formulario/accion_semefa" class="form" method="POST">
	            	<div class="response"></div>
	            	<div class="col-md-offset-3 col-md-6">
		            	<div class="form-group has-feedback">
		            		<label>Ingrese Documento de Identidad</label>
		                    <input type="text" class="form-control frm-regist"  name="documento" value=""  />
		                    <span class="fa fa-user form-control-feedback gly-regist"></span>
		                </div>
	                </div>

	                <div class="col-md-12 text-center">
	                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Verificar">
	                        <i class="fa fa-check"></i> Verificar</button><i class="load"></i>

	                    <button type="reset" class="btn btn-social btn-primary btn-regist" data-toggle="tooltip" title="Limpiar">
	                        <i class="fa fa-refresh"></i> Limpiar</button>
	            	</div>
	            </form>
			</div>
		</div>

		<div id="filaPlanDental">
			<div class="col-md-12">
				<h2>Verificación Plan Dental</h2> 
			</div>
			
			<div class="col-md-12">
				<form action="{$base_url}formulario/accion_plan_dental" class="form" method="POST">
	            	<div class="response"></div>
	            	<div class="col-md-offset-3 col-md-6">
		            	<div class="form-group has-feedback">
		            		<label>Ingrese Documento de Identidad</label>
		                    <input type="text" class="form-control frm-regist"  name="documento" value=""  />
		                    <span class="fa fa-user form-control-feedback gly-regist"></span>
		                </div>
	                </div>

	                <div class="col-md-12 text-center">
	                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Verificar">
	                        <i class="fa fa-check"></i> Verificar</button><i class="load"></i>

	                    <button type="reset" class="btn btn-social btn-primary btn-regist" data-toggle="tooltip" title="Limpiar">
	                        <i class="fa fa-refresh"></i> Limpiar</button>
	            	</div>
	            </form>
			</div>
		</div>
		
	</div>
</div>
