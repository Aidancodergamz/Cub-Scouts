<?php
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

$routes = [
    '' => 'public/index.php', 
    'gallery' => 'public/gallery.php',
    'about' => 'public/about.php',
    'contact' => 'public/contact.php',
    'sign_in' => 'public/signin.php',
    'register' => 'public/register.php',
    'success' => 'messages/register-success.php',

    '404' => '404.php',
];

if (array_key_exists($url, $routes)) {
    require $routes[$url];  

} else {
    require '404.php';
}
?>
