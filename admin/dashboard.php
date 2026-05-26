<?php
require_once dirname(__DIR__) . '/config/auth.php';
require_login();

// Check for manual sync trigger
if (isset($_GET['sync']) && $_GET['sync'] === 'now') {
    require_once dirname(__DIR__) . '/config/git-sync.php';
    $sync_result = git_auto_sync("Manual sync from Admin Panel");
    if ($sync_result) {
        header('Location: dashboard.php?success=' . urlencode('Git sync triggered successfully! Check logs below.'));
    } else {
        header('Location: dashboard.php?error=' . urlencode('Failed to trigger Git sync (shell_exec might be disabled).'));
    }
    exit;
}

// Load blogs from JSON
$json_path = dirname(__DIR__) . '/data/blogs.json';
$blogs = [];
if (file_exists($json_path)) {
    $blogs_data = file_get_contents($json_path);
    $blogs = json_decode($blogs_data, true);
    if (!is_array($blogs)) {
        $blogs = [];
    }
}

// Calculate stats
$total_posts = count($blogs);
$published_count = 0;
$draft_count = 0;
foreach ($blogs as $blog) {
    if (isset($blog['status']) && $blog['status'] === 'published') {
        $published_count++;
    } else {
        $draft_count++;
    }
}

// Sort by date descending for listing
usort($blogs, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

$success_msg = $_GET['success'] ?? '';
$error_msg = $_GET['error'] ?? '';

// Collect Git Diagnostics
$diagnostics = '';
if (function_exists('shell_exec')) {
    $old_cwd = getcwd();
    chdir(dirname(__DIR__));
    $diagnostics .= "PHP User: " . (function_exists('posix_getpwuid') && function_exists('posix_geteuid') ? posix_getpwuid(posix_geteuid())['name'] : 'unknown') . "\n";
    $diagnostics .= "Git Remote: " . shell_exec("git remote -v 2>&1") . "\n";
    $diagnostics .= "Git Status: " . shell_exec("git status 2>&1") . "\n";
    $diagnostics .= "SSH Connection Test: " . shell_exec("ssh -T git@github.com 2>&1") . "\n";
    chdir($old_cwd);
} else {
    $diagnostics = "shell_exec is disabled.";
}

// Load logs
$git_sync_log_path = dirname(__DIR__) . '/data/git-sync.log';
$git_sync_log = '';
if (file_exists($git_sync_log_path)) {
    $git_sync_log = file_get_contents($git_sync_log_path);
    if (strlen($git_sync_log) > 2000) {
        $git_sync_log = "..." . substr($git_sync_log, -2000);
    }
} else {
    $git_sync_log = "No sync log found yet. Add/edit a blog post or click 'Sync to GitHub' to create the log.";
}

$deploy_log_path = dirname(__DIR__) . '/data/deploy-webhook.log';
$deploy_log = '';
if (file_exists($deploy_log_path)) {
    $deploy_log = file_get_contents($deploy_log_path);
    if (strlen($deploy_log) > 2000) {
        $deploy_log = "..." . substr($deploy_log, -2000);
    }
} else {
    $deploy_log = "No deployment webhook log found yet. Pings to deploy.php will populate this log.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Generation Marketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <img src="../assets/logo.png" alt="Generation Marketing" class="admin-logo">
            <ul class="sidebar-menu">
                <li>
                    <a href="dashboard.php" class="active">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="add-blog.php">
                        <i class="fas fa-plus-circle"></i> Add New Blog
                    </a>
                </li>
                <li>
                    <a href="../index.php" target="_blank">
                        <i class="fas fa-globe"></i> Visit Website
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-content">
            <div class="dashboard-header">
                <div>
                    <h2>Blog Dashboard</h2>
                    <p class="text-muted mb-0">Manage all your agency blog posts here</p>
                </div>
                <a href="add-blog.php" class="btn btn-primary px-4 py-2fw-bold d-flex align-items-center gap-2" style="border-radius: 10px; background-color: var(--primary); border: none;">
                    <i class="fas fa-plus"></i> Add New Post
                </a>
            </div>

            <?php if (!empty($success_msg)): ?>
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 py-3 mb-4" role="alert" style="border-radius: 12px;">
                    <i class="fas fa-check-circle fs-5"></i>
                    <div style="font-weight: 500;"><?php echo htmlspecialchars($success_msg); ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (!empty($error_msg)): ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 py-3 mb-4" role="alert" style="border-radius: 12px;">
                    <i class="fas fa-exclamation-circle fs-5"></i>
                    <div style="font-weight: 500;"><?php echo htmlspecialchars($error_msg); ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Stats Row -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h5>Total Posts</h5>
                            <h2><?php echo $total_posts; ?></h2>
                        </div>
                        <div class="stat-icon icon-blue">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h5>Published</h5>
                            <h2><?php echo $published_count; ?></h2>
                        </div>
                        <div class="stat-icon icon-green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h5>Drafts</h5>
                            <h2><?php echo $draft_count; ?></h2>
                        </div>
                        <div class="stat-icon icon-yellow">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Card -->
            <div class="content-card">
                <h4 style="color: var(--navy); font-weight: 700; margin-bottom: 25px;">Recent Articles</h4>
                
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Cover</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($blogs)): ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fas fa-folder-open fs-1 mb-3"></i>
                                        <p class="mb-0">No blog posts found. Click "Add New Post" to create one.</p>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($blogs as $blog): ?>
                                    <?php 
                                    $image_src = htmlspecialchars($blog['image']);
                                    if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
                                        $image_src = '../uploads/blogs/' . htmlspecialchars($blog['image']);
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $image_src; ?>" alt="Thumb" class="blog-thumb">
                                        </td>
                                        <td style="font-weight: 600; color: var(--navy);">
                                            <?php echo htmlspecialchars($blog['title']); ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark px-2 py-1" style="font-size: 0.8rem; border: 1px solid var(--border-color);"><?php echo htmlspecialchars($blog['category']); ?></span>
                                        </td>
                                        <td>
                                            <?php if (isset($blog['status']) && $blog['status'] === 'published'): ?>
                                                <span class="badge-published">Published</span>
                                            <?php else: ?>
                                                <span class="badge-draft">Draft</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-muted">
                                            <?php echo date('d M Y, H:i', strtotime($blog['created_at'])); ?>
                                        </td>
                                        <td>
                                            <div class="actions-cell">
                                                <a href="edit-blog.php?id=<?php echo $blog['id']; ?>" class="btn-action" title="Edit Post">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                                <a href="delete-blog.php?id=<?php echo $blog['id']; ?>" class="btn-action btn-delete" title="Delete Post" onclick="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.');">
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Git Diagnostics & logs section -->
            <div class="content-card mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 style="color: var(--navy); font-weight: 700; margin: 0;">Git & Deployment Diagnostics</h4>
                    <div class="d-flex gap-2">
                        <a href="dashboard.php" class="btn btn-sm btn-outline-secondary px-3" style="border-radius: 8px;">
                            <i class="fas fa-sync-alt me-1"></i> Refresh logs
                        </a>
                        <a href="dashboard.php?sync=now" class="btn btn-sm btn-primary px-3" style="border-radius: 8px; background-color: var(--primary); border: none;">
                            <i class="fas fa-cloud-upload-alt me-1"></i> Sync to GitHub
                        </a>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- System Info and Git Diagnostics -->
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-2 text-muted uppercase" style="font-size: 0.85rem; letter-spacing: 0.5px;">Git Connection Diagnostics</h6>
                        <pre class="bg-dark text-white p-3 rounded" style="font-size: 0.8rem; max-height: 250px; overflow-y: auto; font-family: SFMono-Regular, Consolas, Monaco, monospace;"><?php echo htmlspecialchars($diagnostics); ?></pre>
                        
                        <div class="alert alert-info mt-3 py-2 px-3" style="border-radius: 8px; font-size: 0.85rem;">
                            <i class="fas fa-info-circle me-1"></i> <strong>Note:</strong> If <strong>SSH Connection Test</strong> says <code>Permission denied (publickey)</code>, it means GitHub is rejecting the SSH key. Ensure that the SSH Deploy Key (with write access) is correctly added to GitHub, and the private key is located in the Hostinger user's <code>~/.ssh/</code> folder.
                        </div>
                    </div>

                    <!-- Git Logs and Webhook logs -->
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-2 text-muted uppercase" style="font-size: 0.85rem; letter-spacing: 0.5px;">Git Auto-Sync Log (Pushing to GitHub)</h6>
                        <pre class="bg-dark text-white p-3 rounded mb-4" style="font-size: 0.8rem; max-height: 150px; overflow-y: auto; font-family: SFMono-Regular, Consolas, Monaco, monospace;"><?php echo htmlspecialchars($git_sync_log); ?></pre>
                        
                        <h6 class="fw-bold mb-2 text-muted uppercase" style="font-size: 0.85rem; letter-spacing: 0.5px;">Deploy Webhook Log (Pulling from GitHub)</h6>
                        <pre class="bg-dark text-white p-3 rounded" style="font-size: 0.8rem; max-height: 150px; overflow-y: auto; font-family: SFMono-Regular, Consolas, Monaco, monospace;"><?php echo htmlspecialchars($deploy_log); ?></pre>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
