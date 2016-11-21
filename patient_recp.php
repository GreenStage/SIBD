<?php session_start(); ?>
<html>
    <head> <title>Patient reception</title>
    </head>
    <body>
        <form action="insert_patient_name.php" method="post">
            <h3>Insert your name:</h3>
            <p>Name: <input type="text" name="patient_name"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>