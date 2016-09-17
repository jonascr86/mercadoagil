function main() {

    var self = this;

    this.init = function () {
        self.select2();
        self.iCheck();
        self.inputmask();
    };

    this.select2 = function() {
       $('.select2').select2();
    };

    this.iCheck = function() {
        $('input[type="checkbox"].square-blue, input[type="radio"].square-blue').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue'
        });
    }

    this.inputmask = function() {
        $('[data-mask]').inputmask();
    }
}

var $main = new main();

$(document).on('ready', function () {
    $main.init();
});
