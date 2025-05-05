<?php
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

$routes = [
    // All general routing is put here
    '' => 'public/index.php', 
    'gallery' => 'public/gallery.php',
    'about' => 'public/about.php',
    'contact' => 'public/contact.php',
    'sign_in' => 'public/signin.php',
    'register' => 'public/register.php',
    'success' => 'messages/register-success.php',
    'contact_message' => 'messages/contact-message.php',
    '404' => '404.php',

    //Handler pages are here
    'logout' => 'handlers/logout.php',

    // I've put all admin related pages here
    'admin_dash' => 'public/admin/dashboard.php',

    //All the parent related pages are here
    'parent_dash' => 'public/parent/dashboard.php',

    //All Scout related pages are here
    'scout_dash' => 'public/scout/dashboard.php',
    'badges' => 'public/scout/badges.php',
    'games' => 'public/scout/games.php',
];

if (array_key_exists($url, $routes)) {
    require $routes[$url];  

} else {
    require '404.php';
}
?>
