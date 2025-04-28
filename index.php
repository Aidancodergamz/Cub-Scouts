<?php
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

$routes = [
    '' => 'public/index.php', 
    'user' => 'public/user.php',
    'games' => 'public/games.php',
    'about' => 'public/about.php',
];

if (array_key_exists($url, $routes)) {
    require $routes[$url];  

} else {
    require '404.php';
}
?>
