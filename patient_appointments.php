<?php session_start(); ?>
<html>
    <head>
        <title>Patient reception</title>
    </head>
    <body>
        <h2>Actual Patient</h2>
        <p>Name:<?php echo($_SESSION['patient_name']); ?></p>
        <p>Patien_id:<?php echo($_SESSION['patient_id']); ?></p>
        <h3>Appointment table</h3>
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
                $patient_id = $_SESSION['patient_id'];
                $sql = "SELECT doctor_id, date, office FROM appointment WHERE patient_id = $patient_id ";
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
                    echo("<p>There is no appointments registed.</p>");
                }
                else
                {
                    echo("<table border=\"1\">");
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
            ?>
    </body>
    <p><a href="patient_recp.php">Accept new client</a></p>
    <p><a href="newappointment.php">Schedule another appointment</a></p>
</html>
