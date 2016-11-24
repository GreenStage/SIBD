<?php
  session_start();
  require_once('sql_funcs.php');
?>
<html>
    <head>
        <title>Patient reception</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
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

                $sql = "SELECT doctor_id, date, office FROM appointment WHERE patient_id = :patient_id ";
                $result = sql_secure_query($connection,$sql, Array( ":patient_id" => $_SESSION['patient_id'] ) );

                $connection = null;

                if ($result->rowCount() == 0)
                    echo("<p>There is no appointments registed.</p>");

                else
                {
                    echo("<table style=\"min-width:415px; margin-top:15px\" class=\"table table-striped table-bordered\">");
                    echo("<tr><td>doctor_id</td><td>date</td><td>office</td></tr>");
                    foreach($result as $row)
                    {
                        echo("<tr><td>");
                        echo($row['doctor_id']);
                        echo("</td><td>");
                        echo($row['date']);
                        echo("</td><td>");
                        echo($row['office']);
                        echo("</td></tr>");
                    }
                    echo("</table>");
                }
                $connection = null;

            echo("<p><a href=\"patient_recp.php\">Accept new client</a>");
            echo("<a style=\"float:right\" href=\"newappointment.php?patient_id=".$_SESSION['patient_id']."\">Schedule another appointment</a></p>");
            ?>
        </div>
      </div>

    </body>

</html>
