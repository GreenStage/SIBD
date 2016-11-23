<?php
  require_once('sql_funcs.php');
  session_start();
?>
<head>
  <title>Schedule Appointment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<html>
 <body>
   <div class="center_ct">
     <div class ="center">
       <h3>Schedule Appointment - choose doctor specialty</h3>
       <form style="margin-top:10px" action="choosedoctor0.php" method="post">
           <select class="form-control" name="specialty">
               <?php
               
                  $_SESSION['patient_id'] = $_GET['patient_id'];
                  $connection = null;
                  new_connection($connection);

                  $result = sql_secure_query($connection, "SELECT specialty FROM doctor ");

                  $connection = null;

                  foreach($result as $row)
                  {
                      $specialty = $row['specialty'];
                      echo("<option value=\"$specialty\">$specialty</option>");
                  }


               ?>
           </select>
       <input style="margin-top:5px" type="submit" value="Submit" class ="btn btn-primary"/></p>
       </form>
    </div>
  </div>
 </body>
</html>
