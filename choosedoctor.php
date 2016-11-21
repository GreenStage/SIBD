<?php session_start(); ?>
<html>
 <body>
 <h3>Schedule Appointment - choose doctor </h3>
 <form action="choosedate.php" method="post">
 <p> Speciality choosen: <?php echo($_REQUEST['specialty']); ?></p>     
 <p>Doctor:
     <select name="doctor_name">
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
            $sql = "SELECT name FROM doctor WHERE specialty = '$specialty' ORDER BY name";
            $result = $connection->query($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }
            foreach($result as $row)
            {
                $doctor_name = $row['name'];
                echo("<option value=\"$doctor_name\">$doctor_name</option>");
            }

             $connection = null;
         ?> 
     </select>
     </p>
 <p><input type="submit" value="Submit"/></p>
 </form>
 </body>
</html>