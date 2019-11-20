<?php

# 1. Déduction du Controller et de l'Action
$controller = 'App\\Controller\\' . ucfirst( ( $request->get('controller') ?? DEFAULT_CONTROLLER ) ) . 'Controller'; // ?? 'DefaultController'; // default
$action     = $request->get('action') ?? DEFAULT_ACTION; // home