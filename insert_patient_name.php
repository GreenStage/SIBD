<?php
require_once('sql_funcs.php');
session_start();
session_destroy();
session_start();
$_SESSION['patient_name'] = $_POST['patient_name'];
?>
<html>
    <head>
        <title>Patient reception</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>

      <div class="center_ct">
        <div class ="center">
            <?php
                $connection = null;
                new_connection($connection);

                $result = sql_secure_query($connection, "SELECT * FROM patient WHERE name = :patient_name ORDER BY name", Array(":patient_name" =>  $_SESSION['patient_name'] ) );

                $connection = null;

                $nrows = $result->rowCount();

                if ($nrows == 0)
                {
                    echo("<p class=\"alert alert-warning\">There is no registed patient with the name:  {$_SESSION['patient_name']} .</p>");
                }
                else
                {
                  echo ("<h3>Select Patient</h3>");

                  if( $nrows == 1)
                    echo ("<p class=\"alert alert-info\"> 1 match found for name <b>" .$_SESSION['patient_name'] . "</b></p>");
                  else
                    echo ("<p class=\"alert alert-info\"> ".$nrows." matches found for name <b>" .$_SESSION['patient_name'] . "</b></p>");

                    echo("<table class=\"table table-striped table-bordered\"> ");
                    echo("<tr><td>patient_id</td><td>name</td><td>birthday</td><td>address</td></tr>");
                    foreach($result as $row)
                    {
                        echo("<tr><td>");
                        echo($row['patient_id']);
                        echo("</td><td>");
                        echo($row['name']);
                        echo("</td><td>");
                        echo($row['birthday']);
                        echo("</td><td>");
                        echo($row['address']);
                        echo("</td><td>");
                        echo("<a href=\"newappointment.php?patient_id=");
                        echo($row['patient_id']);
                        echo("\"> <span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span>Schedule appointment</a>");
                        echo("</td></tr>");
                    }
                    echo("</table>");
                }
                echo("<p><a href=\"insert_patient_data.php?name_holder=". $_SESSION['patient_name']."\">Register new patient</a></p>");
            ?>
            <a href="cancel.php" class=" btn btn-danger">Cancel</a>
        </div>
      </div>

</html>
