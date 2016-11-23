<?php
  session_start();
  $_SESSION['doctor_name'] = $_GET['name'];
  $_SESSION['doctor_id'] = $_GET['doctor_id'];
?>

<html>
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
 <body>
   <div class="center_ct">
     <div class ="center">
       <h3 >Schedule Appointment - choose appointment date </h3>
       <form style="padding-top:2px" action="accept_app_schedule.php" method="post">
       <p> <div style="float:left"><b>Speciality choosen:</b>
         <?php
            echo($_SESSION['specialty']);
            echo (" </div>");
            echo ("&nbsp&nbsp&nbsp&nbsp&nbsp<b>Doctor</b>:&nbsp");
            echo($_SESSION['doctor_name']);

         ?>
        </p>
       <p> Date:<input type="date" name="appointment_date"/></p>
       <button  style="float:left" type="submit" value="Submit"  class ="btn btn-primary">
         <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
         Submit
       </button>
       </form>
     </div>
   </div>
 </body>
</html>
