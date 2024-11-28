function refreshPage() {
  location.reload();
}

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }
  return false;
};
$(document).ready(function () {


  $("#formulaire_book").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addbook.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_book").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_book")[0].reset();
        // setInterval(refreshPage, 1000);
      }
    });
  });

  $(document).on("click", ".supprimer-book", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Approuver la suppression de ce document? ")) {
      $.ajax({
        url: "Public/script/deletebook.php",
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

  
  $('.view_data_book').click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/script/viewbook.php",
      method: "post",
      data: {
        id: id
      },
      success: function (data) {
        $('#book_detail').html(data);
        $('#edit-book').modal("show");
      }
    });
  });
  //
  $(document).on('click', '.edit-book', function () {
    $.ajax({
      url: "Public/script/editbook.php",
      type: "post",
      data: $("#formeditbook").serialize(),
      success: function (data) {
        $("#edit-book").modal('hide');
        $("#message").html(data).slideDown();
        setInterval(refreshPage, 1000);
      }

    });
    return false;
  });



  $("#covers").hide();
  $("#files").hide();
  $("#descr").show();

  $("#format").change(function () {
    var x = $(this).val();
    if (x == 'paper') {
      $("#covers").hide();
      $("#files").hide();
      $("#descr").show();
    } else {
      $("#covers").show();
      $("#files").show();
      $("#descr").hide();
    }
  });




  $("#formulaire_categories").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addgenre.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_categories").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_categories")[0].reset();
        setInterval(refreshPage, 1000);
      }
    });
  });


  $("#formulaire_emprunt").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addemprunt.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_emprunt").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_emprunt")[0].reset();
        setInterval(refreshPage, 1000);
      }
    });
  });


  $("#formulaire_return").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addreturn.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_return").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_return")[0].reset();
        setInterval(refreshPage, 1000);
      }
    });
  });

  $(document).on("click", ".delete-categorie", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer? ")) {
      $.ajax({
        url: "Public/script/deletegenre.php",
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


  //valider emprunt
  $(document).on("click", ".valider-emprunt", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous valider cet emprunt? ")) {
      $.ajax({
        url: "Public/script/validemprunt.php",
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

  //Refuser emprunt
  $(document).on("click", ".refuser-emprunt", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous refuser cet emprunt? ")) {
      $.ajax({
        url: "Public/script/refuseremprunt.php",
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

  //QTY 
  $("#formulaire_qty").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addqty.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_qty").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_qty")[0].reset();
        setInterval(refreshPage, 2000);
      }
    });
  });




  $("#formulaire_auteurs").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addauteur.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_auteurs").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_auteurs")[0].reset();
        setInterval(refreshPage, 1000);
      }
    });
  });

  $(document).on("click", ".delete-auteur", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer? ")) {
      $.ajax({
        url: "Public/script/deleteauteur.php",
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

  $('.view_data_auteur').click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/script/viewauteurbeforedit.php",
      method: "post",
      data: {
        id: id
      },
      success: function (data) {
        $('#aut_detail').html(data);
        $('#edit-aut').modal("show");
      }
    });
  });
  //
  $(document).on('click', '.edit-auteur', function () {
    $.ajax({
      url: "Public/script/editaut.php",
      type: "post",
      data: $("#formeditaut").serialize(),
      success: function (data) {
        $("#edit-aut").modal('hide');
        $("#message").html(data).slideDown();
        setInterval(refreshPage, 1000);
      }

    });
    return false;
  });





  $("#formulaire_publisher").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addpublisher.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_publisher").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_publisher")[0].reset();
        setInterval(refreshPage, 1000);
      }
    });
  });

  $(document).on("click", ".delete-publisher", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer? ")) {
      $.ajax({
        url: "Public/script/deletepublisher.php",
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

  $('.view_data_publisher').click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/script/viewpublisherbeforedit.php",
      method: "post",
      data: {
        id: id
      },
      success: function (data) {
        $('#pub_detail').html(data);
        $('#edit-pub').modal("show");
      }
    });
  });
  //
  $(document).on('click', '.edit-publisher', function () {
    $.ajax({
      url: "Public/script/editpub.php",
      type: "post",
      data: $("#formeditpub").serialize(),
      success: function (data) {
        $("#edit-pub").modal('hide');
        $("#message").html(data).slideDown();
        setInterval(refreshPage, 1000);
      }

    });
    return false;
  });


  $("#formulaire_blanguage").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/script/addblanguage.php",
      method: "POST",
      type: "post",
      data: $("#formulaire_blanguage").serialize(),
      success: function (data) {
        $('#messages').html(data).slideDown();
        $("#formulaire_blanguage")[0].reset();
        setInterval(refreshPage, 1000);
      }
    });
  });

  $(document).on("click", ".delete-blanguage", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer? ")) {
      $.ajax({
        url: "Public/script/deleteblanguage.php",
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



  $('.view_data_bl').click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/script/viewblbeforedit.php",
      method: "post",
      data: {
        id: id
      },
      success: function (data) {
        $('#bl_detail').html(data);
        $('#edit-bl').modal("show");
      }
    });
  });
  //
  $(document).on('click', '.bl', function () {
    $.ajax({
      url: "Public/script/editbl.php",
      type: "post",
      data: $("#formeditbl").serialize(),
      success: function (data) {
        $("#edit-bl").modal('hide');
        $("#message").html(data).slideDown();
        setInterval(refreshPage, 1000);
      }

    });
    return false;
  });


  $('.view_data_categorie').click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/script/viewgenrebeforedit.php",
      method: "post",
      data: {
        id: id
      },
      success: function (data) {
        $('#cat_detail').html(data);
        $('#edit-cat').modal("show");
      }
    });
  });
  //
  $(document).on('click', '.edit-category', function () {
    $.ajax({
      url: "Public/script/editcat.php",
      type: "post",
      data: $("#formeditcat").serialize(),
      success: function (data) {
        $("#edit-cat").modal('hide');
        $("#message").html(data).slideDown();
        setInterval(refreshPage, 1000);
      }

    });
    return false;
  });

  // $("#resultatdev").hide();
  $("#member").change(function () {
    var member = $(this).val();
    if (member) {
      $.ajax({
        type: 'POST',
        url: 'Public/script/memberdoc.php',
        data: {
          member: member
        },
        success: function (d) {
          $('#doc').html(d).slideDown();
        }

      });
    }
  });




  $(document).on("click", "#print_return", function (event) {
    event.preventDefault();
    $.ajax({
      url: 'Public/script/printreturned.php',
      type: 'post',
      data: {},
      dataType: 'text',
      success: function (response) {
        var mywindow = window.open('', 'Document Retourné', 'fullscreen="yes"');
        mywindow.document.write('<html><head><title>Document Retourné</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
        setTimeout(function () {
          mywindow.print();
          mywindow.close();
        }, 1250);

        //mywindow.print();
        //mywindow.close();

      } // /success function
    }); // /ajax function to fetch the printable order
  });
  
  $(document).on("click", "#print_aut", function (event) {
    
    var id = getUrlParameter('id');
    event.preventDefault();
    $.ajax({
      url: 'Public/script/printaut.php',
      type: 'post',
      data: { id: id},
      dataType: 'text',
      success: function (response) {
        var mywindow = window.open('', 'Auteurs - Document', 'fullscreen="yes"');
        mywindow.document.write('<html><head><title>Auteurs - Document</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
        setTimeout(function () {
          mywindow.print();
          mywindow.close();
        }, 1250);
      } 
    }); 
  });


  $(document).on("click", "#print_emprunt", function (event) {
    event.preventDefault();
    $.ajax({
      url: 'Public/script/printemprunt.php',
      type: 'post',
      data: {},
      dataType: 'text',
      success: function (response) {
        var mywindow = window.open('', 'Document Emprunté', 'fullscreen="yes"');
        mywindow.document.write('<html><head><title>Document Emprunté</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
        setTimeout(function () {
          mywindow.print();
          mywindow.close();
        }, 1250);

        //mywindow.print();
        //mywindow.close();

      } // /success function
    }); // /ajax function to fetch the printable order
  });


  $(document).on("click", "#print_log", function (event) {
    event.preventDefault();
    $.ajax({
      url: 'Public/script/printlog.php',
      type: 'post',
      data: {},
      dataType: 'text',
      success: function (response) {
        var mywindow = window.open('', 'Historiques des frequentation', 'fullscreen="yes"');
        mywindow.document.write('<html><head><title>Historiques des frequentation</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
        setTimeout(function () {
          mywindow.print();
          mywindow.close();
        }, 1250);

        //mywindow.print();
        //mywindow.close();

      } // /success function
    }); // /ajax function to fetch the printable order
  });

  $(document).on("click", "#print_l", function (event) {
    event.preventDefault();
    $.ajax({
      url: 'Public/script/printl.php',
      type: 'post',
      data: {},
      dataType: 'text',
      success: function (response) {
        var mywindow = window.open('', 'Rapport de Lecteurs', 'fullscreen="yes"');
        mywindow.document.write('<html><head><title>Rapport de Lecteurs</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
        setTimeout(function () {
          mywindow.print();
          mywindow.close();
        }, 1250);

        //mywindow.print();
        //mywindow.close();

      } // /success function
    }); // /ajax function to fetch the printable order
  });


  $(document).on("click", "#print_r", function (event) {
    event.preventDefault();
    $.ajax({
      url: 'Public/script/printr.php',
      type: 'post',
      data: {},
      dataType: 'text',
      success: function (response) {
        var mywindow = window.open('', 'Rapport de Documents', 'fullscreen="yes"');
        mywindow.document.write('<html><head><title>Rapport de Documents</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
        setTimeout(function () {
          mywindow.print();
          mywindow.close();
        }, 1250);

        //mywindow.print();
        //mywindow.close();

      } // /success function
    }); // /ajax function to fetch the printable order
  });
  //recharger cette fonction toute les secondes
  // setInterval(1000);

});