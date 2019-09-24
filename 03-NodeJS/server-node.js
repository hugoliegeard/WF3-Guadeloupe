/**
 * Importer le module HTTP.
 * ------------------------------------
 * Toutes les fonctions du module HTTP
 * sont maintenant disponible dans notre
 * constante 'http'.
 * ------------------------------------
 * Permet de gérer les opérations HTTP.
 * @type {module:http}
 */
const http = require('http');

/**
 * Déclarer notre hôte (Url du serveur web)
 * et son port (Port HTTP).
 */
const hostname = '10.10.10.50';
const port = 3000;

/**
 * Importe le module 'url' qui
 * nous permettra de lire l'URL
 * et ses données.
 * @type {module:url}
 */
const url = require('url');

/**
 * Importe le module 'fs' qui
 * nous permettra d'accéder au
 * système de fichier.
 * @type {module:fs}
 */
const fs = require('fs');

/**
 * Création de notre serveur NodeJS
 * @type {Server}
 */
const server = http.createServer((req, res) => {

    let path = url.parse(req.url).pathname;
    // console.log(path);
    console.log(__dirname);

    if (path === '/') {

        // -- Je demande à NodeJS de lire mon fichier HTML.
        fs.readFile(__dirname + '/views/html/index.html',
            (err, data) => {
                /**
                 * Le contenu de ma fonction ne sera executé que lorsque
                 * NodeJS aura fini la lecture de mon fichier.
                 * ----------------------------------------------
                 * 'data' : contient les données de ma page HTML.
                 */

                // -- En cas d'erreur je l'affiche dans la console.
                if (err) console.log(err);

                res.statusCode = 200;
                res.setHeader('content-type', 'text/html; charset=utf-8');
                res.end(data);

            }); // Fin de fs.readFile


    } else if (path === '/contacts') {

        fs.readFile(__dirname + '/views/html/contacts.html',
            (err, data) => {

                if (err) console.log(err);

                res.statusCode = 200;
                res.setHeader('content-type', 'text/html; charset=utf-8');
                res.end(data);

            }); // Fin de fs.readFile

    } else if (path === '/contact') {

        let params = url.parse(req.url, true).query;
        let prenom = params.prenom || 'Anonyme';
        let nom = params.nom || '';

        res.statusCode = 200;
        res.setHeader('content-type', 'text/html; charset=utf-8');
        res.end(`<html><body><h1>Mon Contact : ${prenom} ${nom}</h1></body></html>`);

        // Pour tester : http://localhost:3000/contact?prenom=Nia&nom=VITALIS

    } else {

        res.statusCode = 404;
        res.setHeader('content-type', 'text/html; charset=utf-8');
        res.end(`<html><body><h1>Erreur 404 !</h1></body></html>`);

    }

}); // Fin du http.createServer()

/**
 * Démarrage du serveur et écoute
 * des connexion sur le port 3000.
 */
server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
    console.log(`Press CTRL-C to stop.\n`);
});