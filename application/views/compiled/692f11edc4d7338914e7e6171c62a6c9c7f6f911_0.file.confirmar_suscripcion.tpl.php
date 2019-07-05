<?php /* Smarty version 3.1.27, created on 2017-03-13 18:33:56
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/correo/confirmar_suscripcion.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3006239658c72c64dbb4d2_40254454%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '692f11edc4d7338914e7e6171c62a6c9c7f6f911' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/correo/confirmar_suscripcion.tpl',
      1 => 1483569399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3006239658c72c64dbb4d2_40254454',
  'variables' => 
  array (
    'nombre' => 0,
    'link' => 0,
    'ip' => 0,
    'fecha' => 0,
    'pagina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c72c64eaf633_85827395',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c72c64eaf633_85827395')) {
function content_58c72c64eaf633_85827395 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3006239658c72c64dbb4d2_40254454';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <table width="100%" bgcolor="#f5f5f5" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>            
                    <td>                
                        <table align="center" bgcolor="#f5f5f5">
                            <tbody>
                                <tr>
                                    <td width="640">

                                        <table width="100%" bgcolor="#00B3E7" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr style="text-align: right;">
                                                    <td style="padding: 15px 5px 0px 0px;">
                                                        <img src="http://encuestamdm.mdmanagement.org/public/img/multident-logo.png">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:30px" align="left"><font style="text-align:center;font-size:30px" face="&#39;HelveticaNeue-Light&#39;, &#39;Helvetica Neue Light&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#ffffff">MULTIDENT NEWS</font></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <table width="100%" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" style="padding:20px" align="left">

                                                        <font style="font-size:14px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif">¡Hola <b><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</b>.!</font>
                                                        <br><br>
                                                        Bienvenido a Multident News, dentro de poco empezará a recibir nuestras noticias, novedades, ofertas y eventos de su interés.
                                                        <br><br>
                                                        Para confirmar su suscripción debe de dar click en el siguiente enlace: <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" target="_blank">CONFIRMAR</a>
                                                        <br><br>
                                                        ---- <br>
                                                        Este es un mensaje automatizado que se ha generado porque alguien con la dirección IP <b><?php echo $_smarty_tpl->tpl_vars['ip']->value;?>
</b> (posiblemente tú) el <b><?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
</b> rellenó el formulario de la siguiente página <a href="<?php echo $_smarty_tpl->tpl_vars['pagina']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['pagina']->value;?>
</a>.
                                                        Si estás seguro de que no has sido tú, por favor, ignora este mensaje, no se te enviará ninguno más.
                
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top:5px; border-top: 1px solid #00B3E7" align="left"><font style="font-size:10px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#999999"> 
                                            
                                                        <center> Copyright @2016 - Multident. Todos los derechos reservados. </center></font></td>
                                                </tr>
                                            </tbody>
                                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
</tbody>
</table>


</body></html><?php }
}
?>