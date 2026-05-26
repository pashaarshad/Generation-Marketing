<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('ADMIN_USERNAMES', ['generationmarketing', 'horizontal']);
// Hash of 'admin@123'
define('ADMIN_PASSWORD_HASH', password_hash('admin@123', PASSWORD_DEFAULT));

/**
 * Checks if the admin is logged in.
 * @return bool
 */
function is_logged_in() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Redirects to the login page if the admin is not logged in.
 */
function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

/**
 * Authenticates user credentials.
 * @param string $username
 * @param string $password
 * @return bool
 */
function authenticate($username, $password) {
    $username = strtolower(trim($username));
    if (in_array($username, ADMIN_USERNAMES)) {
        // Since we define the hash in a constant dynamic execution, we can also check against it,
        // or compare with 'admin@123' directly. Since password_verify is standard, we'll verify it:
        if (password_verify($password, ADMIN_PASSWORD_HASH) || $password === 'admin@123') {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $username;
            return true;
        }
    }
    return false;
}
?>
