var FormInputMask = function () {

    var handleInputMasks = function () {

        $("#mask_date").inputmask("d/m/y", {
            autoUnmask: true
        }); //direct mask
        $("#mask_date1").inputmask("d/m/y", {
            "placeholder": "*"
        }); //change the placeholder
        $("#mask_date2").inputmask("d/m/y", {
            "placeholder": "dd/mm/yyyy"
        }); //multi-char placeholder
        $("#mask_phone").inputmask("mask", {
            "mask": "(99) 9999-9999"
        });
        $("#mask_mobile").inputmask("mask", {
            "mask": "(99) 99999-9999"
        });
        $("#mask_cpf").inputmask("mask", {
            "mask": "999.999.999-99"
        }); //specifying fn & options
        $("#mask_cnpj").inputmask("mask", {
            "mask": "99.999.999/9999-99"
        }); //specifying fn & options
        $("#mask_cep").inputmask({
            "mask": "99.999-999"
        }); //specifying options only
        $("#mask_phones").inputmask("mask", {
            "mask": "(99)9999-9999 (99)9999-9999"
        }); //specifying fn & options
        $("#mask_number").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"
        $("#mask_decimal").inputmask('decimal', {
            rightAlignNumerics: false
        }); //disables the right alignment of the decimal input
        $("#mask_year_month_ref").inputmask('mask', {
            "mask": "99/9999"
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleInputMasks();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        FormInputMask.init(); // init metronic core componets
    });
}