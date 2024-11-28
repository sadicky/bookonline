function refreshPage() {
    location.reload();
}

$(document).ready(function () {

    $("#formulaire_plan").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/script/addplan.php",
            method: "POST",
            type: "post",
            data: $("#formulaire_plan").serialize(),
            success: function (data) {
                $('#messages').html(data).slideDown();
                $("#formulaire_plan")[0].reset();
                setInterval(refreshPage, 1000);
            }
        });
    });

    $(document).on("click", ".delete-plan", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
        if (confirm("Voulez-vous supprimer? ")) {
            $.ajax({
                url: "Public/script/deleteplan.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    $('#messages').html(data).slideDown();
                    setInterval(refreshPage, 1000);
                }
            });
        } else {
            return false;
        }
    });



    //recharger cette fonction toute les secondes
    // setInterval(1000);

});