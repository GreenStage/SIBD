<?php session_start(); ?>
<html>
    <head> <title>Patient registration</title>
    </head>
    <body>
        <form action="insert_patient_data.php" method="post">
            <h3>Insert your information:</h3>
            <p>Birthday: <input type="date" name="patient_birthday"/></p>
            <p>Address: <input type="text" name="patient_address"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>