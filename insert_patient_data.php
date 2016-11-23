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
            <?php
                foreach ($_POST as $name => $value)
                {
                    $_SESSION[$name] = $value;
                }
            ?>
            <ul>
                <?php
                    foreach ($_SESSION as $name => $value)
                    {
                        echo("<li>$name = $value</li>");
                    }
                    $connection = null;
                ?>
            </ul>
    </body>
</html>
