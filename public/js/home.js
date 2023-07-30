let num = 0;
$(window).bind('scroll', function() {
    if ($(window).scrollTop() > num) {
        $('.navbar').addClass('navbar-white');
    } else {
        $('.navbar').removeClass('navbar-white');
    }
})

function removeSpace(string) {
    return string.replace(/\s/g, '');
}

// JS CLIEND VALIDATOIN
function errorMessageDisplay(name) {
    if ($("#" + name).val() == '' || $("#" + name).val() == null) {
        $("#errorMessage_" + name).text(name + " harus di isi").show();
        $('#errorMessage_' + name).css('color', 'red');
        $('#errorMessage_' + name).css('marginTop', '5px');
        $('#errorMessage_' + name).prev().css('borderColor', 'red');
        return 0;
    } else {
        $("#errorMessage_" + name).text("").hide();
        $('#errorMessage_' + name).prev().css('borderColor', '#6777EF');
        return 1;
    }
}