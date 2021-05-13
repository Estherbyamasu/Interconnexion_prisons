// $(document).ready(function() {
//     affiche_caf();

//     Addcaf();
// });

// function Addcaf() {



//     $("#btn_addcaf").click(function() {


//         var nom = $("input[name='nom']").val();
//         var prenom = $("#prenom").val();
//         var tel = $("#tel").val();

//         //---------initialiser le regular express
//         var reg_nom = /^[a-zA-Z\s]*$/;
//         //-----------------------------------------------------
//         if (nom.length == 0) {
//             $("#messg").text('Completez tous les champs!!!').css('color', 'red');
//             $("#nom").focus();
//             return false;

//         } else if (nom.length == 0 || !nom.match(reg_nom)) {

//             $("#msg_desigantion").text('*La nom est recomandée*').css('color', 'red');;
//             $("#nom").focus();
//             return false;
//         } else {

//             swal({
//                 title: "Etes-vous sure?",
//                 text: "Enregistrement du caf!",
//                 type: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: "#DD6B55",
//                 confirmButtonText: "Oui, Enregistre!",
//                 closeOnConfirm: false
//             }, function(isConfirm) {
//                 if (!isConfirm) return;
//                 $.ajax({
//                     url: 'script/addcaf.php',
//                     method: "POST",
//                     datatype: 'html',
//                     data: {
//                         nom: nom,
//                         prenom: prenom

//                     },
//                     success: function(response) {

//                         swal("Success", response, "success");

//                         affiche_caf();
//                     },
//                     error: function(response, ajaxOptions, thrownError) {
//                         swal("Erreur d'enregistrement!", response, "error");
//                     }
//                 });
//             });

//         }



//     });

// }


// function affiche_caf() {

//     affiche_caf(1);

//     function affiche_caf(page, query = '') {
//         $.ajax({
//             url: "script/fetch_caf.php",
//             method: "POST",
//             data: { page: page, query: query },
//             success: function(data) {
//                 $('#dynamic_content_utilisateur').html(data);
//             }
//         });
//     }

//     $(document).on('click', '.page-link', function() {
//         var page = $(this).data('page_number');
//         var query = $('#search_box').val();
//         affiche_caf(page, query);
//     });

//     $('#search_box').keyup(function() {
//         var query = $('#search_box').val();
//         affiche_caf(1, query);
//     });

// }




$(document).ready(function() {
    affiche_prisonnier();

    Addprisonnier();
});

function Addprisonnier() {
    $("#btn_addprisonnier").click(function(){

        var nom = $("input[name='nom_prisonnier']").val();
        var prenom = $("#prenom_prisonnier").val();
        var tel = $("#adresse").val();

        //---------initialiser le regular express
        var reg_nom = /^[a-zA-Z\s]*$/;
        //-----------------------------------------------------
        if (nom.length == 0) {
            $("#messg").text('Completez tous les champs!!!').css('color', 'red');
            $("#nom_prisonnier").focus();
            return false;

        } else if (nom.length == 0 || !nom.match(reg_nom)) {

            $("#msg_nom_prisonnier").text('*La nom est recomandée*').css('color', 'red');;
            $("#nom_prisonnier").focus();
            return false;
        } else {

            swal({
                title: "Etes-vous sure?",
                text: "Enregistrement du caf!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Oui, Enregistre!",
                closeOnConfirm: false
            }, function(isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: 'script/addcaf.php',
                    method: "POST",
                    datatype: 'html',
                    data: {
                        nom_prisonnier: nom_prisonnier,
                        prenom_prisonnier: prenom_prisonnier,                        
                        adresse: adresse

                    },
                    success: function(response) {

                        swal("Success", response, "success");

                        affiche_prisonnier();
                    },
                    error: function(response, ajaxOptions, thrownError) {
                        swal("Erreur d'enregistrement!", response, "error");
                    }
                });
            });

        }



    });

}


function affiche_prisonnier() {

    affiche_prisonnier(1);

    function affiche_prisonnier(page, query = '') {
        $.ajax({
            url: "script/fetch_caf.php",
            method: "POST",
            data: { page: page, query: query },
            success: function(data) {
                $('#dynamic_content_utilisateur').html(data);
            }
        });
    }

    $(document).on('click', '.page-link', function() {
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        affiche_caf(page, query);
    });

    $('#search_box').keyup(function() {
        var query = $('#search_box').val();
        affiche_prisonnier(1, query);
    });

}