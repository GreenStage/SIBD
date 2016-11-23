<?php session_start() ?>
<html>
    <head>
        <title>Patient registration</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
        <h3>Patient Data</h3>
        <form action="accept_app_schedule.php" method="post">
            <div style="float:left;padding-top:4px;">Birthday: <input type="date" name="patient_birthday"/></div>
            <div style="float:left;padding-top:4px;">Address: <input type="text" name="patient_address"/></div>
            <div style="float:left;padding-top:4px;">Appointment date: <input type="date" name="patient_birthday"/></div>
            <button  style="float:left;margin-left:4px;" type="submit" value="Submit"  class ="btn btn-primary">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              Submit
            </button>
        </form>
    </body>
</html>
