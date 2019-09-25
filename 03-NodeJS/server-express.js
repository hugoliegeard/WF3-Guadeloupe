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
 * Les objets 'req' (requete) et 'res' (réponse)
 * sont exactement les mêmes que ceux fournit par Node.
 */
app.get('/', (req, res) => {

    let data = db.get('contacts')
        .value();

    console.log(data);
    // res.sendFile(__dirname + '/views/html/index.html');
    res.redirect('/contacts');
});

app.get('/contacts', (req, res) => {
    // res.sendFile(__dirname + '/views/html/contacts.html');
    res.render('html/contacts.html');
});

app.get('/contact', (req, res) => {
    // res.sendFile(__dirname + '/views/html/contact.html');
    res.render('html/contact.html');
});

/**
 * Démarrer l'écoute des connexions sur le port 3000
 */
app.listen(port, () => {
    console.log(`App listening on port http://localhost:${port}!`)
});