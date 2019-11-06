$(function() {

    console.log('jQuery is ready !');

    $('#newsletter').submit(function(event) {

        // -- Bloquer la redirection du formulaire
        event.preventDefault();

        const email = $('#newsletter input[name="email"]');

        // -- Débuter le processus de vérification des champs
        // ...
        // -- Fin de la Vérification ( A faire a la maison )

        // -- Début de la requète AJAX
        console.log( $('#newsletter').serialize() );
        console.log( $(this) );

        $.ajax({
            type: $(this).attr('method'), // Le type de ma requète depend du formulaire
            url: $(this).attr('action'), // Le fichier qui s'occupera du traitement.
            data: $(this).serialize(), // On formate les données pour PHP.
            dataType: 'JSON', // Les données seront retournées au format JSON par le serveur.
            timeout: 5000 // Le nb de temps ou $.ajax attendra une réponse du serveur.
        })
        .done( function(resultat) {
            console.log ( resultat.success );

            if ( resultat.success ) {

                // Si j'ai un retour positif de PHP, j'affiche un message de succès.

                $('#newsletter').replaceWith(`
                    <div class="alert alert-success">
                        Merci, votre email a bien été ajouté. <br>
                        <u>A très vite dans notre prochaine newsletter !</u>
                    </div>
                `);

            } else {

                // Sinon, il y a eu un problème, nous allons vérifier d'ou viens le soucis

                // A. Email déjà présent dans la base
                if ( resultat.errors.isEmailInDb ) {

                    $('#newsletter').prepend(`
                        <div class="alert alert-danger">
                            Attention, votre adresse email est
                            <u>déjà présente dans nos listes.</u>
                        </div>
                    `);

                    email.addClass('is-invalid');

                    $(`
                        <div class="invalid-feedback">
                            Cet email existe déjà.
                        </div>
                    `).appendTo( email.parent() );

                    // $('#newsletter').get(0).reset();

                }

                // B. Email n'est pas au bon format
                if ( resultat.errors.isEmailInvalid ) {

                    $('#newsletter').prepend(`
                        <div class="alert alert-danger">
                            Attention, votre adresse email 
                            <u>n'est pas au bon format.</u>
                        </div>
                    `);

                    email.addClass('is-invalid');

                    $(`
                        <div class="invalid-feedback">
                            Vérifiez le format de votre email.
                        </div>
                    `).appendTo( email.parent() );

                }

                // C. Email n'a pas été rempli
                if ( resultat.errors.isEmailEmpty ) {

                    $('#newsletter').prepend(`
                        <div class="alert alert-danger">
                            Attention, votre adresse email 
                            <u>a été oubliée.</u>
                        </div>
                    `);

                    email.addClass('is-invalid');

                    $(`
                        <div class="invalid-feedback">
                            Vérifiez     votre email.
                        </div>
                    `).appendTo( email.parent() );

                }

            }

        } );

    });

});