<?php /* Smarty version 3.1.27, created on 2019-07-26 05:34:39
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\web\structure\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:115735d3ad73fa07276_94105854%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbb72820e56a1559bb2f04d35f7a470ff069d1e7' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\web\\structure\\footer.tpl',
      1 => 1564137272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115735d3ad73fa07276_94105854',
  'variables' => 
  array (
    'base_url' => 0,
    'content_map' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d3ad73fa803d1_90978176',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d3ad73fa803d1_90978176')) {
function content_5d3ad73fa803d1_90978176 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '115735d3ad73fa07276_94105854';
?>
	<!-- JQUERY -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jquery/1.10.2/jquery.min.js"><?php echo '</script'; ?>
>
        <!-- SWEETALERT -->
        <?php echo '<script'; ?>
 async src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/sweetalert-master/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/sweetalert-master/dist/sweetalert.css" type="text/css"> 
      
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
> var base_url = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";<?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jqueryui/1.11.2/jquery-ui.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
       function cierraNav(){
        alert ("Ud esta abandonando este sitio, su sesion se finalizara");
        }
   
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datatable/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/datatable/js/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
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

    <?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
        /*$(document).ready(function());*/

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

    <?php echo '</script'; ?>
>

    <!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"><?php echo '</script'; ?>
>-->

    <?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/js/jquery.flexslider-min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
  src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/js/jquery.meanmenu.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/js/jquery.velocity.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/js/custom.js?ver=1.0'><?php echo '</script'; ?>
>  

    <!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/owl-carousel/owl.carousel.min.js"><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
>
    /*$(document).ready(function() {
        $(".owl-staff").owlCarousel({
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });
    });*/
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/fancybox/js/fancybox/jquery.fancybox.js'><?php echo '</script'; ?>
> 

	<?php echo '<script'; ?>
 type="text/javascript">
        /*if($('#input-mask').length){
                $(":input").inputmask();
        }*/
    <?php echo '</script'; ?>
> 


    <?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox(
						{ 	maxWidth    : 820,
    						maxHeight   : 570,
    					}
					);
			});
	<?php echo '</script'; ?>
> 

    <!--<?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/web/js/process.js?v=1.6"><?php echo '</script'; ?>
>

    <!--<?php echo '<script'; ?>
 type="text/javascript">
        
        var CaptchaCallback = function() {
            /*grecaptcha.render('Recaptcha1', {'sitekey' : '6LeizisUAAAAAAlgxeditjer-NR21hAa4eQWBiT_'});*/
            grecaptcha.render('Recaptcha2', {'sitekey' : '6LeizisUAAAAAAlgxeditjer-NR21hAa4eQWBiT_'});
        };
        
    <?php echo '</script'; ?>
>-->

    <?php echo '<script'; ?>
 type="text/javascript">

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
	<?php echo '</script'; ?>
>


	 <?php echo '<script'; ?>
 type="text/javascript">
		function centerMapp0(item) {
		    mapp0.getPoi(item); 
		    mapp0.getPoi(item).open(); 
		    mapp0.getPoi(item).center(16);
		    
		    var url = location.href;    //Save down the URL without hash.
		    location.href = "#topMap";   //Go to the target element.

		}
	<?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
        /*$(document).ready(function());*/

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

    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
    <?php echo '</script'; ?>
>

    <!-- <?php echo '<script'; ?>
>
        $(document).ready(function(){
            $('#popoverData').popover();
            $('#popoverOption').popover({ trigger: "hover" });
        });
    <?php echo '</script'; ?>
> -->
    <?php echo '<script'; ?>
>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAhFTa6WTGQPxb6FLl7WFQ51l6hcYUKh2A&libraries=places'>
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type='text/javascript'>
/* <![CDATA[ */

var mappl10n = {"bicycling":"En bicicleta","bike":"Bicicleta","dir_not_found":"La direcci\u00f3n de inicio o final no se pudo encontrar.","dir_zero_results":"Google no puede devolver direcciones entre esas direcciones. No hay una ruta entre ellos o la informaci\u00f3n de enrutamiento no est\u00e1 disponible.","dir_default":"Error desconocido,imposible devolver ruta. C\u00f3digo de estado =","directions":"C\u00f3mo llegar","kml_error":"Error reading KML file","loading":"Cargando...","no_address":"No se ha encontrado la direcci\u00f3n\/es","no_geolocate":"No ha sido posible encontrar tu ubicaci\u00f3n","traffic":"Tr\u00e1fico","transit":"Tr\u00e1fico","zoom":"Zoom","options":{"admin":false,"ajaxurl":"http:\/\/multident.pe\/site\/wp-admin\/admin-ajax.php","apiKey":"0","debug":null,"iconsUrl":null,"language":"","postid":246,"siteUrl":"http:\/\/multident.pe\/site","standardIconsUrl":null,"country":"PE","defaultIcon":null,"directionsServer":"https:\/\/maps.google.com","directionsUnits":"0","iconScale":null,"poiZoom":"12","styles":[],"tooltips":true}};

/* ]]> */
<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/google-map/js/mappress.min.js'><?php echo '</script'; ?>
>

<?php if (isset($_smarty_tpl->tpl_vars['content_map']->value)) {
echo $_smarty_tpl->tpl_vars['content_map']->value;
}?>


<?php echo '<script'; ?>
>
	
<?php echo '</script'; ?>
>

    </body>
</html><?php }
}
?>