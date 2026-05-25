<?php
require_once dirname(__DIR__) . '/config/auth.php';
require_login();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $json_path = dirname(__DIR__) . '/data/blogs.json';
    
    if (file_exists($json_path)) {
        $blogs_data = file_get_contents($json_path);
        $blogs = json_decode($blogs_data, true);
        
        if (is_array($blogs)) {
            $found_index = -1;
            
            foreach ($blogs as $index => $blog) {
                if (isset($blog['id']) && $blog['id'] === $id) {
                    $found_index = $index;
                    break;
                }
            }
            
            if ($found_index !== -1) {
                $blog = $blogs[$found_index];
                
                // Delete image if it is local
                if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
                    $image_path = dirname(__DIR__) . '/uploads/blogs/' . $blog['image'];
                    if (file_exists($image_path)) {
                        @unlink($image_path);
                    }
                }
                
                // Remove from array
                array_splice($blogs, $found_index, 1);
                
                // Save updated list
                if (file_put_contents($json_path, json_encode($blogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))) {
                    header('Location: dashboard.php?success=' . urlencode('Blog post deleted successfully!'));
                    exit;
                }
            }
        }
    }
}

header('Location: dashboard.php?error=' . urlencode('Failed to delete blog post or post not found.'));
exit;
?>
