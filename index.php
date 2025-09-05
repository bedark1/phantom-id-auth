<?php
// Simple index page for the PhantomID Auth API
header('Content-Type: application/json');
echo json_encode([
    'name' => 'PhantomID Auth API',
    'version' => '1.0.0',
    'status' => 'online',
    'message' => 'PhantomID Authentication Service is running'
]);
