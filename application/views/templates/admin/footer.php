        <footer>
          <div class="pull-right">
            DOM CAR RENTAL KIDAPAWAN</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url();?>design/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url();?>design/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url();?>design/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url();?>design/admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?=base_url();?>design/admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?=base_url();?>design/admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url();?>design/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url();?>design/admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?=base_url();?>design/admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?=base_url();?>design/admin/vendors/Flot/jquery.flot.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url();?>design/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?=base_url();?>design/admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?=base_url();?>design/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url();?>design/admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="<?=base_url();?>design/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url();?>design/admin/build/js/custom.min.js"></script>

    <script>
      $('.addCarType').click(function(){
        document.getElementById('car_type_id').value = '';
        document.getElementById('car_type_description').value = '';
      });
      $('.editCarType').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('car_type_id').value = id[0];
        document.getElementById('car_type_description').value = id[1];
      });
      $('.addCar').click(function(){
        document.getElementById('car_id').value = '';
        document.getElementById('car_description').value = '';
        document.getElementById('car_type').value = '';
        document.getElementById('car_fuel_type').value = '';
        document.getElementById('car_amount').value = '';
      });
      $('.editCar').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('car_id').value = id[0];
        document.getElementById('car_description').value = id[1];
        document.getElementById('car_type').value = id[2];
        document.getElementById('car_fuel_type').value = id[3];
        document.getElementById('car_amount').value = id[4];
      });
      $('.addCarImage').click(function(){
        var id=$(this).data('id');
        document.getElementById('car_image_id').value = id;
      });
    </script>
  </body>
</html>
