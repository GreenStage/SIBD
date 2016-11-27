<?php
  require_once('sql_funcs.php');
  session_start();
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
      <div class="center_ct">
        <div class ="center">

          <?php
            new_connection($connection);
            $connection->beginTransaction();

            $sql = "INSERT INTO patient (name, birthday, address ) VALUES (:name,:birthday,:address)";

            $result = sql_secure_query($connection, $sql, Array(  ":name"      => $_SESSION['patient_name'] ,
                                                                  ":birthday"  => date('Y-m-d',strtotime($_SESSION['birthday'])) ,
                                                                  ":address"   => $_SESSION['address'] ) );
            $connection->exec($sql);

            $result = sql_secure_query($connection, "SELECT count(*) FROM patient");
            $row = $result->fetch();
            if( $_SESSION['appointment_day'] === "Saturday" || $_SESSION['appointment_day'] === "Sunday" ){

                 echo("<p>Invalid date for appointment, the hospital does not take appointments at weekends");
                 echo("<p><a href=\"insert_patient_data.php\">Redo operation</a></p>");
                 
                $connection->rollback();
            }else{
               $sql = "SELECT count(*) FROM appointment WHERE date = :appointment_date";
               $result = sql_secure_query($connection, $sql, Array(":appointment_date" => date('Y-m-d',strtotime($_SESSION['appointment_date']))));

               $row = $result->fetch();
               $consultorio = "Consultorio_".($row['count(*)'] + 1);

               $sql = "INSERT INTO appointment VALUES (:patient_id,:doctor_id,:appointment_date,:consultorio)";

               $result = sql_secure_query($connection, $sql, Array(  ":patient_id"        => $_SESSION['patient_id'] ,
                                                                      ":doctor_id"        => $_SESSION['doctor_id'] ,
                                                                      ":appointment_date" => date('Y-m-d',strtotime($_SESSION['appointment_date']) ),
                                                                      ":consultorio"       => $consultorio) );
                $connection->exec($sql);
                $connection->commit();

                echo("<p class=\"alert alert-success\"> <span class=\"glyphicon glyphicon-ok\"></span> Patient registed and appointment inserted in database </p>");
                echo("<p><a href=\"patient_appointments.php\">Check appointments for this patient</a>");
                echo("<p><a href=\"newappointment.php\">Schedule another appointment</a></p>");
                echo("<p><a href=\"patient_regist.php\">Check the patients registed</a>");
                echo("<p><a href=\"session_end.php\">Accept new client</a>");


            }
            $connection = NULL;
          ?>
        </div>
      </div>
    </body>

</html>
