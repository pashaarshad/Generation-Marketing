<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$json_path = dirname(__DIR__) . '/data/blogs.json';

if (!file_exists($json_path)) {
    echo json_encode([]);
    exit;
}

$blogs_data = file_get_contents($json_path);
$blogs = json_decode($blogs_data, true);

if (!is_array($blogs)) {
    echo json_encode([]);
    exit;
}

// Filter published blogs for API/Public consumption
$published_blogs = array_filter($blogs, function($blog) {
    return isset($blog['status']) && $blog['status'] === 'published';
});

// Reset keys
$published_blogs = array_values($published_blogs);

// Sort by date descending
usort($published_blogs, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

// If single blog requested by slug
if (isset($_GET['slug'])) {
    $slug = trim($_GET['slug']);
    foreach ($published_blogs as $blog) {
        if ($blog['slug'] === $slug) {
            echo json_encode($blog);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(['error' => 'Blog not found']);
    exit;
}

echo json_encode($published_blogs);
?>
