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
const hostname = '127.0.0.1';
const port = 3000;

/**
 * Création de notre serveur NodeJS
 * @type {Server}
 */
const server = http.createServer( (req, res) => {

    // -- On envoi un code statut HTTP.
    res.statusCode = 200;

    // -- On ajoute a notre réponse une en-tête HTTP de type texte.
    res.setHeader('content-type', 'text/plain');

    // -- Fin de notre réponse, on retourne Hello World !
    res.end('Hello Node World !');
} );

/**
 * Démarrage du serveur et écoute
 * des connexion sur le port 3000.
 */
server.listen( port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
    console.log(`Press CTRL-C to stop.\n`);
} );