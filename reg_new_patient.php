<?php
  require_once('sql_funcs.php');
?>
<html>
  <head>
    <title>New Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
    <body>
      <div class="center_ct">
        <div class ="center">

          <?php
            new_connection($connection);
            $sql = "INSERT INTO patient (name, birthday, address ) VALUES (:name,:birthday,:address)";

            $result = sql_secure_query($connection, $sql, Array(  ":name"      => $_POST['name'] ,
                                                                  ":birthday"  => $_POST['birthday'] ,
                                                                  ":address"   => $_POST['address'] ) );

            $connection = NULL;

            echo("<h3>New Patient: ". $_POST['name']."</h3>");
            echo("<p style=\"text-align:center\" class=\"alert alert-success \"><span class=\"glyphicon glyphicon-ok\"></span>&nbsp&nbspPatient Added to Database</p>");
          ?>
          <p><a href="index.php">Return to Homepage</a></p>
        </div>
      </div>
    </body>

</html>
