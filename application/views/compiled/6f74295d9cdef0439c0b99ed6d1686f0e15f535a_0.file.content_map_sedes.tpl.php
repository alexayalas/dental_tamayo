<?php /* Smarty version 3.1.27, created on 2017-03-13 14:45:26
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/content_map_sedes.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:87859447758c6f6d67a84d2_44398276%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f74295d9cdef0439c0b99ed6d1686f0e15f535a' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/content_map_sedes.tpl',
      1 => 1481299964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87859447758c6f6d67a84d2_44398276',
  'variables' => 
  array (
    'markers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c6f6d682f507_99796360',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c6f6d682f507_99796360')) {
function content_58c6f6d682f507_99796360 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '87859447758c6f6d67a84d2_44398276';
?>
<?php echo '<script'; ?>
>
var mapas = <?php echo $_smarty_tpl->tpl_vars['markers']->value;?>
;

//<![CDATA[
mapp.data.push( {"mapid":"2","width":"90%","height":"400","zoom":5,"center":{"lat":-11.809334565916,"lng":-75.292465690146},"mapTypeId":"roadmap","title":"Sedes Multident","metaKey":null,"query":null,"queryResult":null,"pois":mapas,"options":{"adaptive":false,"alignment":"center","autoicons":null,"apiKey":"0","apiKeyServer":"","autodisplay":"top","bicycling":false,"bigWidth":"100%","bigHeight":"400px","connect":null,"country":"PE","css":true,"defaultIcon":null,"directions":"google","directionsServer":"https:\/\/maps.google.com","directionsUnits":"0","draggable":true,"editable":false,"footer":true,"from":null,"geocoders":["google"],"hidden":false,"hideEmpty":false,"iconScale":null,"initialBicycling":false,"initialOpenDirections":false,"initialOpenInfo":false,"initialTraffic":false,"initialTransit":false,"iwType":"iw","keyboardShortcuts":true,"language":"","mapLinks":[],"mapTypeControl":false,"mapTypeControlStyle":"0","mapTypeId":"roadmap","mapTypeIds":["roadmap","satellite"],"mashupTitle":"poi","mashupBody":"poi","mashupClick":"poi","mashupLink":true,"maxZoom":null,"minZoom":null,"metaKey":null,"metaKeyAddress":[],"metaKeyLat":null,"metaKeyLng":null,"metaKeyIconid":null,"metaKeyTitle":null,"metaKeyBody":null,"metaKeyZoom":null,"metaErrors":true,"metaSyncSave":true,"metaSyncUpdate":false,"name":null,"overviewMapControl":false,"overviewMapControlOpened":false,"panControl":true,"poiLinks":["zoom","directions_to"],"poiList":false,"poiZoom":"12","postTypes":["post","page","doctor"],"radius":15,"rotateControl":true,"scaleControl":false,"scrollwheel":false,"search":null,"size":"0","sizes":[{"width":300,"height":300},{"width":425,"height":350},{"width":640,"height":480}],"sort":true,"streetViewControl":true,"style":null,"styles":[],"template":"map_layout","templateDirections":"map_directions","templatePoi":"map_poi","templatePoiList":"map_poi_list","thumbs":true,"thumbSize":null,"thumbWidth":64,"thumbHeight":64,"tilt":0,"to":null,"tooltips":true,"transit":false,"traffic":false,"zoomControl":true,"zoomControlStyle":"1"},"name":"mapp0"} ); if (typeof mapp.load != 'undefined') { mapp.load(); };
	//]]>
	


<?php echo '</script'; ?>
><?php }
}
?>