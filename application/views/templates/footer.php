<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">

    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/js/adminlte.min.js'); ?>"></script>

<?php
$scriptMappings = [
  'datacuti' => [
    unserialize(DATATABLES_SCRIPTS),
    unserialize(SWAL_SCRIPTS),
    unserialize(SELECT2_SCRIPTS),
    unserialize(DATERANGE_SCRIPTS),
    unserialize(PIE_SCRIPTS),
    unserialize(CUSTOM_SCRIPTS)
  ],
  'satker' => [
    unserialize(SWAL_SCRIPTS),
    unserialize(DATATABLES_SCRIPTS),
    unserialize(PIE_SCRIPTS),
    unserialize(CUSTOM_SCRIPTS)
  ]
];

$activePage = 'satker';



$scripts = isset($scriptMappings[$activePage]) ? $scriptMappings[$activePage] : [];

foreach ($scripts as $script) {
  echo include_scripts($script);
}
?>


</body>

</html>