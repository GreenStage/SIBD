<?php
  require_once('sql_funcs.php');
  session_start();
  $_SESSION['appointment_date'] = $_POST['appointment_date'];
  $_SESSION['specialty'] = $_POST['specialty'];
  $_SESSION['doctor_name'] = $_POST['doctor_name'];
  $_SESSION['appointment_day'] = date("l",strtotime($_POST['appointment_date']));
?>
<html>
  <head>
    <title>SIBD project part 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="center_ct" style="text-align:center">
      <div class ="center" >
        <p><h2 style="float:left">Selected Patient: &nbsp</h2>
        <h3 style="color: #366fd7"><?php echo($_SESSION['patient_name']); ?></h3></p>
        Patient ID: <?php echo($_SESSION['patient_id']); ?>
        <h3 style="min-width:415px">Please Verify Your Appointment </h3>
        <p> Speciality:&nbsp<b> <?php echo($_SESSION['specialty']); ?></b></p>
        <p> Doctor:&nbsp <b><?php echo($_SESSION['doctor_name']); ?></b> </p>
        <p> Date: &nbsp <b><?php echo $_SESSION['appointment_date'] . " " . $_SESSION['appointment_day']; ?></b></p>
            <?php

              if( $_SESSION['appointment_day'] === "Saturday" || $_SESSION['appointment_day'] === "Sunday" ){
                   echo("<p>Invalid date for appointment, the hospital does not take appointments at weekends");
                   echo("<p><a href=\"newappointment.php\">Choose another date</a></p>");
              }

              else if(strtotime(date('Y-m-d')) > strtotime(date('Y-m-d',strtotime($_SESSION['appointment_date'])))){

                  echo("<p>Invalid date for appointment, you cant schedule a appointment in a date that already has passed");
                  echo("<p><a href=\"newappointment.php\">Choose another date</a></p>");
              }

              else{
                 echo("<p><a href=\"newappointment.php\"> Change the specifications</a></p>");
                 echo("<a href=\"insert_appointment.php\" class=\" btn btn-default\">Confirm</a>&nbsp");
                 echo("<a href=\"session_end.php\" class=\" btn btn-danger\">Cancel</a>");
              }
            ?>
          </div>
        </div>
  </body>
</html>
