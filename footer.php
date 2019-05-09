<footer class="main-footer">

</footer>


<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!--test modal-->
<?php
/*<div id="fullCalModal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
              <h4 id="modalTitle" class="modal-title"></h4>
          </div>
          <div id="modalBody" class="modal-body"></div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button class="btn btn-primary"><a id="eventUrl" target="_blank">Event Page</a></button>
          </div>
      </div>
  </div>
</div>*/
?>
<!--end test modal-->


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script>
$(document).ready(function () {
  $('.sidebar-menu').tree()

  $('#bootstrapModalFullCalendar').fullCalendar({
      events: '/hackyjson/cal/',
      header: {
          left: '',
          center: 'prev title next',
          right: ''
      },
      eventClick:  function(event, jsEvent, view) {
          $('#modalTitle').html(event.title);
          $('#modalBody').html(event.description);
          $('#eventUrl').attr('href',event.url);
          $('#fullCalModal').modal();
      }
  });

})

</script>
</body>
</html>
