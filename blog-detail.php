<?php
/**
 * Dynamic Blog Details Page - Generation Marketing
 */
// Load blogs from JSON
$json_path = __DIR__ . '/data/blogs.json';
$blog = null;
$latest_blogs = [];

if (file_exists($json_path)) {
    $blogs_data = file_get_contents($json_path);
    $blogs = json_decode($blogs_data, true);
    if (is_array($blogs)) {
        // Find by slug
        if (isset($_GET['slug'])) {
            $slug = trim($_GET['slug']);
            foreach ($blogs as $b) {
                if ($b['slug'] === $slug && isset($b['status']) && $b['status'] === 'published') {
                    $blog = $b;
                    break;
                }
            }
        }
        
        // Filter and get latest blogs for sidebar
        $published = array_filter($blogs, function($item) use ($blog) {
            return isset($item['status']) && $item['status'] === 'published' && ($blog === null || $item['id'] !== $blog['id']);
        });
        
        usort($published, function($x, $y) {
            return strtotime($y['created_at']) - strtotime($x['created_at']);
        });
        
        $latest_blogs = array_slice($published, 0, 3);
    }
}

$page_title = $blog ? htmlspecialchars($blog['title']) . " | Generation Marketing" : "Blog Not Found | Generation Marketing";
$page_desc = $blog ? htmlspecialchars($blog['excerpt']) : "Blog post not found on Generation Marketing.";

include_once __DIR__ . '/includes/header.php';
?>

<style>
    .blog-header {
        padding: 140px 0 60px;
        background: linear-gradient(135deg, #0b1a30 0%, #030812 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }
    .blog-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 30%;
        background: linear-gradient(to top, rgba(255,255,255,1), rgba(255,255,255,0));
        z-index: 1;
    }
    .blog-header .container {
        position: relative;
        z-index: 2;
    }
    .blog-meta-badge {
        background: var(--blue);
        color: white;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .blog-title-text {
        font-size: 2.8rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
        font-family: 'Poppins', sans-serif;
        color: white;
    }
    .blog-author-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 0.95rem;
        color: rgba(255,255,255,0.7);
    }
    .blog-author-meta i {
        color: var(--yellow);
    }
    .blog-content-section {
        padding: 60px 0 100px;
        background: white;
    }
    .blog-main-img {
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        width: 100%;
        max-height: 480px;
        object-fit: cover;
        margin-bottom: 40px;
    }
    .blog-body-text {
        color: #2c3e50;
        font-size: 1.15rem;
        line-height: 1.8;
    }
    .blog-body-text h2 {
        color: var(--navy);
        font-weight: 700;
        margin-top: 40px;
        margin-bottom: 20px;
        font-size: 1.8rem;
    }
    .blog-body-text h3 {
        color: var(--navy);
        font-weight: 600;
        margin-top: 30px;
        margin-bottom: 15px;
        font-size: 1.4rem;
    }
    .blog-body-text p {
        margin-bottom: 25px;
    }
    .blog-body-text ul, .blog-body-text ol {
        margin-bottom: 25px;
        padding-left: 20px;
    }
    .blog-body-text li {
        margin-bottom: 10px;
    }
    .sidebar-card {
        border: 1px solid rgba(0,0,0,0.08);
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 30px;
        background: #fafafa;
    }
    .sidebar-title {
        color: var(--navy);
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 20px;
        border-bottom: 2px solid var(--primary);
        padding-bottom: 10px;
        display: inline-block;
    }
    .recent-post-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        align-items: center;
    }
    .recent-post-item:last-child {
        margin-bottom: 0;
    }
    .recent-post-img {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        object-fit: cover;
        flex-shrink: 0;
    }
    .recent-post-info h6 {
        margin: 0 0 5px;
        font-weight: 600;
        line-height: 1.3;
        font-size: 0.95rem;
    }
    .recent-post-info h6 a {
        color: var(--navy);
        text-decoration: none;
        transition: color 0.2s;
    }
    .recent-post-info h6 a:hover {
        color: var(--primary);
    }
    .recent-post-date {
        font-size: 0.8rem;
        color: var(--gray);
    }
</style>

<?php if ($blog): ?>
    <!-- Header -->
    <header class="blog-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="blog-meta-badge"><?php echo htmlspecialchars($blog['category']); ?></span>
                    <h1 class="blog-title-text"><?php echo htmlspecialchars($blog['title']); ?></h1>
                    <div class="blog-author-meta">
                        <span><i class="fas fa-user-circle me-1"></i> By <?php echo htmlspecialchars($blog['author']); ?></span>
                        <span><i class="far fa-calendar-alt me-1"></i> <?php echo date('F d, Y', strtotime($blog['created_at'])); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <section class="blog-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php 
                    $image_src = htmlspecialchars($blog['image']);
                    if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
                        $image_src = 'uploads/blogs/' . htmlspecialchars($blog['image']);
                    }
                    ?>
                    <img class="blog-main-img" src="<?php echo $image_src; ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                    
                    <div class="blog-body-text">
                        <?php 
                        // Render content directly (it will contain formatting from TinyMCE)
                        echo $blog['content']; 
                        ?>
                    </div>
                    
                    <div class="mt-5 pt-4 border-top">
                        <a href="contact.php" class="btn-glow text-white text-decoration-none px-5 py-3 rounded-pill d-inline-block">
                            <i class="fas fa-rocket me-2"></i> Grow Your Business With Us
                        </a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 ps-lg-4 mt-5 mt-lg-0">
                    <div class="sidebar-card">
                        <span class="sidebar-title">Recent Posts</span>
                        <?php if (empty($latest_blogs)): ?>
                            <p style="color: var(--gray); font-size: 0.95rem;">No other posts available.</p>
                        <?php else: ?>
                            <?php foreach ($latest_blogs as $item): ?>
                                <?php 
                                $item_img = htmlspecialchars($item['image']);
                                if (!empty($item['image']) && !preg_match('/^https?:\/\//', $item['image'])) {
                                    $item_img = 'uploads/blogs/' . htmlspecialchars($item['image']);
                                }
                                ?>
                                <div class="recent-post-item">
                                    <img class="recent-post-img" src="<?php echo $item_img; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                                    <div class="recent-post-info">
                                        <h6><a href="blog-detail.php?slug=<?php echo urlencode($item['slug']); ?>"><?php echo htmlspecialchars($item['title']); ?></a></h6>
                                        <div class="recent-post-date"><?php echo date('M d, Y', strtotime($item['created_at'])); ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="sidebar-card text-center" style="background: linear-gradient(135deg, var(--navy) 0%, #030812 100%); color: white; border: none;">
                        <h4 class="mb-3" style="color: white; font-weight: 700;">Need Premium Marketing?</h4>
                        <p style="color: rgba(255,255,255,0.7); font-size: 0.95rem; line-height: 1.6;">Let's build Google Ads, SEO, and Social Media campaigns that drive leads and sales.</p>
                        <a href="contact.php" class="btn btn-light rounded-pill px-4 py-2 mt-2 fw-bold" style="color: var(--navy);">Get Free Audit</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="section-padding text-center" style="padding: 180px 0 120px;">
        <div class="container">
            <i class="fas fa-exclamation-triangle fs-1 text-warning mb-4"></i>
            <h2>Blog Post Not Found</h2>
            <p class="lead text-muted mb-5">The blog post you are looking for might have been deleted, draft, or the link is invalid.</p>
            <a href="blog.php" class="btn-glow text-white text-decoration-none px-5 py-3 rounded-pill d-inline-block">
                <i class="fas fa-arrow-left me-2"></i> Go to Blog Listing
            </a>
        </div>
    </section>
<?php endif; ?>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
