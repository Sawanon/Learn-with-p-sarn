<?php
include("header.php");
include("left.php");
 ?>
 <div class="content-wrapper">
   <section class="content-header">
     การจอง
   </section>
   <section class="content">
     <div class="box box-primary">
       <form action="selecttype.php" method="post" role="form">
       <div class="box-header with-border">
         <h3>รายละเอียดการจองของคุณ</h3>
       </div>
         <div class="box-body">
           <div class="form-group">
             <label>เลือกช่วงวันที่ต้องการใช้รถ : </label>
             <div class="input-group">
               <div class="input-group-addon">
                 <i class="fa fa-calendar"></i>
               </div>
               <input class="form-control pull-right" id="reservation" type="text" name="date" value="">
             </div>
           </div>
         </div>
         <div class="box-footer">
           <button class="btn btn-primary" type="submit" name="button">ยืนยัน</button>
         </div>
       </form>
     </div>
   </section>
 </div>
<?php
include("footer.php");
 ?>
<script>
$(function () {

//Initialize Select2 Elements
$('.select2').select2()
//Date range picker
$('#reservation').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    })
//Date picker
$('#datepicker').datepicker({
  autoclose: true
})
})
</script>
