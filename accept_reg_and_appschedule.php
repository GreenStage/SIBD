<?php
  require_once('sql_funcs.php');
  session_start();
  $_SESSION['patient_name'] = $_POST['patient_name'];
  $_SESSION['appointment_date'] = $_POST['appointment_date'];
  $_SESSION['birthday'] = $_POST['birthday'];
  $_SESSION['address'] = $_POST['address'];
  $_SESSION['specialty'] = $_POST['specialty'];
  $_SESSION['doctor_id'] = $_POST['doctor_id'];
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
       <h3 style="min-width:415px">Verify Patient data: </h3>

       <p> Name:&nbsp<b> <?php echo($_SESSION['patient_name']); ?></b></p>
       <p> Birthday:&nbsp <b><?php echo($_SESSION['birthday']); ?></b></p>
       <p> Adress:&nbsp <b><?php echo($_SESSION['address']); ?></b></p>
       <h3 style="min-width:415px">Verify Appointment </h3>
       <p> Speciality:&nbsp<b> <?php echo($_SESSION['specialty']); ?></b></p>
       <p> Doctor:&nbsp <b><?php
                  new_connection($connection);
                  $sql = "SELECT name  FROM doctor WHERE doctor_id = :doctor_id";
                  $result =  sql_secure_query($connection, $sql, Array( ":doctor_id" =>  $_SESSION['doctor_id']));
                  $row = $result->fetch();
                  echo($row['name']);
               ?></b></p>
       <p> Date: &nbsp <b><?php echo $_SESSION['appointment_date'] . " " . $_SESSION['appointment_day']; ?></b></p>
       <p><a href="insert_patient_data.php">Change information</a></p>
       <a href="reg_new_patient.php" class=" btn btn-default">Confirm</a>
       <a href="session_end.php" class=" btn btn-danger">Cancel</a>
         </div>
       </div>
 </body>

</html>
