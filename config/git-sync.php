<?php
/**
 * Auto-commits changes to data/blogs.json and uploads/blogs/
 * and pushes them back to GitHub.
 */
function git_auto_sync($message = "Update blogs from Admin Panel") {
    // Check if shell execution is allowed
    if (!function_exists('shell_exec')) {
        return false;
    }
    
    $project_root = dirname(__DIR__);
    
    // Commands to execute sequentially
    $commands = [
        "cd " . escapeshellarg($project_root),
        "git add data/blogs.json uploads/blogs/* 2>&1",
        "git commit -m " . escapeshellarg($message) . " 2>&1",
        "git push origin main 2>&1"
    ];
    
    $output = [];
    $output[] = "--- Git Auto Sync - " . date('Y-m-d H:i:s') . " ---";
    foreach ($commands as $cmd) {
        $output[] = "$ " . $cmd;
        $result = shell_exec($cmd);
        $output[] = $result ? trim($result) : "(no output)";
    }
    $output[] = "--------------------------------------\n";
    
    // Write log to data folder
    file_put_contents($project_root . '/data/git-sync.log', implode("\n", $output) . "\n", FILE_APPEND);
    return true;
}
?>
