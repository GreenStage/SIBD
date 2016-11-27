<html>
  <head>
      <title>SIBD project part 3</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
        <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
        <style type="text/css">
            #insert_name .form-control-feedback {
            top: 30px;
            right: -30px;
            }
        </style>
  </head>

  <body>

    <div class="center_ct">
      <div class ="center">
        <form  id="insert_name" action="insert_patient_name.php" method="post">
            <h2 style="text-align:center">Insert patient name:</h2>

            <div style="margin-top:20px" class="form-group" >
              <label class="control-label">Name:</label>
              <input  class="form-control" type="text" name="patient_name" />
            </div>

            <button  style="margin-left:4px;margin-top:10px;margin-left:90px" type="submit" value="Submit"  class ="btn btn-primary">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              Submit
            </button>
        </form>
      </div>
    </div>

  </body>
  <script>
      $(document).ready(function() {

          $('#insert_name').formValidation({
              framework: 'bootstrap',
              icon: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  patient_name: {
                      validators: {
                          notEmpty: {
                              message: 'The name is required'
                          }
                      }
                  }
              }
          });
      });
    </script>
</html>
