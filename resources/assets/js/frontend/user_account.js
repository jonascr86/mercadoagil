$('input[type="radio"],input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%' // optional
});

function format(state) {
    if (!state.id) return state.text; // optgroup
    return "<img class='flag' src='assets/img/countries_flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
}

$("#sample4").select2({
    placeholder: "Select a Country",
    allowClear: true,
    formatResult: format,
    formatSelection: format,
    templateResult: format,
    escapeMarkup: function (m) {
        return m;
    }
});


$(function() {
    $( "#datepicker" ).datepicker().val('');;
});

$(document).ready(function() {
    $('#tryitForm').bootstrapValidator({
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
            },


            zip: {
                validators: {

                    regexp: {
                        regexp: /^[a-zA-Z0-9- ]+$/,
                        message: 'Zip can only consist of alpha-numeric.'
                    }
                }
            },
            phone: {
                validators: {

                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Phone can only consist of numbers.'
                    }
                }
            }

        }
    });
});
