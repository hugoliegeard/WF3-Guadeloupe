/* ------------------------------------------------
                
                LA DISPONIBILITE DU DOM 🤡
    
    A partir du moment, ou mon DOM, c'est dire
    l'ensemble de l'arborescence de ma page HTML
    est complètement chargé ; je peux commencer
    à utiliser jQuery.

    Je vais mettre l'ensemble de mon code dans une
    fonction, qui sera appelée AUTOMATIQUEMENT ! Par
    jQuery lorsque le DOM sera entièrement défini.

    3 façons de le faire :

 ------------------------------------------------ */

 jQuery(document).ready(function () {
    // -- Ici mon DOM est entièrement chargé ;
    // -- Je peux écrire mon code
    console.log( 'jQuery is ready to rock !' );
 });

 // 2ème méthode (Rencontrée généralement)
 $(document).ready(function () {
    console.log( 'jQuery is ready to rock !' );
 });

 // 3ème méthode (Méthode privilégiée)
 $(function () {
    console.log( 'jQuery is ready to rock !' );
 });

 // 4ème méthode en ES6 (Pas recommandé)
 $(() => {
    
    // alert('Bienvenue dans ce cours JQ !');

    // En JS
    document.getElementById('texteEnJQ').innerHTML = 
        '<strong>Mon texte en JS</strong>';

    // En JQ
    $('#texteEnJQ').html('<strong>Mon texte en JQ</strong>');

 });