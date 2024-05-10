<?php
//set cookies
if (ini_get('session.use-cookies')) {

    $params = session_get_cookie_params();

    setcookie(

        session_name(),

        "test",
        time() - 42000,

        $params[“path”],

        $params[“domain”],

        $params[“secure”],

        $params[“httponly”]

    );

}
$ten = session_name();
echo 'Hello the world'.$ten;
?>