<?php session_start(); ?>
<html>
    <head> 
        <title>Patient reception</title> 
    </head>
    <body>
        <h3>Schedule Appointment - choose doctor</h3>
        <p> Speciality choosen: <?php echo($_REQUEST['specialty']); ?></p> 
            <?php
                $_SESSION['specialty'] = $_REQUEST['specialty'];
                $host = "db.ist.utl.pt";
                $user = "ist179138";
                $pass = "unho4435";
                $dsn = "mysql:host=$host;dbname=$user";
                try
                {
                    $connection = new PDO($dsn, $user, $pass);
                }
                catch(PDOException $exception)
                {
                    echo("<p>Error: ");
                    echo($exception->getMessage());
                    echo("</p>");
                    exit();
                }
                $specialty = $_REQUEST['specialty'];
                $sql = "SELECT * FROM doctor WHERE specialty = '$specialty' ORDER BY name";
                $result = $connection->query($sql);
                if ($result == FALSE)
                {
                    $info = $connection->errorInfo();
                    echo("<p>Error: {$info[2]}</p>");
                    exit();
                }
                $nrows = $result->rowCount();
                if ($nrows == 0)
                {
                    echo("<p>There is no registed doctors fo the specialty:$patient_name.</p>");
                }
                else
                {
                    echo("<table border=\"1\">");
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
    </body>
</html>