<!--/*-->
<!--*  /login  - sign in (GET)-->
<!--*  /register - sign up (GET)-->
<!--*  /auth/login (POST) -> form-->
<!--*  /dashboard -> admin-->
<!--*  /profile -> admin, user-->
<!--*/-->

<?php
use App\Services\App;
session_start();

require_once __DIR__. '/vendor/autoload.php';
App::start();

require_once __DIR__ . '/router/routes.php';
//echo '<pre>';
//echo var_export(\App\Services\Router::$list);
//echo '</pre>';
