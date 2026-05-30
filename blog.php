<?php
/**
 * Dedicated Blog Listing Page - Generation Marketing
 */
$page_title = "Agency Blog | Generation Marketing - Digital Tips & Insights";
$page_desc = "Get expert insights, tips, and guidelines on SEO, Google Ads, Meta Ads, social media growth, and conversion rate optimizations from Generation Marketing.";
$page_keywords = "digital marketing tips, latest SEO strategies, paid advertising guide, increase website traffic organically, how to run Google ads, social media algorithms growth, conversion rate optimization tips, marketing insights, niche competitor analysis, search engine optimization guides, B2B lead generation tactics";


// Load blogs from JSON
$json_path = __DIR__ . '/data/blogs.json';
$blogs = [];
if (file_exists($json_path)) {
    $blogs_data = file_get_contents($json_path);
    $blogs = json_decode($blogs_data, true);
    if (!is_array($blogs)) {
        $blogs = [];
    }
}

// Filter published blogs
$published_blogs = array_filter($blogs, function($blog) {
    return isset($blog['status']) && $blog['status'] === 'published';
});

// Get all unique categories for the filter bar
$all_categories = array_unique(array_column($published_blogs, 'category'));

// Apply Category Filter if present in URL
$selected_category = isset($_GET['category']) ? trim($_GET['category']) : '';
if (!empty($selected_category)) {
    $published_blogs = array_filter($published_blogs, function($blog) use ($selected_category) {
        return strcasecmp($blog['category'], $selected_category) === 0;
    });
}

// Apply Keyword Search if present in URL
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
if (!empty($search_query)) {
    $published_blogs = array_filter($published_blogs, function($blog) use ($search_query) {
        return stripos($blog['title'], $search_query) !== false || 
               stripos($blog['excerpt'], $search_query) !== false ||
               stripos($blog['content'], $search_query) !== false;
    });
}

// Sort by date descending
usort($published_blogs, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

include_once __DIR__ . '/includes/header.php';
?>

<!-- BLOG HERO -->
<section class="details-section bg-dark text-white text-center d-flex align-items-center justify-content-center" style="padding: 140px 0 80px; background: linear-gradient(135deg, #0b1120 0%, #111827 100%) !important; position: relative; overflow: hidden;">
    <div class="hero-bg-icons" style="opacity: 0.15;">
        <i class="fas fa-newspaper icon-float" style="top: 15%; left: 10%; font-size: 3rem;"></i>
        <i class="fas fa-feather icon-float" style="bottom: 20%; right: 15%; font-size: 2.5rem;"></i>
        <i class="fas fa-magnifying-glass icon-float" style="top: 50%; left: 80%; font-size: 3rem;"></i>
    </div>
    <div class="container reveal">
        <h1 class="display-4 fw-extrabold mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 800; background: linear-gradient(to right, #ffffff, #93c5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">The Growth Blog</h1>
        <p class="lead max-w-2xl mx-auto mb-4" style="color: rgba(255,255,255,0.8); font-size: 1.25rem;">
            Insights, strategies, and industry secrets from our marketing specialists to help you dominate online.
        </p>
        
        <!-- Search bar container -->
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <form action="blog.php" method="GET" class="d-flex gap-2 p-2 bg-white rounded-pill shadow-sm" style="border: 1px solid rgba(255,255,255,0.1);">
                    <?php if (!empty($selected_category)): ?>
                        <input type="hidden" name="category" value="<?php echo htmlspecialchars($selected_category); ?>">
                    <?php endif; ?>
                    <input type="text" name="search" class="form-control border-0 px-4 py-2 rounded-pill bg-transparent text-dark" placeholder="Search articles..." value="<?php echo htmlspecialchars($search_query); ?>" style="outline: none; box-shadow: none;">
                    <button type="submit" class="btn btn-primary rounded-pill px-4" style="background-color: var(--primary); border: none;">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- MAIN BLOG ARTICLES GRID -->
<section class="section-padding section-light" id="blog-listing">
    <div class="container">
        
        <!-- Category Filter Pills -->
        <div class="row mb-5 mt-2 align-items-center">
            <div class="col-12 text-center">
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    <a href="blog.php<?php echo !empty($search_query) ? '?search='.urlencode($search_query) : ''; ?>" class="btn btn-sm rounded-pill px-3 py-2 fw-semibold <?php echo empty($selected_category) ? 'btn-primary bg-primary border-0' : 'btn-outline-secondary bg-white text-dark'; ?>">
                        All Topics
                    </a>
                    <?php foreach ($all_categories as $cat): ?>
                        <?php 
                        $query_params = [];
                        $query_params['category'] = $cat;
                        if (!empty($search_query)) {
                            $query_params['search'] = $search_query;
                        }
                        $url = 'blog.php?' . http_build_query($query_params);
                        $is_active = (strcasecmp($selected_category, $cat) === 0);
                        ?>
                        <a href="<?php echo htmlspecialchars($url); ?>" class="btn btn-sm rounded-pill px-3 py-2 fw-semibold <?php echo $is_active ? 'btn-primary bg-primary border-0' : 'btn-outline-secondary bg-white text-dark'; ?>">
                            <?php echo htmlspecialchars($cat); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Search Status Alert -->
        <?php if (!empty($search_query) || !empty($selected_category)): ?>
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center bg-white p-3 rounded-4 border shadow-sm">
                    <span class="text-muted">
                        Showing results for 
                        <?php if (!empty($selected_category)): ?><strong>Category: "<?php echo htmlspecialchars($selected_category); ?>"</strong><?php endif; ?>
                        <?php if (!empty($search_query) && !empty($selected_category)): ?> and <?php endif; ?>
                        <?php if (!empty($search_query)): ?><strong>Search: "<?php echo htmlspecialchars($search_query); ?>"</strong><?php endif; ?>
                        (<?php echo count($published_blogs); ?> posts found)
                    </span>
                    <a href="blog.php" class="btn btn-sm btn-outline-danger rounded-pill px-3"><i class="fas fa-times me-1"></i> Clear filters</a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Blog Cards Grid -->
        <div class="row g-4">
            <?php if (empty($published_blogs)): ?>
                <div class="col-12 text-center py-5 reveal">
                    <div class="mb-3 text-muted fs-1"><i class="fas fa-folder-open"></i></div>
                    <h4 class="fw-bold" style="color: var(--navy);">No matching posts found</h4>
                    <p class="text-muted">Try clearing your filters or testing other search keywords.</p>
                    <a href="blog.php" class="btn btn-primary rounded-pill px-4 mt-3" style="background-color: var(--primary); border: none;">View All Posts</a>
                </div>
            <?php else: ?>
                <?php foreach ($published_blogs as $blog): ?>
                    <?php 
                    $image_src = htmlspecialchars($blog['image']);
                    if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
                        $image_src = 'uploads/blogs/' . htmlspecialchars($blog['image']);
                    }
                    ?>
                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="blog-card bg-white rounded-4 border shadow-sm overflow-hidden h-100 d-flex flex-column transition-all hover-translate-y">
                            <div class="blog-img position-relative" style="height: 220px; overflow: hidden;">
                                <img src="<?php echo $image_src; ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="w-100 h-100 object-fit-cover">
                                <span class="position-absolute top-3 start-3 badge bg-primary rounded-pill px-3 py-2 fw-semibold" style="top: 15px; left: 15px; background-color: var(--primary) !important;"><?php echo htmlspecialchars($blog['category']); ?></span>
                            </div>
                            <div class="blog-body p-4 d-flex flex-column flex-grow-1">
                                <span class="text-muted d-block mb-2" style="font-size: 0.85rem;"><i class="far fa-calendar me-1"></i> <?php echo date('d M Y', strtotime($blog['created_at'])); ?></span>
                                <h5 class="fw-bold mb-3" style="color: var(--navy); line-height: 1.4;"><?php echo htmlspecialchars($blog['title']); ?></h5>
                                <p class="text-muted flex-grow-1" style="font-size: 0.95rem; line-height: 1.6;"><?php echo htmlspecialchars($blog['excerpt']); ?></p>
                                <hr class="my-3" style="opacity: 0.08;">
                                <a href="blog-detail.php?slug=<?php echo urlencode($blog['slug']); ?>" class="read-more mt-auto fw-bold text-decoration-none d-flex align-items-center gap-1" style="color: var(--primary);">
                                    Read Full Post <i class="fas fa-arrow-right fs-6"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
