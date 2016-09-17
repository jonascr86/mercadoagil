$(document).ready(function() {
    new WOW().init();
    $('input').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue',
        increaseArea: '20%' // optional
    });

    $('#regfront').bootstrapValidator({
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[A-Za-z]+$/,
                        message: 'First name can only consist of alphabets.'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[A-Za-z]+$/,
                        message: 'Last name can only consist of alphabets.'
                    }
                }
            }
        }

});
});