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
 * Les objets 'req' (requete) et 'res' (réponse)
 * sont exactement les mêmes que ceux fournit par Node.
 */
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/views/html/index.html');
});

app.get('/contacts', (req, res) => {
    res.sendFile(__dirname + '/views/html/contacts.html');
});

app.get('/contact', (req, res) => {
    res.sendFile(__dirname + '/views/html/contact.html');
});

/**
 * Démarrer l'écoute des connexions sur le port 3000
 */
app.listen(port, () => {
    console.log(`App listening on port http://localhost:${port}!`)
});