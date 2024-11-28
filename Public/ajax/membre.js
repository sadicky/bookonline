function refreshPage() {
    location.reload();
}

$(document).ready(function () {


    $("#formulaire_member").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/script/addmember.php",
            method: "POST",
            type: "post",
            data: $("#formulaire_member").serialize(),
            success: function (data) {
                $('#messages').html(data).slideDown();
                $("#formulaire_member")[0].reset();
            }
        });
    });

    $(document).on("click", ".delete-member", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
        if (confirm("Voulez-vous supprimer? ")) {
            $.ajax({
                url: "Public/script/deletemember.php",
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


    $("#f").hide();
    $("#c").hide();
    $("#d").hide();
    $("#card1").hide();
    $("#prov1").hide();
    $("#aut1").hide();
    $("#pro").hide();
    $("#vil").hide();
    $("#ad").hide();

    $("#type").change(function () {
        var x = $(this).val();
        if (x == 'I') {
            $("#f").show();
            $("#c").show();
            $("#d").show();
            $("#pro").hide();
            $("#card1").show();
            $("#prov1").hide();
            $("#aut1").hide();
            $("#vil").hide();
            $("#ad").show();
        } else {
            $("#f").hide();
            $("#c").hide();
            $("#d").hide();
            $("#card1").hide();
            $("#pro").show();
            $("#prov1").show();
            $("#aut1").show();
            $("#vil").show();
            $("#ad").show();
        }
    });



    $("#formulaire_fac").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/script/addfac.php",
            method: "POST",
            type: "post",
            data: $("#formulaire_fac").serialize(),
            success: function (data) {
                $('#messages').html(data).slideDown();
                $("#formulaire_fac")[0].reset();
                setInterval(refreshPage, 1000);
            }
        });
    });

    $(document).on("click", ".delete-fac", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
        if (confirm("Voulez-vous supprimer? ")) {
            $.ajax({
                url: "Public/script/deletefac.php",
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

    

  $('.view_fac').click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/script/viewfacbeforedit.php",
      method: "post",
      data: {
        id: id
      },
      success: function (data) {
        $('#fac_detail').html(data);
        $('#edit-fac').modal("show");
      }
    });
  });
  //
  $(document).on('click', '.fac', function () {
    $.ajax({
      url: "Public/script/editfac.php",
      type: "post",
      data: $("#formeditfac").serialize(),
      success: function (data) {
        $("#edit-fac").modal('hide');
        $("#message").html(data).slideDown();
        setInterval(refreshPage, 1000);
      }

    });
    return false;
  });


    $("#formulaire_dep").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/script/adddep.php",
            method: "POST",
            type: "post",
            data: $("#formulaire_dep").serialize(),
            success: function (data) {
                $('#messages').html(data).slideDown();
                $("#formulaire_dep")[0].reset();
                setInterval(refreshPage, 1000);
            }
        });
    });

    $(document).on("click", ".delete-dep", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
        if (confirm("Voulez-vous supprimer? ")) {
            $.ajax({
                url: "Public/script/deletedep.php",
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

     

  $('.view_dep').click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/script/viewdepbeforedit.php",
      method: "post",
      data: {
        id: id
      },
      success: function (data) {
        $('#dep_detail').html(data);
        $('#edit-dep').modal("show");
      }
    });
  });
  //
  $(document).on('click', '.dep', function () {
    $.ajax({
      url: "Public/script/editdep.php",
      type: "post",
      data: $("#formeditdep").serialize(),
      success: function (data) {
        $("#edit-dep").modal('hide');
        $("#message").html(data).slideDown();
        setInterval(refreshPage, 1000);
      }

    });
    return false;
  });



    $("#formulaire_classe").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/script/addclasse.php",
            method: "POST",
            type: "post",
            data: $("#formulaire_classe").serialize(),
            success: function (data) {
                $('#messages').html(data).slideDown();
                $("#formulaire_classe")[0].reset();
                setInterval(refreshPage, 1000);
            }
        });
    });

    $(document).on("click", ".delete-classe", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
        if (confirm("Voulez-vous supprimer? ")) {
            $.ajax({
                url: "Public/script/deleteclasse.php",
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

    $('.view_classe').click(function () {
        var id = $(this).attr("id");
        $.ajax({
          url: "Public/script/viewclbeforedit.php",
          method: "post",
          data: {
            id: id
          },
          success: function (data) {
            $('#cl_detail').html(data);
            $('#edit-cl').modal("show");
          }
        });
      });
      //
      $(document).on('click', '.cl', function () {
        $.ajax({
          url: "Public/script/editcl.php",
          type: "post",
          data: $("#formeditcl").serialize(),
          success: function (data) {
            $("#edit-cl").modal('hide');
            $("#message").html(data).slideDown();
            setInterval(refreshPage, 1000);
          }
    
        });
        return false;
      });


    $('.view_devise').click(function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "Public/script/viewdevisebeforedit.php",
            method: "post",
            data: {
                id: id
            },
            success: function (data) {
                $('#devise_detail').html(data);
                $('#Artdevise').modal("show");
            }
        });
    });
    //
    $(document).on('click', '.submitarticle', function () {
        $.ajax({
            url: "Public/script/editdevise.php",
            type: "post",
            data: $("#formeditart").serialize(),
            success: function (data) {
                $("#artModal").modal('hide');
                $("#message").html(data).slideDown();
                setInterval(refreshPage, 1000);
            }

        });
        return false;
    });

    
    $(document).on("click", ".desactiverM", function (event) {
        event.preventDefault();
          var id = $(this).attr("id");
          if (confirm("Voulez-vous desactiver ce lecteur ? ")) {
            $.ajax({
              url: "public/script/deactivmember.php",
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
       
        $(document).on("click", ".activerM", function (event) {
          event.preventDefault();
            var id = $(this).attr("id");
            if (confirm("Voulez-vous activer ce lecteur? ")) {
              $.ajax({
                url: "public/script/activmember.php",
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
    
    //recharger cette fonction toute les secondes
    // setInterval(1000);

});