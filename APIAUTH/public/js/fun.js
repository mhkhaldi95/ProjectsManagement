$(document).ready(function () {
    $('input:radio[name=bedStatus]:checked').change(function () {
        if ($("input[name='bedStatus']:checked").val() == 'allot') {
            alert("Allot Thai Gayo Bhai");
        }
        if ($("input[name='bedStatus']:checked").val() == 'transfer') {
            alert("Transfer Thai Gayo");
        }
    });
});