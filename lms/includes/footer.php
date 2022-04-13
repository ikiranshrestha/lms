
          
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

       <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2020-2021 <a href="http://sumitra2@library.com">library purpose</a>.</strong> All rights reserved.
      </footer> 

    </div><!-- ./wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/app.min.js" type="text/javascript"></script> -->
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script> -->

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js" type="text/javascript"></script> -->
    
  </body>

  <script>
    $(document).ready(function(){
      $('.t1').on('click',()=>{
        $('.tm1').toggle('slow');
        $('.tm2').hide('slow');
        $('.tm3').hide('slow');
        $('.tm4').hide('slow');
      })
    })
    $(document).ready(function(){
      $('.t2').on('click',()=>{
        $('.tm1').hide('slow');
        $('.tm2').toggle('slow');
        $('.tm3').hide('slow');
        $('.tm4').hide('slow');
      })
    })
    $(document).ready(function(){
      $('.t3').on('click',()=>{
        $('.tm1').hide('slow');
        $('.tm2').hide('slow');
        $('.tm3').toggle('slow');
        $('.tm4').hide('slow');     
       })
    })
    $(document).ready(function(){
      $('.t4').on('click',()=>{
        $('.tm1').hide('slow');
        $('.tm2').hide('slow');
        $('.tm3').hide('slow');
        $('.tm4').toggle('slow');
            })
    })
  </script>
</html>