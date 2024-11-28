$(document).ready(function () {
  $("#submit").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: "Public/script/verify.php",
        method: "POST",
        data:$("#formverify").serialize(),
        success: function (data) {
            $('#message').html(data).slideDown();
            $("#formverify")[0].reset();
        }
    });
});


$(document).on("click", ".abonnement", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    console.log(id);
        $.ajax({
            url: "Public/script/subscription.php",
            method: "POST",
            data: {
                id: id
            },
            success: function (data) {
                $('#messages').html(data).slideDown();
                setInterval(refreshPage, 1000);
            }
        });
        
});

}); 