<?php /* Smarty version 3.1.27, created on 2019-07-06 09:55:41
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\admin\structure\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:236485d20b66de893e7_68159742%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7efcc94e5b53dd232bb4400c5304292f13eb1106' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\admin\\structure\\footer.tpl',
      1 => 1562189625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236485d20b66de893e7_68159742',
  'variables' => 
  array (
    'base_url' => 0,
    'list_tags' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d20b66debf842_93688504',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d20b66debf842_93688504')) {
function content_5d20b66debf842_93688504 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '236485d20b66de893e7_68159742';
?>
<?php echo '<script'; ?>
>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            showOtherMonths: true,
            selectOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            yearRange: '2016:2030'

        });

    });

<?php echo '</script'; ?>
>

<!-- Bootstrap 3.3.5 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
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

<!-- AdminLTE App -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/theme/js/app.min.js"><?php echo '</script'; ?>
>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/theme/js/demo.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jasny-bootstrap-fileinput/js/jasny-bootstrap.fileinput.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/jqueryui/1.11.2/jquery-ui.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">

    $('.datepicker2').datepicker({
        dateFormat: 'dd-mm-yy',
        timeFormat: 'HH:mm',
        stepHour: 1,
        stepMinute: 1,
        stepSecond: 1,
        changeMonth: true,
        changeYear: true,
        yearRange: '2016:2020',
    });
<?php echo '</script'; ?>
>

<!-- TAGS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/tags/js/tag-it.js" charset="utf-8"><?php echo '</script'; ?>
>

<!-- SCRIPT -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/js/scripts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/admin/js/process.js?v=1.0"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    var sample_tag=<?php if (isset($_smarty_tpl->tpl_vars['list_tags']->value)) {
echo $_smarty_tpl->tpl_vars['list_tags']->value;
} else { ?>[]<?php }?>;
    
    $('.simple_tag').tagit({
            availableTags: sample_tag,
            singleField: true,
            allowSpaces: true,
            singleFieldNode: $('#tag')
        });
    
<?php echo '</script'; ?>
>

</body>

</html><?php }
}
?>