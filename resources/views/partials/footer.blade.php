<footer class="main-footer">
	<div class="pull-right hidden-xs" style="font-family:Titillium Web, sans-serif">
		<b>Version</b> 1.0.0 Developed by <a href="#"  target="_blank" style="text-decoration: none; font-family:Titillium Web, sans-serif">Feisal Suleiman Mombo</a>
	</div>
	<strong style="text-align: center;font-family:Titillium Web, sans-serif">Copyright &copy; {{ date('Y') }} Smart Transporter Management Application<a href="#"  target="_blank" style="text-decoration: none; font-family:Titillium Web, sans-serif">(STMA)</a>.</strong> All Rights Reserved.
</footer>


<!-- jQuery 3 -->
<script src="{{asset('temp/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('temp/dist/js/permission_ajax.js')}}"></script>
{{-- <script src="{{asset('js/jquery-1.11.3.min')}}"></script>  --}}
<script src="{{asset('js/repeater.js')}}"></script>

<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('js/jquery.easy-autocomplete.js')}}"></script>
<script src="{{asset('js/jquery.easy-autocomplete.min.js')}}"></script>
<!--JQueryFile -->
{{--  <script src="{{asset('js/jQueryFile.js" type="text/javascript"></script>  --}}
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('temp/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('temp/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('temp/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('temp/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('temp/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('temp/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('temp/dist/js/demo.js')}}"></script>

<!-- AdminLTE for requests funs -->
<script src="{{asset('temp/dist/js/attachments_processings.js')}}"></script>
<!-- page script -->
<script>


  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
        function hid() {
            var soln = document.getElementById("sol");
             var savebt = document.getElementById("savebtn");
            if (soln.style.display === "none") {
                soln.style.display = "block";
                savebt.style.display ="none";
            } else {
                soln.style.display = "none";
            }
        }
</script>

</body>
</html>



