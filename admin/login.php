<?php
require_once dirname(__DIR__) . '/config/auth.php';

// If already logged in, redirect to dashboard
if (is_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        if (authenticate($username, $password)) {
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Generation Marketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body class="login-body">

    <div class="login-card">
        <a href="../index.php">
            <img src="../assets/logo.png" alt="Generation Marketing" class="login-logo">
        </a>
        <h3>Admin Portal</h3>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 py-2 mb-4" role="alert" style="border-radius: 10px;">
                <i class="fas fa-exclamation-circle"></i>
                <div style="font-size: 0.9rem; font-weight: 500;"><?php echo htmlspecialchars($error); ?></div>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px; border-color: var(--border-color);"><i class="fas fa-user text-muted"></i></span>
                    <input type="text" class="form-control border-start-0" id="username" name="username" placeholder="Enter username" required style="border-radius: 0 10px 10px 0; border-color: var(--border-color);">
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px; border-color: var(--border-color);"><i class="fas fa-lock text-muted"></i></span>
                    <input type="password" class="form-control border-start-0" id="password" name="password" placeholder="Enter password" required style="border-radius: 0 10px 10px 0; border-color: var(--border-color);">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold" style="border-radius: 10px; background-color: var(--primary); border: none;">
                <i class="fas fa-sign-in-alt me-2"></i> Log In
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
