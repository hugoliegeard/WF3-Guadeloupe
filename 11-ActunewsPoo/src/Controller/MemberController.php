<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MemberController
{

    public function register()
    {
        # echo '<h1>PAGE INSCRIPTION | CONTROLLER</h1>';
        return new Response('<h1>PAGE INSCRIPTION | CONTROLLER | RESPONSE</h1>');
    }

    public function login()
    {
        # echo '<h1>PAGE CONNEXION | CONTROLLER</h1>';
        return new Response('<h1>PAGE CONNEXION | CONTROLLER | RESPONSE</h1>');
    }

}
