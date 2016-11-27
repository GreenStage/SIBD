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