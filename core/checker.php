<?php

try 
{
    // Check if the autoload file exists
    if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
        throw new Exception('Autoload file not found. Please run "composer install" to install dependencies.');
    }
    // Include the Composer autoload file
    require_once __DIR__ . '/../vendor/autoload.php';

} catch (Exception $e) {
    http_response_code(500);

    // On va chercher le template d'erreur
    $template = __DIR__ . '/../core/templates/error.html.php';
    if (file_exists($template)) {
        include $template;
    } else {
        echo 'An error occurred: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }

    exit;
}