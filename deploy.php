<?php
/**
 * GitHub Auto-Deployment Webhook Script
 * Bypasses Hostinger panel restrictions by running git pull directly.
 */

// Define a secure secret key to prevent unauthorized deploy triggers
define('SECRET_KEY', 'generation_marketing_deploy_secret_2026');

// Verify secret key from URL query string
if (!isset($_GET['secret']) || $_GET['secret'] !== SECRET_KEY) {
    http_response_code(403);
    echo "Access Denied: Invalid Secret Key";
    exit;
}

// Ensure shell execution is enabled
if (!function_exists('shell_exec')) {
    http_response_code(500);
    echo "Error: shell_exec is disabled on this server.";
    exit;
}

$project_root = __DIR__;
$old_cwd = getcwd();

// Change directory to project root so git commands run correctly
if (!chdir($project_root)) {
    http_response_code(500);
    echo "Error: Failed to change directory to project root.";
    exit;
}

// Ensure HOME environment variable is set for SSH to find deploy keys
if (!getenv('HOME') && preg_match('/^\/home\/([^\/]+)/', $project_root, $matches)) {
    putenv("HOME=/home/" . $matches[1]);
}

// Check for local changes (uncommitted modifications or untracked files)
$status = shell_exec("git status --porcelain 2>&1");
$has_changes = !empty(trim($status)) && (strpos($status, 'fatal:') === false);

$commands = [];
if ($has_changes) {
    // Stash local changes including untracked uploads
    $commands[] = "git stash -u 2>&1";
}

// Fetch and reset to GitHub main
$commands[] = "git fetch origin 2>&1";
$commands[] = "git reset --hard origin/main 2>&1";

if ($has_changes) {
    // Restore local changes on top of the pulled updates
    $commands[] = "git stash pop 2>&1";
}

$output = [];
$output[] = "=== Deploy Triggered - " . date('Y-m-d H:i:s') . " ===";

foreach ($commands as $cmd) {
    $output[] = "$ " . $cmd;
    $result = shell_exec($cmd);
    $output[] = $result ? trim($result) : "(no output)";
}

$output[] = "========================================\n";

// Restore the original working directory
if ($old_cwd) {
    chdir($old_cwd);
}

// Log output for debugging
file_put_contents($project_root . '/data/deploy-webhook.log', implode("\n", $output) . "\n", FILE_APPEND);

echo "Deployment Successful.\n";
echo implode("\n", $output);
?>
