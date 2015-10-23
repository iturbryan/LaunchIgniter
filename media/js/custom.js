/**
 * Created by bryanitur on 10/22/15.
 */
$(document).ready(function(){

    var wait = "<i class=\"fa fa-spinner fa-spin\"></i>&nbsp;Please wait...";

    var button_content;

    function form_wait(button)
    {

        button_content = $(button).html();

        $(button).html(wait);

    }

    function form_complete(button)
    {

        $(button).html(button_content);

    }

    function form_alert(message, success)

    {

        if(success)

            message = "<p class=\"bg-success form-message\"><i class=\"fa fa-info-circle icon-small\"></i>&nbsp;" + message + "</p>";

        else

            message = "<p class=\"bg-danger form-message error-message\"><i class=\"fa fa-user-times icon-small\"></i>&nbsp;" + message + "</p>";

        $('#message-alert').html(message);

    }

    $('#login-form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Enter your username'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Enter your password'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();
            var button = '#login-submit';
            form_wait(button);
            // Get the form instance
            var $form = $(e.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.ajax({
                url: $('#url').val() + 'login',
                type: 'post',
                data: $('#login-form :input'),
                dataType: 'json',
                success: function (json) {
                    form_complete(button);
                    if (json.success) {
                        form_alert(json.message + ". Please wait...", json.success);
                        $form
                            .bootstrapValidator('resetForm', true)             // Reset the form
                            .bootstrapValidator('disableSubmitButtons', true);  // Enable the submit buttons
                    }
                    else
                    {
                        $form
                            .bootstrapValidator('disableSubmitButtons', false);
                        form_alert(json.message, json.success);
                    }
                },
                error: function(xhr, status, text) {
                    var response = $.parseJSON(xhr.responseText);

                    console.log('Failure!');

                    if (response) {
                        console.log(response.error);
                    } else {
                        // This would mean an invalid response from the server - maybe the site went down or whatever...
                    }
                }
            });
        });

    $('#sign-in-form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Enter your username'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Enter your password'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();
            var button = '#sign-in-submit';
            form_wait(button);
            // Get the form instance
            var $form = $(e.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.ajax({
                url: $('#url').val() + 'signin',
                type: 'post',
                data: $('#sign-in-form :input'),
                dataType: 'json',
                success: function (json) {
                    form_complete(button);
                    if (json.success) {
                        form_alert(json.message + ". Please wait...", json.success);
                        $form
                            .bootstrapValidator('resetForm', true)             // Reset the form
                            .bootstrapValidator('disableSubmitButtons', true);  // Enable the submit buttons
                    }
                    else
                    {
                        $form
                            .bootstrapValidator('disableSubmitButtons', false);
                        form_alert(json.message, json.success);
                    }
                },
                error: function(xhr, status, text) {
                    var response = $.parseJSON(xhr.responseText);

                    console.log('Failure!');

                    if (response) {
                        console.log(response.error);
                    } else {
                        // This would mean an invalid response from the server - maybe the site went down or whatever...
                    }
                }
            });
        });

    $('#sign-up-form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Enter your name'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Enter a valid name'
                    }
                }
            },
            id_number: {
                validators: {
                    notEmpty: {
                        message: 'Enter your ID number'
                    },
                    integer: {
                        message: 'Enter a valid ID number'
                    }
                }
            },
            phone_number: {
                validators: {
                    notEmpty: {
                        message: 'Enter your phone number'
                    },
                    regexp: {
                        regexp: /^\+?[0-9\s]+$/i,
                        message: 'Enter a valid name'
                    }
                }
            },
            email_address: {
                validators: {
                    notEmpty: {
                        message: 'Enter your email address'
                    },
                    emailAddress: {
                        message: 'Enter a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Enter your password'
                    },
                    identical: {
                        field: 'cpassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            cpassword: {
                validators: {
                    notEmpty: {
                        message: 'Enter your password'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();
            var button = '#sign-up-submit';
            form_wait(button);
            // Get the form instance
            var $form = $(e.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.ajax({
                url: $('#url').val() + 'signup',
                type: 'post',
                data: $('#sign-up-form :input'),
                dataType: 'json',
                success: function (json) {
                    form_complete(button);
                    if (json.success) {
                        form_alert(json.message + ". Please wait...", json.success);
                        $form
                            .bootstrapValidator('resetForm', true)             // Reset the form
                            .bootstrapValidator('disableSubmitButtons', true);  // Enable the submit buttons
                    }
                    else
                    {
                        $form
                            .bootstrapValidator('disableSubmitButtons', false);
                        form_alert(json.message, json.success);
                    }
                },
                error: function(xhr, status, text) {
                    var response = $.parseJSON(xhr.responseText);

                    console.log('Failure!');

                    if (response) {
                        console.log(response.error);
                    } else {
                        // This would mean an invalid response from the server - maybe the site went down or whatever...
                    }
                }
            });
        });
});