<?php
// Start a Session
if (!session_id()) @session_start();

// App configuaration
require_once __DIR__. '/includes/config.php';

// App initialization
require_once __DIR__. '/includes/init.php';

// Thunderbirds are go!
$router->run();
