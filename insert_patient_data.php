<?php
  session_start();
  session_destroy(); /*Prevent previous session leftovers*/
  if(isset($_GET['name_holder']))
    $name_holder = $_GET['name_holder'];

  else
    $name_holder = "";
?>
<html>
    <head>
        <title>Patient registration</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
      <div class="center_ct">
        <div class ="center" >
          <h3>Insert Patient Data</h3>
          <form action="reg_new_patient.php" method="post">

              <?php echo("<div style=\"float:left;padding-top:6px;\">Name: </div><input value=\" ".$name_holder ."\" class=\"form-control\" type=\"text\" name=\"name\"/>") ?>

              <div style="float:left;padding-top:6px;">Birthday: </div><input class="form-control" type="date" name="birthday"/>
              <div style="float:left;padding-top:6px;">Address: </div><input class="form-control" type="text" name="address"/>
              <button  style="float:right;margin-top:8px;" type="submit" value="Submit"  class ="btn btn-primary">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Submit
              </button>
          </form>
        </div>
      </div>
    </body>
</html>
