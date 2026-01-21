<?php
// Simple API wrapper for support_agent.py
// Usage: POST to this file with JSON body: { "question": "..." }

header('Content-Type: application/json');

// Check method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Get Input
$input = json_decode(file_get_contents('php://input'), true);
$question = $input['question'] ?? '';

if (empty($question)) {
    http_response_code(400);
    echo json_encode(['error' => 'Question required']);
    exit;
}

// Security: Basic sanitization (escapeshellarg handles the shell safety)
$safe_question = escapeshellarg($question);

// Path to python script (Adjust relative path if needed)
// Assuming this file is in /theme/ and script is in /academie/
// But for "webapp 5", structure is:
// /Users/sergiosandoval/Downloads/webapp 5/theme/api-chat.php
// /Users/sergiosandoval/Downloads/webapp 5/academie/support_agent.py
// So we need to go up one level then into academie.

$script_path = dirname(__DIR__) . '/academie/support_agent.py';

if (!file_exists($script_path)) {
    echo json_encode(['error' => 'Agent configuration error (Script not found)']);
    exit;
}

// Execute Python Script
// Note: This requires 'python3' to be in the path and allow execution.
// For shared hosting, this might be restricted.
$command = "python3 " . escapeshellarg($script_path) . " " . $safe_question;
$output = shell_exec($command);

if ($output === null) {
    echo json_encode(['error' => 'Agent silent failure']);
} else {
    // Return output directly (assuming script prints text only)
    echo json_encode(['response' => trim($output)]);
}
?>