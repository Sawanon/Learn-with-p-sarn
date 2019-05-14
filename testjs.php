<?php
include("connect.php");
include("header.php");
include("left.php");
 ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Test</h1>
  </section>
  <section class="content">
    test
    <div id="calendar"></div>
  </section>
</div>

<?php
include("footer.php");
 ?>
 <script>
 $('#calendar').fullCalendar({
eventClick: function(calEvent, jsEvent, view) {

  alert('Event id: ' + calEvent.id);
  alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
  alert('View: ' + view.name);

  // change the border color just for fun
  $(this).css('border-color', 'red');

}
});
 </script>
