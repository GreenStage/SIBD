<?php session_start(); ?>
<html>
 <body>
 <h3>Schedule Appointment - choose doctor</h3>
 <p>Speciality:
         <?php
            $_SESSION[patient_id] = $_REQUEST[patient_id];
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
            $sql = "SELECT * FROM doctor ORDER BY specialty";
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
                    echo("<p>There is no doctor registed</p>");
                }
                else
                {
                    echo("<table border=\"1\">");
                    echo("<tr><td>doctor name</td><td>specialty</td></tr>");
                    foreach($result as $row)
                    {
                        echo("<tr><td>");
                        echo($row['name']);
                        echo("</td><td>");
                        echo($row['specialty']);
                        echo("</td><td>");
                        echo("<a href=\"choosedate.php?doctor_id=");
                        echo($row['doctor_id']);
                        echo("\">Schedule appointment</a>"); 
                        echo("</td></tr>");
                    }
                    echo("</table>");
                }
                $connection = null;
         ?>
 </body>
</html>