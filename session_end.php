<?php
  session_start();
  session_destroy();

  header('Refresh: 2; URL=index.php');
 ?>
 <html>
 <head>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css" >
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 </head>
  <body>
    <div class="center_ct">
      <div class ="center" >
        <h2 class="alert alert-warning"> <span class="glyphicon glyphicon-log-out"></span>&nbspSession Closed</h2>
        <p style="text-align:center">Redirecting...</p>
      </div>
    </div>
  <body>
  </html>
