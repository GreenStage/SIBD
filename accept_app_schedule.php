<?php
  require_once('sql_funcs.php');
  session_start();
  $appointment_date = $_POST['appointment_date'];
  $appointment_day = date("l",strtotime($_POST['appointment_date']));
?>
<html>
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
 <body>
   <div class="center_ct" style="text-align:center">
     <div class ="center" >
       <h3>Schedule Appointment - verify appointment </h3>
       <p> Speciality:&nbsp<b> <?php echo($_SESSION['specialty']); ?></b></p>
       <p> Doctor:&nbsp <b><?php echo($_SESSION['doctor_name']); ?></b></p>
       <p> Date: &nbsp <b><?php echo $_POST['appointment_date'] . " " . $_SESSION['appointment_day']; ?></b></p>
           <?php
           if (((strcmp(  $_SESSION['appointment_day'], "Saturday") == 0) or (strcmp(  $_SESSION['appointment_day'], "Sunday") == 0)))
                      {
                          echo("<p>Invalid date for appointment, the hospital does not take appointments at weekends");
                          echo("<p><a href=\"choosedate0.php\">Choose another date</a></p>");

                      }
                      else
                      {

                          $_doctor_name = $_SESSION['doctor_name'];

                          $doctor_id = $_SESSION['doctor_id'];

                          $patient_id = $_SESSION['patient_id'];

                          $connection = null;
                          new_connection($connection);
                          $sql = "INSERT INTO appointment VALUES (:patient_id, :doctor_id, :appointment_date, 'consultorio2')";

                          $result = sql_secure_query($connection, $sql, Array(  ":patient_id"      => $patient_id ,
                                                                                ":doctor_id"       => $doctor_id ,
                                                                                ":appointment_date"=> $appointment_date ) );
                          $connection = NULL;

                          echo("<p> Appointment inserted in database</p>");

                      }
           ?>
         </div>
       </div>
 </body>
</html>
