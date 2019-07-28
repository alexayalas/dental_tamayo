	<!-- JQUERY -->
        <script src="{$base_url}public/plugins/jquery/1.10.2/jquery.min.js"></script>
        <!-- SWEETALERT -->
        <script async src="{$base_url}public/plugins/sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="{$base_url}public/plugins/sweetalert-master/dist/sweetalert.css" type="text/css"> 
      
    <script src="{$base_url}public/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <script> var base_url = "{$base_url}";</script>
    <script src="{$base_url}public/plugins/jqueryui/1.11.2/jquery-ui.js"></script>

    <script>
       function cierraNav(){
        alert ("Ud esta abandonando este sitio, su sesion se finalizara");
        }
   
    </script>

    <script src="{$base_url}public/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{$base_url}public/plugins/datatable/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.example-table').DataTable({
                "language": {
                    "sSearch":"Buscar:",
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No se encontraron registros",
                    "info": "P&aacutegina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros"
                }
            });
        } );

    </script>


    <script type="text/javascript">
        /*$(document).ready(function(){*/
            /*$(window).unload(function(){
                alert("Goodbye!");
            });*/
        /*});*/

        /*$(window).unload(function () {
            alert();
            if(base_url + 'site/streaming' == window.location){
                $.post(base_url + 'formulario/salir',
                    {},
                    function (response) {
                            
                });
            }            
        });*/

        /*$(window).on('beforeunload', function() {
           alert();
         });*/

    </script>

    <!--<script src="{$base_url}public/plugins/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>-->

    <script src='{$base_url}public/plugins/js/jquery.flexslider-min.js'></script>
    <script  src='{$base_url}public/plugins/js/jquery.meanmenu.min.js'></script>
    <script src='{$base_url}public/plugins/js/jquery.velocity.min.js'></script>
    <script src='{$base_url}public/plugins/js/custom.js?ver=1.0'></script>  

    <!--<script src="{$base_url}public/plugins/owl-carousel/owl.carousel.min.js"></script>-->
    <script>
    /*$(document).ready(function() {
        $(".owl-staff").owlCarousel({
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });
    });*/
    </script>
    <script src='{$base_url}public/plugins/fancybox/js/fancybox/jquery.fancybox.js'></script> 

	<script type="text/javascript">
        /*if($('#input-mask').length){
                $(":input").inputmask();
        }*/
    </script> 


    <script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox(
						{ 	maxWidth    : 820,
    						maxHeight   : 570,
    					}
					);
			});
	</script> 

    <!--<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>-->
    <script src="{$base_url}public/web/js/process.js?v=1.6"></script>

    <!--<script type="text/javascript">
        {literal}
        var CaptchaCallback = function() {
            /*grecaptcha.render('Recaptcha1', {'sitekey' : '6LeizisUAAAAAAlgxeditjer-NR21hAa4eQWBiT_'});*/
            grecaptcha.render('Recaptcha2', {'sitekey' : '6LeizisUAAAAAAlgxeditjer-NR21hAa4eQWBiT_'});
        };
        {/literal}
    </script>-->

    <script type="text/javascript">

	    $('.datepicker2').datepicker({
	        dateFormat: 'dd-mm-yyyy',
	        //timeFormat: 'HH:mm',
	        stepHour: 1,
	        stepMinute: 1,
	        stepSecond: 1,
	        changeMonth: true,
	        changeYear: true,
	        yearRange: '2016:2020',
	    });
	</script>


	 <script type="text/javascript">
		function centerMapp0(item) {
		    mapp0.getPoi(item); 
		    mapp0.getPoi(item).open(); 
		    mapp0.getPoi(item).center(16);
		    
		    var url = location.href;    //Save down the URL without hash.
		    location.href = "#topMap";   //Go to the target element.

		}
	</script>

	<script type="text/javascript">
        /*$(document).ready(function(){*/
            /*$(window).unload(function(){
                alert("Goodbye!");
            });*/
        /*});*/

        /*$(window).unload(function () {
        	alert();
            if(base_url + 'site/streaming' == window.location){
        		$.post(base_url + 'formulario/salir',
                    {},
                	function (response) {
                            
				});
        	}            
        });*/

        $(window).on('beforeunload', function() {
           alert();
         });

    </script>

    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

    <!-- <script>
        $(document).ready(function(){
            $('#popoverData').popover();
            $('#popoverOption').popover({ trigger: "hover" });
        });
    </script> -->
    <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>

<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAhFTa6WTGQPxb6FLl7WFQ51l6hcYUKh2A&libraries=places'>
</script>

<script type='text/javascript'>
/* <![CDATA[ */
{literal}
var mappl10n = {"bicycling":"En bicicleta","bike":"Bicicleta","dir_not_found":"La direcci\u00f3n de inicio o final no se pudo encontrar.","dir_zero_results":"Google no puede devolver direcciones entre esas direcciones. No hay una ruta entre ellos o la informaci\u00f3n de enrutamiento no est\u00e1 disponible.","dir_default":"Error desconocido,imposible devolver ruta. C\u00f3digo de estado =","directions":"C\u00f3mo llegar","kml_error":"Error reading KML file","loading":"Cargando...","no_address":"No se ha encontrado la direcci\u00f3n\/es","no_geolocate":"No ha sido posible encontrar tu ubicaci\u00f3n","traffic":"Tr\u00e1fico","transit":"Tr\u00e1fico","zoom":"Zoom","options":{"admin":false,"ajaxurl":"http:\/\/multident.pe\/site\/wp-admin\/admin-ajax.php","apiKey":"0","debug":null,"iconsUrl":null,"language":"","postid":246,"siteUrl":"http:\/\/multident.pe\/site","standardIconsUrl":null,"country":"PE","defaultIcon":null,"directionsServer":"https:\/\/maps.google.com","directionsUnits":"0","iconScale":null,"poiZoom":"12","styles":[],"tooltips":true}};
{/literal}
/* ]]> */
</script>


<script type='text/javascript' src='{$base_url}public/plugins/google-map/js/mappress.min.js'></script>

{if isset($content_map)}{$content_map}{/if}


<script>
	
</script>

    </body>
</html>