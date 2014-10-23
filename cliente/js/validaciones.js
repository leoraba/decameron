$(document).ready(function() {
    $('#integerForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            number: {
                validators: {
                    integer: {
                        message: 'The value is not an integer'
                    }
                }
            }
        }
    });
});
$(document).ready(function() {
    $('#profileForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fullName: {
                validators: {
                    stringLength: {
                        max: 25,
                        message: 'Su nombre debe ser menor a 25 caracteres'
                    }
                }
            },
            bio: {
                validators: {
                    stringLength: {
                        max: 200,
                        message: 'The bio must be less than 200 characters'
                    }
                }
            }
        }
    });
});
$(document).ready(function() {
    $('#registerForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});