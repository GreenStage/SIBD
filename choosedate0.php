<?php
  session_start();

  $_SESSION['doctor_name'] = $_GET['name'];

  $_SESSION['doctor_id'] = $_GET['doctor_id'];

?>

<html>
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css" >
    <link rel="stylesheet" href="css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js" ></script>
    <style type="text/css">
      #new_appo .form-control-feedback {
          top: 30px;
          right: -30px;
      }
    </style>
  </head>
 <body>

   <div class="center_ct">
     <div class ="center" style="max-width:500px">

       <p><h2 style="float:left">Selected Patient: &nbsp</h2>
       <h3 style="color: #366fd7"><?php echo($_SESSION['patient_name']); ?></h3></p>
       Patient ID: <?php echo($_SESSION['patient_id']); ?>

       <h3 style="clear:both">Schedule Your Appointment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3>
       <form id="new_appo" style="padding-top:2px" action="accept_app_schedule.php" method="post">
       <p> <div style="float:left"><b>Speciality choosen:</b>
         <?php
            echo($_SESSION['specialty']);
            echo (" </div>");
            echo ("&nbsp&nbsp&nbsp&nbsp&nbsp<b>Doctor</b>:&nbsp");
            echo($_SESSION['doctor_name']);

         ?>
        </p>
       <div class="form-group">
         <label class="control-label">Date:</label>
         <div class=" input-group input-append date"  id="datePicker">
           <input type="text" class="form-control" id="appointment_date" name="appointment_date"/>
           <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
         </div>
       </div>
         <button  style="float:left" type="submit" value="Submit"  class ="btn btn-primary">
           <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
           Submit
         </button>
       </form>
       <a href="cancel.php" class=" btn btn-danger">Cancel</a>
     </div>
   </div>
 </body>
 <script>
   $(document).ready(function() {
       $('#datePicker')
           .datepicker({
               format: 'mm/dd/yyyy'
           })
           .on('changeDate', function(e) {
               // Set the value for the date input
               $("#appointment_date").val($("#datePicker").datepicker('getFormattedDate'));

               // Revalidate it
               $('#new_appo').formValidation('revalidateField', 'appointment_date');
           });

       $('#new_appo').formValidation({
           framework: 'bootstrap',
           icon: {
               valid: 'glyphicon glyphicon-ok',
               invalid: 'glyphicon glyphicon-remove',
               validating: 'glyphicon glyphicon-refresh'
           },
           fields: {

               appointment_date: {
                   // The hidden input will not be ignored
                   excluded: false,
                   validators: {
                       notEmpty: {
                           message: 'The date is required'
                       },
                       date: {
                           format: 'MM/DD/YYYY',
                           message: 'The date is not a valid'
                       }
                   }
               }
           }
       });
   });
 </script>
 </script>
</html>
