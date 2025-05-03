<?php
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

$routes = [
    '' => 'public/index.php', 
    'gallery' => 'public/gallery.php',
    'about' => 'public/about.php',
    'contact' => 'public/contact.php',
    'signin' => 'public/signin.php',
    'register' => 'public/register.php',
];

if (array_key_exists($url, $routes)) {
    require $routes[$url];  

} else {
    require '404.php';
}
?>
