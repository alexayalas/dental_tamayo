<?php /* Smarty version 3.1.27, created on 2019-07-25 16:18:00
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\correo\consulta_contactenos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:244805d3a1c8815fba2_88206308%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dc84d4c54983c5c42afa1ceab3ffac2fa99820e' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\correo\\consulta_contactenos.tpl',
      1 => 1564082564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244805d3a1c8815fba2_88206308',
  'variables' => 
  array (
    'nombre' => 0,
    'correo' => 0,
    'fecha' => 0,
    'asunto' => 0,
    'mensaje' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d3a1c8833d8f1_93459679',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d3a1c8833d8f1_93459679')) {
function content_5d3a1c8833d8f1_93459679 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '244805d3a1c8815fba2_88206308';
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

                                        <table width="100%" bgcolor="#337ab7" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr style="text-align: center;">
                                                    <td style="padding: 15px 5px 0px 0px;">
                                                        <img src="http://198.199.69.176/demoweb/public/imagen/logo/logo-tamayo-blanco.png" width="150" height="60">
                                                    </td>
                                                </tr>
                                                <tr style="text-align: center;">
                                                    <td style="padding:10px" align="center"><font style="text-align:center;font-size:30px" face="&#39;HelveticaNeue-Light&#39;, &#39;Helvetica Neue Light&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#ffffff">Recepción de Consulta desde la pagina web</font></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <table width="100%" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" style="padding:20px" align="left">

                                                        <font style="font-size:14px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif">Estimado(a).</font>
                                                        <br><br>
                                                        Se ha registrado una solicitud para cita y los datos son los siguientes:
                                                        <br><br>
                                                        1. <b>Nombre y Apellidos:</b> <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
<br>
                                                        2. <b>Email :</b> <?php echo $_smarty_tpl->tpl_vars['correo']->value;?>
<br> 
                                                        3. <b>Fecha :</b> <?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
<br>
                                                        4. <b>Asunto :</b> <?php echo $_smarty_tpl->tpl_vars['asunto']->value;?>
<br>
                                                        5. <b>Mensaje :</b> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<br>
                
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top:5px; border-top: 1px solid #00B3E7" align="left"><font style="font-size:10px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#999999"> 
                                            
                                                        <center> Copyright @2019 - Dental Tamayo. Todos los derechos reservados. </center></font></td>
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