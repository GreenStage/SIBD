<?php session_start(); ?>
<html>
    <head> 
        <title>Patient registration</title> 
    </head>
    <body>
        <h3>Patient Data</h3>
            <?php
                foreach ($_REQUEST as $name => $value)
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
                ?>
            </ul>
    </body>
</html>