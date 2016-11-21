<?php session_start();
$appointment_day = date("l",$_REQUEST['appointment_date']);
?>
<html>
 <body>
 <h3>Schedule Appointment - verify appointment </h3>
 <p> Speciality choosen: <?php echo($_SESSION['specialty']); ?></p>
 <p> Doctor choosen: <?php echo($_SESSION['doctor_name']); ?></p> 
 <p> Date chossen/Day of the week:<?php echo $_REQUEST['appointment_date'] . " " . $appointment_day; ?></p>
     <?php
     if (((strcmp($appointment_day, "Saturday") == 0) or (strcmp($appointment_day, "Sunday") == 0)))
                {
                    echo("<p>Invalid date for appointment, the hospital doesnt support appointments at weekends");
                    echo("<a href=\"choosedate.php\">Choose another date</a>"); 
                    
                }
                else
                {
                    
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
                    $doctor_name = $_REQUEST['doctor_name'];
                    $sql = "SELECT doctor_id FROM doctor WHERE name = '$_doctor_name' AND specialty = '$specialty'";
                    $result = $connection->query($sql);
                    if ($result == FALSE)
                    {
                        $info = $connection->errorInfo();
                        echo("<p>Error: {$info[2]}</p>");
                        exit();
                    }
                    $row = $result->fetch();
                    $doctor_id = $row['doctor_id'];
                    
                    $patient_id = $_REQUEST['patient_id'];
                    $appointment_date = $_REQUEST['appointment_date'];
                    $stmt = $connection->prepare("INSERT INTO appointment VALUES (:patient_id, :doctor_id, :appointment_date )");
                    
                    $stmt->bindParam(':patient_id', $patient_id);
                    $stmt->bindParam(':doctor_id', $doctor_id);
                    $stmt->bindParam(':appointment_date', $appointment_date);
                    
                    $stmt->execute();
                    
                    //falta fazer o check a ver se nao houve erros na introduçao dos dados
                    echo("<p> Appointment inserted in database</p>");
                    $connection = null;
                }
     ?>
 </body>
</html>