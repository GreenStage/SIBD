<?php session_start(); ?>
<html>
 <body>
 <h3>Schedule Appointment - choose doctor specialty</h3>
 <form action="choosedoctor0.php" method="post">
 <p>Speciality:
     <select name="specialty">
         <?php
            $_SESSION['patient_id'] = $_REQUEST['patient_id'];
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
            $sql = "SELECT specialty FROM doctor ORDER BY specialty";
            $result = $connection->query($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }
            foreach($result as $row)
            {
                $specialty = $row['specialty'];
                echo("<option value=\"$specialty\">$specialty</option>");
            }

             $connection = null;
         ?> 
     </select>
     </p>
 <p><input type="submit" value="Submit"/></p>
 </form>
 </body>
</html>