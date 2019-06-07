<?php
include("header.php");
include("left.php");
 ?>


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    echo $_COOKIE['cook'];
    $_SESSION['menu'] = 1;
     ?>
     <section class="content-header">
       <h1>รายการจอง</h1>
       <button class="btn btn-app" type="button" name="button"><span class='glyphicon glyphicon-exclamation-sign'></span></button>
     </section>
     <section class="content">
       <div class="row">
         <div class="col-md-7">
           <div class="box box-primary">
             <div class="box-body no-padding">
               <!-- THE CALENDAR -->
               <div id="calendar"></div>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /. box -->
         </div>
       </div>
      </section>

      <div id="calendarModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
      </div>

  </div>
  <!-- /.content-wrapper -->
<?php
include("footer.php");
 ?>
 <script>
 $(function () {

   /* initialize the external events
   -----------------------------------------------------------------*/
   function init_events(ele) {
     ele.each(function () {

       // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
       // it doesn't need to have a start or end
       var eventObject = {
         title: $.trim($(this).text()) // use the element's text as the event title
       }

       // store the Event Object in the DOM element so we can get to it later
       $(this).data('eventObject', eventObject)

       // make the event draggable using jQuery UI
       $(this).draggable({
         zIndex        : 1070,
         revert        : true, // will cause the event to go back to its
         revertDuration: 0  //  original position after the drag
       })

     })
   }

   init_events($('#external-events div.external-event'))

   /* initialize the calendar
   -----------------------------------------------------------------*/
   //Date for the calendar events (dummy data)
   var date = new Date()
   var d    = date.getDate(),
   m    = date.getMonth(),
   y    = date.getFullYear()
   $('#calendar').fullCalendar({
     header    : {
       left  : 'prev,next today',
       center: 'title',
       right : 'month,agendaWeek,agendaDay'
     },
     buttonText: {
       id   : 'id',
       today: 'today',
       month: 'month',
       week : 'week',
       day  : 'day'
     },
     //Random default events
     events    : [
       <?php
       $strsql = "SELECT * FROM booking";
       $query = $conn->query($strsql);
       while ($result = $query->fetch_array()) {
         $b_id = $result['b_id'];
         $startdate = $result['b_startdatetime'];
         $enddate = $result['b_enddatetime'];
         $detail = $result['b_detail'];
         $startyear = substr($startdate,0,4);
         $startmonth = substr($startdate,5,2)-1;
         $startday = substr($startdate,8,2);
         $starthr = substr($startdate,11,2);
         $startmin = substr($startdate,14,2);
         $endyear = substr($enddate,0,4);
         $endmonth = substr($enddate,5,2)-1;
         $endday = substr($enddate,8,2);
         $endhr = substr($enddate,11,2);
         $endmin = substr($enddate,14,2);
         echo "{";
         echo "id : '".$b_id."',";
         echo "title :  '".$detail."',";
         echo "start : new Date(".$startyear.", ".$startmonth.", ".$startday.", ".$starthr.", ".$startmin."),";
         echo "end : new Date(".$endyear.", ".$endmonth.", ".$endday.", ".$endhr.", ".$endmin.")";
         if ($result['b_status']=="A") {
           echo ",backgroundColor : '#f39c12',";
           echo "borderColor : '#f39c12' ";
         }else if($result['b_status']=="C"){
           echo ",backgroundColor : '#f56954',";
           echo "borderColor : '#f56954' ";
         }else if($result['b_status']=="D"){
           echo ",backgroundColor : '#3b9e1d',";
           echo "borderColor : '#3b9e1d' ";
         }
         echo "},";
       }
        ?>
     /*{
       id             : '1test',
       title          : 'show1',
       start          : new Date(2019, 4, 14, 09, 00),
       end            : new Date(2019, 4, 15, 12, 00)
     }*/
     ],
     eventClick: function(calEvent, jsEvent, view) {
       //เผื่ออยาก alert อะไรก็ตามนี้งับ
       /*alert('Event id: ' + calEvent.id);
       alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
       alert('View: ' + view.name);*/

       $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);
            $('#calendarModal').modal();
      //Ajax เปลี่ยนค่าใน modal ตาม id ที่ return ค่ามา
        showDetail(calEvent.id);
     },
     //editable  : true,
     droppable : true, // this allows things to be dropped onto the calendar !!!
     drop      : function (date, allDay) { // this function is called when something is dropped

       // retrieve the dropped element's stored Event Object
       var originalEventObject = $(this).data('eventObject')

       // we need to copy it, so that multiple events don't have a reference to the same object
       var copiedEventObject = $.extend({}, originalEventObject)

       // assign it the date that was reported
       copiedEventObject.start           = date
       copiedEventObject.allDay          = allDay
       copiedEventObject.backgroundColor = $(this).css('background-color')
       copiedEventObject.borderColor     = $(this).css('border-color')

       // render the event on the calendar
       // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
       $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

       // is the "remove after drop" checkbox checked?
       if ($('#drop-remove').is(':checked')) {
         // if so, remove the element from the "Draggable Events" list
         $(this).remove()
       }

     }
   })


   /* ADDING EVENTS */
   var currColor = '#3c8dbc' //Red by default
   //Color chooser button
   var colorChooser = $('#color-chooser-btn')
   $('#color-chooser > li > a').click(function (e) {
     e.preventDefault()
     //Save color
     currColor = $(this).css('color')
     //Add color effect to button
     $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
   })
   $('#add-new-event').click(function (e) {
     e.preventDefault()
     //Get value and make sure it is not null
     var val = $('#new-event').val()
     if (val.length == 0) {
       return
     }

     //Create events
     var event = $('<div />')
     event.css({
       'background-color': currColor,
       'border-color'    : currColor,
       'color'           : '#fff'
     }).addClass('external-event')
     event.html(val)
     $('#external-events').prepend(event)

     //Add draggable funtionality
     init_events(event)

     //Remove event from text input
     $('#new-event').val('')
   })

 })
 function showDetail(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("modalBody").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("modalBody").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "showdetail.php?a="+str, true);
  xhttp.send();
}
</script>
