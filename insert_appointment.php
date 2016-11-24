<html>
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
 <body>
  <?php
    session_start();
    require_once('sql_funcs.php');

    new_connection($connection);
    $sql = "INSERT INTO appointment VALUES (:patient_id, :doctor_id, :appointment_date, 'consultorio2')";

    $result = sql_secure_query($connection, $sql, Array(  ":patient_id"      => $_SESSION['patient_id'] ,
                                                          ":doctor_id"       => $_SESSION['doctor_id'] ,
                                                          ":appointment_date"=> $_SESSION['appointment_date'] ) );
    $connection = NULL;
  ?>


<div class="center_ct">
    <div class ="center">
      <p class="alert alert-success"> <span class="glyphicon glyphicon-ok"></span> Appointment inserted in database </p>
      <p><a href="patient_appointments.php">Check appointments for this patient</a></p>
      <?php
        echo("<p><a href=\"newappointment.php?patient_id=".$_SESSION['patient_id']."\">Schedule another appointment</a></p>");
      ?>
      <p><a href="session_end.php">Accept new client</a>
    </div>
</div>
</body>
