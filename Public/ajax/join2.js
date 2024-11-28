$(document).ready(function () {

    $('#fac').on('change', function () {
        let fac = $(this).val();
        if (fac) {
            $.ajax({
                type: 'POST',
                url: 'Public/script/join3.php',
                data: 'fac=' + fac,
                success: function (d) {
                    $('#dep').html(d);
                    $('#classe').html("<option value=''>Choisir</option>");
                }

            });
        } else {
            $('#classe').html("<option value=''>Non Dispo</option>");
        }
    });

    $('#dep').on('change', function () {
        let dep = $(this).val();
        if (dep) {
            $.ajax({
                type: 'POST',
                url: 'Public/script/join3.php',
                data: 'dep=' + dep,
                success: function (d) {
                    $('#classe').html(d);
                }
            });
        }
    });

});