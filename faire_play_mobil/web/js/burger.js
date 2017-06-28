// Attendre la fonction de chargement du DOM
$(document).ready(function(){

    /*
     Home Page
     */
    // Burger menu
    $('#burger').click(function(evt){

        // Bloquer le comportement naturel de la balise a
        evt.preventDefault();

        // Appliquer la fonction slideToggle sur la nav
        $('#nav').slideToggle();

    });

    // Burger Menu : navigation
    $('#nav a').click(function(evt){

        // Bloquer le comportement naturel de la balise a
        evt.preventDefault();

        var linkToOpen = $(this).attr('href');

        if ($('#burger').is(':hidden')) {
            window.location = linkToOpen;
        } else {
            // Fermer le Burger Menu
            $('#nav').slideUp(function () {

                // Changer de page
                window.location = linkToOpen;
            });
        }

    });

}); // Fin de la fonction d'attente de chargement du DOM