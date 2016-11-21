<?php session_start();
$_SESSION[doctor_name] = $_REQUEST[doctor_name];
?>
<html>
 <body>
 <h3>Schedule Appointment - choose appointment date </h3>
 <form action="accept_app_schedule.php" method="post">
 <p> Speciality choosen: <?php echo($_SESSION[specialty]); ?></p>
 <p> Doctor choosen: <?php echo($_SESSION[doctor_name]); ?></p> 
 <p> Date:<input type="date" name="appointment_date"/></p>
 <p><input type="submit" value="Submit"/></p>
 </form>
 </body>
</html>