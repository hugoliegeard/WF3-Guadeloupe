
/* ----------------------------------
        LES SELECTEURS JQUERY
---------------------------------- */

// -- Format : $('selecteur')
// -- En JQ, tous les sélecteurs CSS sont disponible...

$(function() { // DOM is ready !

    l = (e) => { console.log(e) }

    // -- Sélectionner les balises SPAN
    l( document.getElementsByTagName('span') );
    l( $('span') );

    // -- Sélectionner mon Menu par son ID
    l( document.getElementById('menu') ); // En JS
    l( $('#menu') ); // En JQ

    // Sélectionner via une classe
    l( document.getElementsByClassName('maClasse') );
    l( $('.maClasse') );
    l( $('[href]') );
    l( $('[href="https://google.fr"]') );


});