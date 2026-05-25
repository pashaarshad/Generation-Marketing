<?php
require_once dirname(__DIR__) . '/config/auth.php';
require_login();

$error = '';
$success = '';

// Helper to create a URL friendly slug
function generate_slug($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

// Load blogs
$json_path = dirname(__DIR__) . '/data/blogs.json';
$blogs = [];
if (file_exists($json_path)) {
    $blogs_data = file_get_contents($json_path);
    $blogs = json_decode($blogs_data, true);
    if (!is_array($blogs)) {
        $blogs = [];
    }
}

// Find blog to edit
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$blog_index = -1;
$blog = null;

foreach ($blogs as $index => $b) {
    if (isset($b['id']) && $b['id'] === $id) {
        $blog_index = $index;
        $blog = $b;
        break;
    }
}

if ($blog === null) {
    header('Location: dashboard.php?error=' . urlencode('Blog post not found.'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $excerpt = trim($_POST['excerpt'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $status = trim($_POST['status'] ?? 'published');
    
    // Validations
    if (empty($title) || empty($category) || empty($excerpt) || empty($content)) {
        $error = 'All text fields are required.';
    } else {
        // Handle slug regeneration if title changed
        $slug = $blog['slug'];
        if ($title !== $blog['title']) {
            $base_slug = generate_slug($title);
            $slug = $base_slug;
            $counter = 1;
            
            // Check slug uniqueness (excluding current post)
            while (true) {
                $exists = false;
                foreach ($blogs as $idx => $b) {
                    if ($idx !== $blog_index && isset($b['slug']) && $b['slug'] === $slug) {
                        $exists = true;
                        break;
                    }
                }
                if (!$exists) {
                    break;
                }
                $slug = $base_slug . '-' . $counter;
                $counter++;
            }
        }
        
        // Handle Image Upload
        $image_filename = $blog['image'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            
            // Validate extension
            $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (!in_array($ext, $allowed)) {
                $error = 'Invalid image file format. Allowed formats: JPG, JPEG, PNG, GIF, WEBP.';
            } elseif ($file_size > 5 * 1024 * 1024) {
                $error = 'Image file size is too large (maximum limit is 5MB).';
            } else {
                $upload_dir = dirname(__DIR__) . '/uploads/blogs';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                // Create unique filename
                $new_image_filename = uniqid('blog_') . '.' . $ext;
                $upload_path = $upload_dir . '/' . $new_image_filename;
                
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // Delete old image if it is local (not a remote url)
                    if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
                        $old_image_path = $upload_dir . '/' . $blog['image'];
                        if (file_exists($old_image_path)) {
                            @unlink($old_image_path);
                        }
                    }
                    $image_filename = $new_image_filename;
                } else {
                    $error = 'Failed to save uploaded image.';
                }
            }
        }
        
        // Update if no error
        if (empty($error)) {
            $blogs[$blog_index]['title'] = $title;
            $blogs[$blog_index]['slug'] = $slug;
            $blogs[$blog_index]['category'] = $category;
            $blogs[$blog_index]['excerpt'] = $excerpt;
            $blogs[$blog_index]['content'] = $content;
            $blogs[$blog_index]['image'] = $image_filename;
            $blogs[$blog_index]['status'] = $status;
            $blogs[$blog_index]['updated_at'] = date('Y-m-d H:i:s');
            
            if (file_put_contents($json_path, json_encode($blogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))) {
                header('Location: dashboard.php?success=' . urlencode('Blog post updated successfully!'));
                exit;
            } else {
                $error = 'Failed to write data to database file.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog | Generation Marketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!-- TinyMCE Rich Text Editor -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 400,
            skin: 'oxide',
            content_css: 'default'
        });
    </script>
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
                    <h2>Edit Blog Post</h2>
                    <p class="text-muted mb-0">Modify the contents of your existing article</p>
                </div>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2 py-3 mb-4" role="alert" style="border-radius: 12px;">
                    <i class="fas fa-exclamation-circle fs-5"></i>
                    <div style="font-weight: 500;"><?php echo htmlspecialchars($error); ?></div>
                </div>
            <?php endif; ?>

            <!-- Form Card -->
            <div class="content-card">
                <form action="edit-blog.php?id=<?php echo $blog['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title" class="form-label">Blog Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="e.g. 5 Reasons Your Business Needs Google Ads in 2026" required value="<?php echo htmlspecialchars($blog['title']); ?>">
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="" disabled>Select Category</option>
                                    <option value="Google Ads" <?php echo ($blog['category'] === 'Google Ads') ? 'selected' : ''; ?>>Google Ads</option>
                                    <option value="SEO" <?php echo ($blog['category'] === 'SEO') ? 'selected' : ''; ?>>SEO</option>
                                    <option value="Meta Ads" <?php echo ($blog['category'] === 'Meta Ads') ? 'selected' : ''; ?>>Meta Ads</option>
                                    <option value="Social Media" <?php echo ($blog['category'] === 'Social Media') ? 'selected' : ''; ?>>Social Media</option>
                                    <option value="Branding" <?php echo ($blog['category'] === 'Branding') ? 'selected' : ''; ?>>Branding</option>
                                    <option value="E-Commerce" <?php echo ($blog['category'] === 'E-Commerce') ? 'selected' : ''; ?>>E-Commerce</option>
                                    <option value="Web & E-Com" <?php echo ($blog['category'] === 'Web & E-Com') ? 'selected' : ''; ?>>Web & E-Com</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <div class="form-group">
                        <label for="excerpt" class="form-label">Short Excerpt</label>
                        <textarea class="form-control" id="excerpt" name="excerpt" rows="2" placeholder="Write a brief, catchy summary of the article..." required><?php echo htmlspecialchars($blog['excerpt']); ?></textarea>
                    </div>

                    <!-- Content -->
                    <div class="form-group">
                        <label for="content" class="form-label">Full Article Content</label>
                        <textarea id="content" name="content"><?php echo htmlspecialchars($blog['content']); ?></textarea>
                    </div>

                    <div class="row align-items-center mt-4">
                        <!-- Current Featured Image & Upload -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label d-block">Current Featured Image</label>
                                <?php 
                                $image_src = htmlspecialchars($blog['image']);
                                if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
                                    $image_src = '../uploads/blogs/' . htmlspecialchars($blog['image']);
                                }
                                ?>
                                <img src="<?php echo $image_src; ?>" alt="Preview" class="image-preview mb-3">
                                
                                <label for="image" class="form-label">Replace Image (Optional)</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <small class="text-muted mt-1 d-block">Leave empty to keep current image. Recommended size: 800x500px.</small>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status" class="form-label">Publish Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="published" <?php echo (isset($blog['status']) && $blog['status'] === 'published') ? 'selected' : ''; ?>>Published (Visible on site)</option>
                                    <option value="draft" <?php echo (isset($blog['status']) && $blog['status'] === 'draft') ? 'selected' : ''; ?>>Draft (Hidden, save for later)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3 mt-4 border-top pt-4">
                        <button type="submit" class="btn-admin-submit">
                            <i class="fas fa-save me-2"></i> Save Changes
                        </button>
                        <a href="dashboard.php" class="btn-admin-cancel">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
