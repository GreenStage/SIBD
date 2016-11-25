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
        <link rel="stylesheet" href="css/bootstrap-datepicker.min.css" >
        <link rel="stylesheet" href="css/style.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
        <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.min.js" ></script>

        <style type="text/css">
          #reg_patient .form-control-feedback {
              top: 30px;
              right: -30px;
          }
      </style>
    </head>
    <body>
      <div class="center_ct">
        <div class ="center container"  style="max-width:500px" >

          <h3 style="text-align:center">Insert Patient Data</h3>
          <form id="reg_patient" class="form-horizontal" action="accept_reg_and_appschedule.php" method="post">

            <div class="form-group" >
              <label class="control-label">Name:</label>
              <div ><?php echo("<input value=\"".$name_holder ."\" class=\"form-control\" type=\"text\" name=\"name\" />") ?>
              </div>
            </div>

              <div class="form-group">
                <label class="control-label">Birthday:</label>
                <div class=" input-group input-append date"  id="datePicker">
                  <input type="text" class="form-control" id="birthday" name="birthday"/>
                  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>

              <div class="form-group">
                <label class=" control-label">Address:</label>
                <div> <input id="addr" class="form-control" type="text" name="address"/> </div>
              </div>
              
              <h3 style="text-align:center">Insert Appointment Data</h3>
              
              <div class="form-group">
                <label class=" control-label">Specialty:</label>
                <div> <input id="addr" class="form-control" type="text" name="specialty"/> </div>
              </div>
              
              <div class="form-group">
                <label class=" control-label">Doctor:</label>
                <div> <input id="addr" class="form-control" type="text" name="doctor_id"/> </div>
              </div>
              
              <div class="form-group">
                <label class="control-label">Date:</label>
                <div class=" input-group input-append date"  id="datePicker">
                  <input type="text" class="form-control" id="appointment_date" name="appointment_date"/>
                  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-xs-5 col-xs-offset-3">
                    <button type="submit" class ="btn btn-primary">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      Submit</button>
                </div>
              </div>


          </form>
        </div>
      </div>
    </body>
    <script>
      $(document).ready(function() {
          $('#datePicker')
              .datepicker({
                  format: 'mm/dd/yyyy'
              })
              .on('changeDate', function(e) {
                  // Set the value for the date input
                  $("#birthday").val($("#datePicker").datepicker('getFormattedDate'));

                  // Revalidate it
                  $('#reg_patient').formValidation('revalidateField', 'birthday');
              });

          $('#reg_patient').formValidation({
              framework: 'bootstrap',
              icon: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  name: {
                      validators: {
                          notEmpty: {
                              message: 'The name is required'
                          }
                      }
                  },
                  birthday: {
                      // The hidden input will not be ignored
                      excluded: false,
                      validators: {
                          notEmpty: {
                              message: 'The date is required'
                          },
                          date: {
                              format: 'MM/DD/YYYY',
                              message: 'The date is not a valid'
                          }
                      }
                  },
                  address: {
                      validators: {
                          notEmpty: {
                              message: 'The address is required'
                          }
                      }
                  },
              }
          });
      });
    </script>
</html>
