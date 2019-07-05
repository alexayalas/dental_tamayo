<script>
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

</script>

<!-- Bootstrap 3.3.5 -->
<script src="{$base_url}public/plugins/bootstrap/js/bootstrap.min.js"></script>

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

<!-- AdminLTE App -->
<script src="{$base_url}public/admin/theme/js/app.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="{$base_url}public/admin/theme/js/demo.js"></script>

<script src="{$base_url}public/plugins/jasny-bootstrap-fileinput/js/jasny-bootstrap.fileinput.min.js"></script>

<script src="{$base_url}public/plugins/jqueryui/1.11.2/jquery-ui.js"></script>


<script type="text/javascript">

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
</script>

<!-- TAGS -->
<script src="{$base_url}public/plugins/tags/js/tag-it.js" charset="utf-8"></script>

<!-- SCRIPT -->
<script src="{$base_url}public/admin/js/scripts.js"></script>
<script src="{$base_url}public/admin/js/process.js?v=1.0"></script>

<script type="text/javascript">
    var sample_tag={if isset($list_tags)}{$list_tags}{else}[]{/if};
    {literal}
    $('.simple_tag').tagit({
            availableTags: sample_tag,
            singleField: true,
            allowSpaces: true,
            singleFieldNode: $('#tag')
        });
    {/literal}
</script>

</body>

</html>