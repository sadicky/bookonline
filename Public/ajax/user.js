function refreshPage() {
  location.reload();
}


$(document).ready(function () {
  // getclientegories();
  $("#formulaire").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/adduser.php",
      method: "POST",
      type: "post",
      data: $("#formulaire").serialize(),
      success: function (data) {
        $('#message').html(data).slideDown();
        setInterval(refreshPage, 1000);
        $("#formulaire")[0].reset();
        $("#add-user").modal("hide");
      }
    });
  });



  $(document).on("click", ".delete-user", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer? ")) {
      $.ajax({
        url: "Public/script/deleteuser.php",
        method: "POST",
        data: {
          id: id
        },
        success: function (data) {}
      });
    } else {
      return false;
    }
  });

  
  $(document).on("click", ".desactiverU", function (event) {
    event.preventDefault();
      var id = $(this).attr("id");
      if (confirm("Voulez-vous desactiver cet utilisateur ? ")) {
        $.ajax({
          url: "public/script/deactivuser.php",
          method: "POST",
          data: {
            id: id
          },
          success: function (data) {
            setInterval(refreshPage, 1000);
          }
        });
      } else {
        return false;
      }
    });
   
    $(document).on("click", ".activerU", function (event) {
      event.preventDefault();
        var id = $(this).attr("id");
        if (confirm("Voulez-vous activer cet utilisateur? ")) {
          $.ajax({
            url: "public/script/activuser.php",
            method: "POST",
            data: {
              id: id
            },
            success: function (data) {
                setInterval(refreshPage, 1000);
            }
          });
        } else {
          return false;
        }
      });

});