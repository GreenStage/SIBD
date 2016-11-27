<html>
  <head>
    <title>SIBD project part 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
 <body>
  <?php
    session_start();
    require_once('sql_funcs.php');


    new_connection($connection);

    $sql = "SELECT doctor_id FROM doctor WHERE name = :doctor_name";
    $result= sql_secure_query($connection, $sql, Array( ":doctor_name" => $_SESSION['doctor_name'] ) );

    $row = $result->fetch();
    $_SESSION['doctor_id'] = $row['doctor_id'];

    $sql = "SELECT count(*) FROM appointment WHERE date = :appointment_date";
    $result = sql_secure_query($connection, $sql, Array( ":appointment_date" => date( 'Y-m-d',strtotime($_SESSION['appointment_date']) ) ) );

    $row = $result->fetch();
    $consultorio = "Consultorio_".($row['count(*)'] + 1);

    $sql = "INSERT INTO appointment VALUES (:patient_id, :doctor_id, :appointment_date, :consultorio)";
    $result = sql_secure_query($connection, $sql, Array(  ":patient_id"       => $_SESSION['patient_id'] ,
                                                          ":doctor_id"        => $_SESSION['doctor_id'] ,
                                                          ":appointment_date" => date('Y-m-d',strtotime($_SESSION['appointment_date'])) ,
                                                          ":consultorio"      => $consultorio ) );
    $connection = NULL;

  ?>
<div class="center_ct">
    <div class ="center">
      <p class="alert alert-success"> <span class="glyphicon glyphicon-ok"></span> Appointment inserted in database </p>
      <p><a href="patient_appointments.php">Check appointments for this patient</a></p>
      <?php
        echo("<p><a href=\"newappointment.php\">Schedule another appointment</a></p>");
      ?>
      <p><a href="session_end.php">Accept new client</a>
    </div>
</div>
</body>
