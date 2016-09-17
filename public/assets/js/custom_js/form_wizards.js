// bootstrap wizard//
$("#gender, #gender1").select2({
    theme:"bootstrap",
    placeholder:"",
    width: '100%'
});
$(document).ready(function() {
    $("#commentForm").bootstrapValidator({
        fields: {
            namefield: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required'
                    }
                },
                regexp: {
                    regexp: /^[A-Za-z]+$/,
                    message: 'Full name can only consist of alphabets.'
                },
                required: true,
                minlength: 3
            },
            passwordfield: {
                validators: {
                    notEmpty: {},
                    different: {
                        field: 'namefield',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confpasswordfield: {
                validators: {
                    notEmpty: {},
                    identical: {
                        field: 'passwordfield'
                    },
                    different: {
                        field: 'namefield',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            emailfield: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            fnamefield: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                },
                regexp: {
                    regexp: /^[A-Za-z]+$/,
                    message: 'First name can only consist of alphabets.'
                }
            },
            lnamefield: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                },
                regexp: {
                    regexp: /^[A-Za-z]+$/,
                    message: 'Last name can only consist of alphabets.'
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'Please select a gender'
                    }
                }
            },
            linefield: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
                    }
                },
                required: true,
                minlength: 3
            },
            cityfield: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
                    }
                },
                required: true,
                minlength: 3
            },
            statefield: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
                    }
                },
                regexp: {
                    regexp: /^[A-Za-z]+$/,
                    message: 'State name can only consist of alphabets.'
                },
                required: true
            },
            postcodefield: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
                    }
                },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'Phone number can only consist of numbers.'
                },
                required: true,
                minlength: 10
            },
            phonefield1: {
                validators: {
                    notEmpty: {
                        message: 'The home number is required'
                    },
                    regexp: {
                        regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                        message: 'Enter valid home number'
                    }
                }
            },
            phone1field2: {
                validators: {
                    notEmpty: {
                        message: 'The personal number is required'
                    },
                    regexp: {
                        regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                        message: 'Enter valid phone number'
                    }
                }
            },
            aleternateNumber: {
                validators: {
                    notEmpty: {
                        message: 'The alternate number is required'
                    },
                    regexp: {
                        regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                        message: 'Enter valid phone number'
                    }
                }
            }
        }
    });
});

$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        var $validator = $('#commentForm').data('bootstrapValidator').validate();
        return $validator.isValid();
    },
    onTabClick: function(tab, navigation, index) {
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }
        $('#rootwizard .finish').click(function() {
            var $validator = $('#commentForm').data('bootstrapValidator').validate();
            alert('Form has submitted successfully');
            return $validator.isValid();
        });

    }});


