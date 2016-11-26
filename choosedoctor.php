<?php
  require_once('sql_funcs.php');
  session_start()
;?>
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

                <p><h2 style="float:left">Selected Patient: &nbsp</h2>
                <h3 style="color: #366fd7"><?php echo($_SESSION['patient_name']); ?></h3></p>
                Patient ID: <?php echo($_SESSION['patient_id']); ?>
                <h3 style="clear:both">Schedule Appointment - Choose Your Doctor</h3>
                <p> Speciality: <b><?php echo($_POST['specialty']); ?></b></p>
                <?php
                    if($_POST['specialty'] != NULL){
                      $_SESSION['specialty'] = $_POST['specialty'];
                    }
                    $connection = null;
                    new_connection($connection);

                    $sql = "SELECT * FROM doctor WHERE specialty = :specialty ORDER BY name";
                    $result =  sql_secure_query($connection, $sql, Array( ":specialty" =>  $_SESSION['specialty'] ) );

                    $connection = null;

                    if ($result->rowCount() == 0)
                        echo("<p>There is no registered doctors fo the specialty:  {$_SESSION['specialty'] }.</p>");



                    else
                    {
                        echo("<table class=\"table table-striped table-bordered\">");
                        echo("<tr><td>name</td></tr>");
                        foreach($result as $row)
                        {
                            echo("<tr><td>");
                            echo($row['name']);
                            echo("</td><td>");
                            if( $_SESSION['appointment_date'] == NULL){
                                echo("<a href=\"choosedate.php?doctor_id=");
                                echo($row['doctor_id']);
                                echo("&doctor_name=");
                                echo($row['name']);
                            }else{
                                echo("<a href=\"accept_app_schedule.php?doctor_id=");
                                echo($row['doctor_id']);
                                echo("&doctor_name=");
                                echo($row['name']);    
                            }
                            echo("\">Schedule for this doctor</a>");
                            echo("</td></tr>");
                        }
                        echo("</table>");
                    }
                      $connection = null;
                ?>
                <a href="cancel.php" class=" btn btn-danger">Cancel</a>
                  </div>
            </div>
    </body>
</html>
