// MENGHILANGKAN LOADER KETIKA HALAMAN TELAH TERLOAD
$(function () {
    $('.loader').addClass('hidden');

})



$('.number_format').on('input', function () {
    // Get the input value and remove any non-numeric characters
    let value = $(this).val().replace(/\D/g, '');

    // Format the number with commas every three digits
    let formattedValue = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Set the formatted value back into the input field
    $(this).val(formattedValue);
});

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

function validateFotoDisplay(name) {

    var ext = $('#errorMessage_' + name).prev().prev().val().split('.').pop().toLowerCase();

    if ($("#" + name).val() == '' || $("#" + name).val() == null) {
        $("#errorMessage_" + name).text(name + " harus di isi").show();
        $('#errorMessage_' + name).css('color', 'red');
        $('#errorMessage_' + name).css('marginTop', '15px');
        $('#errorMessage_' + name).prev().css('border-color', 'red');
        // $('#errorMessage_' + name).prev().prev().prev().focus();
        return 0;
    } else if ($.inArray(ext, ['jpg', 'jpeg', 'png', 'svg']) == -1) {
        $("#errorMessage_" + name).text(name + " harus berformat jpg").show();
        $('#errorMessage_' + name).css('color', 'red');
        $('#errorMessage_' + name).css('marginTop', '15px');
        $('#errorMessage_' + name).prev().css('border-color', 'red');
        return 0;
    } else if ($('#errorMessage_' + name).prev().prev()[0].files[0].size / 1024 >= 2048) {
        $("#errorMessage_" + name).text(name + " harus kurang dari 2mb").show();
        $('#errorMessage_' + name).css('color', 'red');
        $('#errorMessage_' + name).css('marginTop', '15px');
        $('#errorMessage_' + name).prev().css('border-color', 'red');
        return 0;

    } else {
        $("#errorMessage_" + name).text("").hide();
        $('#errorMessage_' + name).prev().css('border-color', '#6777EF');
        return 1;
    }
}

// MEMBUAT INPUT DI SWEETALWERT TYPABLE
$.fn.modal.Constructor.prototype._enforceFocus = function () { };

$('.collapse-trigger-button').on('click', function (e) {
    // $('.nicescroll-rails').css('visibility', 'visible');
    if ($('body').hasClass('sidebar-mini')) {
        $('.sidebar-menu li.menu-header').css('display', 'block');
    } else {
        $('.sidebar-menu li.menu-header').css('display', 'none');
    }
})

// RESET MODAL KETIKA DI TUTUP
$(".modal").on("hidden.bs.modal", function () {
    $("#response-data").html("");
    $('#cari-data').val("");
    $("#response-linked-data").html("");

});

$(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})

function capitalize(string) {
    return string && string[0].toUpperCase() + string.slice(1);
}

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function showLoading(parentEl, width, haveParent) {
    if (haveParent) {
        let image = $("#loading-asset").data('asset_url');
        $(parentEl).parent().css('position', 'relative');
        $(parentEl).parent().append('<div class="loading" class="text-center mt-3"><img src="' + image + '" alt="" width="' + width + '"></div>');
    } else {
        let image = $("#loading-asset").data('asset_url');
        $(parentEl).html('<div class="text-center mt-3"><img src="' + image + '" alt="" width="' + width + '"></div>');
    }
}
// TABLE ACTION HOVER
$('.table-action-hover').on('mouseenter', 'tbody tr', function () {
    $(this).children().last().addClass('show');
}).on('mouseleave', 'tbody tr', function () {
    $(this).children().last().removeClass('show');
});


function getKetNilai(nilai) {
    if (nilai == 4) {
        return 'Sangan baik';
    } else if (nilai == 3) {
        return 'Baik';
    } else if (nilai == 2) {
        return 'Cukup';
    } else if (nilai == 1) {
        return 'Kurang'
    }
}

$('#table-data-blank').DataTable({
    "paging": false,
    "bInfo": false,
    "pagination": false,
    "responsive": true
});

let dataTable = $('#table-data').DataTable({
    "lengthChange": false,
    "responsive": true
});
$("#searchbox").on("keyup search input paste cut", function () {
    dataTable.search(this.value).draw();
});
