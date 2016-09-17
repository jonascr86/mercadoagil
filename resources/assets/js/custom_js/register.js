$(document).ready(function() {
       
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });
    });
        $('#dpYears').datepicker();

    $(function() {
        var opts = $("#source").html(),
            opts2 = "<option></option>" + opts;
        $("select.populate").each(function() {
            var e = $(this);
            e.html(e.hasClass("placeholder") ? opts2 : opts);
        });
        $(".examples article:odd").addClass("zebra");
    });
   
    function format(state) {
        if (!state.id) return state.text; // optgroup
        return "<img class='flag' src='img/countries_flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
    }
    $("#select2_sample4").select2({
        placeholder: "Select a Country",
        allowClear: true,
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function(m) {
            return m;
        }
    });

$(document).ready(function() {
    $('#regform').bootstrapValidator({
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
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Phone number is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Phone number can only consist of numbers.'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'The Zip code is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[A-Za-z0-9]+$/,
                        message: 'Zip code can only consist of alphabets and numbers.'
                    }
                }
            }
        }
    });
});