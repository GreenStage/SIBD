<?php
  session_start();
  require_once('sql_funcs.php');
  $connection = null;
  new_connection($connection);
?>
<html>
    <head>
        <title>SIBD project part 3</title>

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


            <div class="form-group">
                <label class=" control-label">Name:</label>
                <div> <input class="form-control" type="text" name="patient_name"/> </div>
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

                <div><select onchange="get_doctors()" id="spec" class="form-control" name="specialty"/>
                      <option value=""  selected disabled>Please select a specialty</option>
                      <?php
                        $result = sql_secure_query($connection, "SELECT DISTINCT specialty FROM doctor ");

                        foreach($result as $row)
                            echo("<option value=\"{$row['specialty']}\"> {$row['specialty']} </option>");

                       ?>

                    </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Doctor:</label>

                <div> <select id="doct" class="form-control" name="doctor_id"/>
                  <option value="" selected disabled>Please select a doctor</option>

                  <?php
                    $result2 = sql_secure_query($connection, "SELECT * FROM doctor ");
                    foreach($result2 as $row2){

                        echo("<option  class=\" hide_show {$row2['specialty']}\"  value=\"{$row2['doctor_id']}\"> {$row2['name']} </option>");
                      }
                    $connection = NULL;
                   ?>

                 </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Date:</label>
                <div class=" input-group input-append date"  id="datePicker2">
                  <input type="text" class="form-control" id="appointment_date" name="appointment_date"/>
                  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-5 col-xs-offset-3">
                    <button type="submit" class ="btn btn-primary">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      Submit</button>
                    <a href="session_end.php" class=" btn btn-danger">Cancel</a>
                </div>
              </div>


          </form>
        </div>
      </div>
    </body>
    <script>

    function get_doctors(){
       var spec = $("#spec option:selected").val();
       /*Hide all doctors without this specialty*/
       $('.hide_show').prop('disabled', true);
       /*Show all doctors with this specialty*/
       $('.' + spec).prop('disabled', false);
       $('[name=doctor_id]').val( '' );
       $('#reg_patient').formValidation('revalidateField', 'doctor_id');
    }

      $(document).ready(function() {
        $('.hide_show').hide();
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
          $('#datePicker2')
              .datepicker({
                  format: 'mm/dd/yyyy'
              })
              .on('changeDate', function(e) {
                  // Set the value for the date input
                  $("#appointment_date").val($("#datePicker2").datepicker('getFormattedDate'));

                  // Revalidate it
                  $('#reg_patient').formValidation('revalidateField', 'appointment_date');
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
                  appointment_date: {
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
                              message: 'Please specify your address'
                          }
                      }
                  },
                  specialty: {
                      validators: {
                          notEmpty: {
                              message: 'Please specify the desired specialty'
                          }
                      }
                  },
                  doctor_id: {
                      validators: {
                          notEmpty: {
                              message: 'Please specify your doctor'
                          }
                      }
                  },
              }
          });
      });
    </script>
</html>
