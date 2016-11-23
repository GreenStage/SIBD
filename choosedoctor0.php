<?php
  require_once('sql_funcs.php');
  session_start()
;?>
<html>
    <head>
        <title>Patient reception</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
      <div class="center_ct">
        <div class ="center">
            <h3>Schedule Appointment - choose doctor</h3>
            <p> Speciality choosen: <?php echo($_POST['specialty']); ?></p>
            <?php
                $_SESSION['specialty'] = $_POST['specialty'];

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
                        echo("<a href=\"choosedate0.php?doctor_id=");
                        echo($row['doctor_id']);
                        echo("&name=");
                        echo($row['name']);
                        echo("\">Schedule for this doctor</a>");
                        echo("</td></tr>");
                    }
                    echo("</table>");
                }
                  $connection = null;
            ?>
              </div>
            </div>
    </body>
</html>
