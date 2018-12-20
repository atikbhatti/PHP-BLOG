<?php 
// Include the Router class
// @note: it's recommended to just use the composer autoloader when working with other packages too
require_once PATH_LIBS. 'router.php';

// Create a Router
$router = new \Bramus\Router\Router();

// Define App routes
$router->get('/', function() use ($db) {
    include PATH_VIEWS."home.php";
});

$router->match('GET|POST','/register', function() use ($db) {
    include PATH_VIEWS."pages/register.php";
});

$router->match('GET|POST','/login', function() use ($db) {
    include PATH_VIEWS."pages/login.php";
});

$router->get('/logout', function() use ($db) {
    include PATH_CONTROLLER."/logout.php";
});

// Post Routes
$router->match('GET|POST','/createpost', function() use ($db) {
    include PATH_VIEWS."pages/create.php";
});

$router->match('GET|POST','/myposts', function() use ($db) {
    include PATH_VIEWS."pages/myposts.php";
});

$router->match('GET|POST','/postedit/(\d+)', function($postId) use ($db) {
    include PATH_VIEWS."pages/postedit.php";
});

$router->match('GET|POST','/postdelete/(\d+)', function($postId) use ($db) {
    include PATH_CONTROLLER."/postdelete.php";
});


// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});