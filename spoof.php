<?php
// Authentication endpoint for PhantomID
header('Content-Type: application/json');

// Get parameters
$key = isset($_GET['key']) ? $_GET['key'] : null;
$fingerprint = isset($_GET['fp']) ? $_GET['fp'] : null;

// Check if required parameters are provided
if (!$key || !$fingerprint) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Missing required parameters'
    ]);
    exit;
}

// This is where you'd implement your actual license verification logic
// For now, this is a simple example implementation
$licenses = [
    // Replace with your actual license keys and their associated fingerprints
    'DEMO-KEY-12345' => [
        'fp' => '1234567890abcdef1234567890abcdef1234567890abcdef1234567890abcdef',
        'user_name' => 'Demo User',
        'expires_on' => '2025-12-31'
    ],
];

// Check if the license key exists
if (!array_key_exists($key, $licenses)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid license key'
    ]);
    exit;
}

// Check if the fingerprint matches
$license = $licenses[$key];
if ($license['fp'] !== $fingerprint) {
    echo json_encode([
        'status' => 'error',
        'message' => 'HWID mismatch. This license is registered to another computer.'
    ]);
    exit;
}

// If we got here, the license is valid
echo json_encode([
    'status' => 'success',
    'message' => 'Authentication successful',
    'user_name' => $license['user_name'],
    'expires_on' => $license['expires_on']
]);
