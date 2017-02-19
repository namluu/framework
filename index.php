<?php
require_once 'models/database.php';
require_once 'controllers/controller.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/framework/' === $uri || '/framework/index.php' === $uri) {
    listAction();
} elseif ('/framework/index.php/show' === $uri && isset($_GET['id'])) {
    showAction($_GET['id']);
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}