// -- 1. Ecouter la soumission du formulaire par mon utilisateur
$('#contact').submit(function(e) {

    // 2. Stopper la redirection de la page.
    e.preventDefault();

    // 2b. Réinitialisation des erreurs
    $('#contact .alert-danger').remove();

    // 3. Récupérer les éléments à vérifier
    const prenom    =  $('#prenom');
    const nom       =  $('#nom');
    const email     =  $('#email');
    const tel       =  $('#tel');

    // 4. Vérification des champs

        // -- Prénom : Si le champ est vide (non rempli par l'utilisateur)
        // if( prenom.val().length === 0 ) { // Autre méthodologie
        if( prenom.val() == '' ) {
            console.log('Vous avez oublié votre prénom...');
            prenom.addClass('is-invalid'); 
        }

        // -- Nom
        if( nom.val() == '' ) {
            console.log('Vous avez oublié votre nom...');
            nom.addClass('is-invalid'); 
        }

        // -- Email
        if( email.val() == '' ) {
            console.log('Vous avez oublié votre email...');
            email.addClass('is-invalid'); 
        }

        // -- Téléphone
        if( tel.val() == '' ) {
            console.log('Vous avez oublié votre tel...');
            tel.addClass('is-invalid'); 
        }

    // -- Comment je peux savoir s'il y a eu des erreurs sur mes champs ?
    // Je vais compter le nb d'éléments ayant la classe 'is-invalid'
    // console.log($('#contact .is-invalid'));

    if( $('#contact .is-invalid').length === 0 ) {
        console.log("Pas d'erreurs de validation");

        $(this).replaceWith(`
            <div class="alert alert-success">
                Votre contact à bien été transmis.
                Nous vous répondrons dans les meilleurs délais.
            </div>
        `);

    } else {
        console.log("Il y a eu des erreurs de validation");

        $(this).prepend(`
            <div class="alert alert-danger">
                Nous n'avons été en mesure de valider votre contact.
                Vérifiez vos informations.
            </div>
        `);

    }

});