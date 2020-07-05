<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/admin_template/html/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?=base_url()?>assets/admin_template/html/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?=base_url()?>assets/admin_template/html/js/waves.js"></script>
<!--Counter js -->
<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!-- chartist chart -->
<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?=base_url()?>assets/admin_template/html/js/custom.min.js"></script>
<script src="<?=base_url()?>assets/admin_template/html/js/dashboard1.js"></script>
<script src="<?=base_url()?>assets/admin_template/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/addons/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap-tagsinput.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap-tagsinput-angular.js"></script> -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
<script>
$(document).ready(function () {
$('#dtBasicExample').DataTable({
    "scrollX" : true,
    "searching": true,
    "bPaginate": true,
    "bDestroy": false,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": true,
});
$('#pembeli').DataTable({
	 "aaSorting": [[5, "desc" ]]
    // "scrollX" : true,
    // "searching": true,
    // "bPaginate": true,
    // "bDestroy": false,
    // "bLengthChange": true,
    // "bFilter": true,
    // "bInfo": false,
    // "bAutoWidth": true,
});
$('.dataTables_length').addClass('bs-select');
});
</script>