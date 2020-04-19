      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  
  <script src="<?php echo get_template_directory('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') ;?>" crossorigin="anonymous"></script>

  

  <!-- Custom scripts for all pages-->
  <script src="<?php echo get_template_directory('admin/js/sb-admin-2.min.js') ;?>" crossorigin="anonymous"></script>

  <!-- Page level plugins -->
  <script src="<?php echo get_template_directory('admin/vendor/chart.js/Chart.min.js') ;?>" crossorigin="anonymous"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo get_template_directory('admin/js/demo/chart-area-demo.js') ;?>" crossorigin="anonymous"></script>
  <script src="<?php echo get_template_directory('admin/js/demo/chart-pie-demo.js') ;?>" crossorigin="anonymous"></script>

  <!-- Datatables -->
  <script src="<?php echo get_template_directory('admin/vendor/datatables/jquery.dataTables.min.js') ;?>" crossorigin="anonymous"></script>
  <script src="<?php echo get_template_directory('admin/vendor/datatables/dataTables.bootstrap4.min.js') ;?>" crossorigin="anonymous"></script>
  <script src="<?php echo get_template_directory('admin/js/demo/datatables-demo.js') ;?>" crossorigin="anonymous"></script>

  <script src="<?php echo get_template_directory('admin/vendor/sweetalert2/sweetalert2.all.min.js') ;?>"></script>

  <script src="<?php echo get_template_directory('admin/js/sweetalert2call.js') ;?>" crossorigin="anonymous"></script>
  <script src="<?php echo get_template_directory('admin/js/function.js') ;?>" crossorigin="anonymous"></script>
  <script src="<?php echo get_template_directory('admin/js/imgupload.js') ;?>" crossorigin="anonymous"></script>
</body>

</html>