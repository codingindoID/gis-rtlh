<!-- General JS Scripts -->

<!-- <script src="<?= base_url('assets/') ?>modules/jquery.min.js"></script> -->
<script src="<?= base_url('assets/') ?>modules/popper.js"></script>
<script src="<?= base_url('assets/') ?>modules/tooltip.js"></script>
<script src="<?= base_url('assets/') ?>modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/') ?>js/stisla.js"></script>


<!-- JS Libraies -->
<script src="<?= base_url('assets/') ?>modules/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/select2/dist/js/select2.full.min.js"></script>
<!-- Template JS File -->
<script src="<?= base_url('assets/') ?>js/scripts.js"></script>
<script src="<?= base_url('assets/') ?>js/custom.js"></script>

<script>
    $(document).ready(function() {

        $(".data-table").dataTable();
        $(".select2").select2();

        setTimeout(() => {
            $('.alert').hide()
        }, 3000);

    });
</script>