$(document).ready(function () {

    $('#fac').on('change', function () {
        let fac = $(this).val();
        if (fac) {
            $.ajax({
                type: 'POST',
                url: 'Public/script/join2.php',
                data: 'fac=' + fac,
                success: function (d) {
                    $('#dep').html(d);
                }

            });
        }
    });



});