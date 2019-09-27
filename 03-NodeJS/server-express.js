/**
 * Mise en Place de notre serveur
 * NodeJS grâce au Framework Express.
 * @type {createApplication}
 */
const express = require('express');

/**
 * Création du serveur express.
 */
const app = express();
const port = 3000;

/**
 * Importer le package 'nunjucks'
 * Configuration avec Express
 * https://mozilla.github.io/nunjucks/getting-started.html
 */
const nunjucks = require('nunjucks');

nunjucks.configure('views', {
    autoescape: true,
    express: app
});

/**
 * Importer le package 'lowdb'
 * https://www.npmjs.com/package/lowdb
 * ----------------------------------------
 * Il nous permettra de stocker et manipuler
 * des données dans un fichier au format JSON.
 */
const low = require('lowdb');
const FileSync = require('lowdb/adapters/FileSync');

const adapter = new FileSync('data/contacts.json');
const db = low(adapter);

/**
 * Pour récupérer les données POST, nous avons besoin
 * de la librairie 'body-parser'. Elle nous permettra
 * de manipuler les données 'POST' de la requète.
 */
const bodyParser = require('body-parser');
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

/**
 * Importer le package 'vCard'
 */
const vCardsJS = require('vcards-js');

/**
 * Importer le package 'qrCode'
 */
const qrCode = require('qrcode');

/**
 * Les objets 'req' (requete) et 'res' (réponse)
 * sont exactement les mêmes que ceux fournit par Node.
 */
app.get('/', (req, res) => {
    // res.sendFile(__dirname + '/views/html/index.html');
    res.redirect('/contacts');
});

app.get('/contacts', (req, res) => {

    // -- Récupérer la liste des contacts depuis mon fichier JSON
    const contactsDb = db.get('contacts').value();

    // res.sendFile(__dirname + '/views/html/contacts.html');
    res.render('html/contacts.html', {
        contacts: contactsDb
    });
});

app.get('/ajouter-un-contact', (req, res) => {
    res.render('html/ajouter-un-contact.html');
});

app.post('/ajouter-un-contact', (req, res) => {
    /**
     * Lors de la soumission du formulaire avec
     * la méthode POST, c'est cette fonction qui
     * sera executée.
     */
    // console.log( req.body );
    const contact = req.body;

    // Création d'un ID pour le contact
    contact.id = Date.now().toString();

    // On ajoute le nouveau contact dans notre fichier JSON
    db.get('contacts')
        .push(contact)
        .write();

    // On redirige l'utilisateur sur les contacts
    res.redirect('/contact/' + contact.id );
});

app.get('/contact/:id', (req, res) => {

    /**
     * On souhaite récupérer dans notre fichier JSON
     * le contact ayant l'ID passé dans l'URL !
     */
    const contact = db
        .get('contacts')
        .find({ id: req.params.id })
        .value();

    // console.log( contact );

    /**
     * Je souhaite également, générer une vCard pour le contact
     * Puis, a partir vCard générer un qrCode à afficher sur la page.
     */
    const vCardContact = vCardsJS();
    vCardContact.firstName = contact.prenom;
    vCardContact.lastName = contact.nom;
    vCardContact.email = contact.email;
    vCardContact.cellPhone = contact.tel;

    // Génération du QrCode
    qrCode.toDataURL(vCardContact.getFormattedString(),
        (err, url) => {
            /**
             * Quand le qrCode est généré on retourne
             * une réponse à l'utilisateur.
             */
            res.render('html/contact.html', {
                contact: contact,
                'qrCodeUrl' : url
            });
    });

});

// -- La route permettant la suppression d'un contact
app.get('/contact/:id/delete', (req, res) => {

    /**
     * On supprime le contact dans le fichier JSON
     * en nous basant sur son ID.
     */
    db.get('contacts')
        .remove({ id: req.params.id })
        .write();

    // Redirection sur la page principal
    res.redirect('/contacts');

});

// --------------- SECTION API ---------------- //

app.get('/api/contacts', (req, res) => {
    const contacts = db.get('contacts').value();
    res.status(200).json({
       status:200,
       method: req.method,
       data: contacts
    });
});

app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*"); // update to match the domain you will make the request from
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
});

/**
 * Démarrer l'écoute des connexions sur le port 3000
 */
app.listen(port, () => {
    console.log(`App listening on port http://localhost:${port}!`)
});