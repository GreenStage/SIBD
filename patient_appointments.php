<?php
  session_start();
  require_once('sql_funcs.php');
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
        <div class ="center" >
          <p><h2 style="float:left">Selected Patient: &nbsp</h2>
          <h3 style="color: #366fd7"><?php echo($_SESSION['patient_name']); ?></h3></p>
          Patient ID: <?php echo($_SESSION['patient_id']); ?>
            <?php
                new_connection($connection);

                $sql = "SELECT name, date, office FROM appointment NATURAL JOIN doctor WHERE patient_id = :patient_id ";
                $result = sql_secure_query($connection,$sql, Array( ":patient_id" => $_SESSION['patient_id'] ) );

                $connection = null;

                if ($result->rowCount() == 0)
                    echo("<p>There is no appointments registed.</p>");

                else
                {
                    echo("<table style=\"min-width:415px; margin-top:15px\" class=\"table table-striped table-bordered\">");
                    echo("<tr><td>doctor</td><td>date</td><td>office</td></tr>");

                    foreach($result as $row){
                        echo("<tr>");
                        echo("<td>" . $row['name']    ."</td>");
                        echo("<td>" . $row['date']    ."</td>");
                        echo("<td>" . $row['office']  ."</td>");
                        echo("</tr>");
                    }

                    echo("</table>");
                }
                $connection = null;

            echo("<p><a href=\"session_end.php\">Accept new client</a>");
            echo("<a style=\"float:right\" href=\"newappointment.php\">Schedule another appointment</a></p>");
            ?>
        </div>
      </div>

    </body>

</html>
