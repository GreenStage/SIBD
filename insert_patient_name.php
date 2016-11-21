<?php session_start(); ?>
<html>
    <head> 
        <title>Patient reception</title> 
    </head>
    <body>
        <h3>Name received</h3>
            <?php
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
                $patient_name = $_REQUEST['patient_name'];
                $sql = "SELECT * FROM patient WHERE name = '$patient_name' ORDER BY name";
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
                    echo("<p>There is no registed patient with the name:$patient_name.</p>");
                }
                else
                {
                    echo("<table border=\"1\">");
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
                        echo("\">Schedule appointment</a>"); 
                        echo("</td></tr>");
                    }
                    echo("</table>");
                }
                $connection = null;
            ?>
    </body>
    <p><a href="patient_reg_recp.php">Registrate new patient</a></p>
</html>