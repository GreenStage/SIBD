<?php
  require_once('sql_funcs.php');
  session_start();

  if(isset($_GET['patient_id']))
      $_SESSION['patient_id'] = $_GET['patient_id'];

?>
<head>
  <title>Schedule Appointment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<html>
 <body>
   <div class="center_ct">
     <div class ="center" >

       <h2 style="float:left">Selected Patient: &nbsp</h2>
       <h3 style="margin-top:23px;color: #366fd7"><?php echo($_SESSION['patient_name']); ?></h3>
       Patient ID: <?php echo($_SESSION['patient_id']); ?>
       <h3 style="clear:both">Schedule Appointment - choose doctor specialty</h3>
       <form style="margin-top:10px" action="choosedoctor0.php" method="post">
           <select class="form-control" name="specialty">
               <?php

                  $connection = null;
                  new_connection($connection);

                  $result = sql_secure_query($connection, "SELECT DISTINCT specialty FROM doctor ");

                  $connection = null;

                  foreach($result as $row)
                  {
                      $specialty = $row['specialty'];
                      echo("<option value=\"$specialty\">$specialty</option>");
                  }


               ?>
           </select>
       <input style="margin-top:5px" type="submit" value="Submit" class ="btn btn-primary"/>
       <input style="margin-top:5px" onclick="location.href='cancel.php';" type="button" value="Cancel" class =" btn btn-danger"/></p>

       </form>
    </div>
  </div>
 </body>
</html>
