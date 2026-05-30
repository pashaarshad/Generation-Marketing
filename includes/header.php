<?php
/**
 * Global Header Include for Generation Marketing
 */
$current_page = basename($_SERVER['SCRIPT_NAME']);

if (!isset($page_title)) {
    $page_title = "Generation Marketing | Grow. Scale. Succeed.";
}
if (!isset($page_desc)) {
    $page_desc = "Generation Marketing - Premium Digital Marketing Agency. Google Ads, SEO, Social Media, Branding & Web Development services to grow your business.";
}
if (!isset($page_keywords)) {
    $page_keywords = "digital marketing agency, premium SEO services, google ads expert, meta ads agency, social media marketing, web development packages, grow business online, best marketing company India, local SEO Jaipur";
}

// Generate high-level Dynamic Canonical URL
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$clean_uri = strtok($uri, '?'); // Strip sorting/search queries for clean index authority

$query_parts = [];
if (isset($_GET['id'])) {
    $query_parts['id'] = $_GET['id'];
} elseif (isset($_GET['slug'])) {
    $query_parts['slug'] = $_GET['slug'];
}

$canonical_url = $protocol . "://" . $host . $clean_uri;
if (!empty($query_parts)) {
    $canonical_url .= "?" . http_build_query($query_parts);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    
    <!-- Title and Description Tags (SEO Keyword Optimized) -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_desc); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    
    <!-- Dynamic Canonical Link (Prevents Duplicate Content Indexing) -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">
    
    <!-- Speed Optimization: Preconnect to Font Servers (Core Web Vitals) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Open Graph tags for Rich Social Sharing (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:site_name" content="Generation Marketing">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_desc); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta property="og:image" content="<?php echo $protocol . "://" . $host; ?>/assets/logo.png">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_desc); ?>">
    <meta name="twitter:image" content="<?php echo $protocol . "://" . $host; ?>/assets/logo.png">
    
    <!-- Advanced SEO & Trust Signals -->
    <meta name="author" content="Generation Marketing">
    <meta name="publisher" content="Generation Marketing">
    <meta name="geo.region" content="IN-RJ">
    <meta name="geo.placename" content="Jaipur, Rajasthan, India">
    <meta name="ICBM" content="26.9124, 75.7873">
    <meta name="theme-color" content="#1a73e8">
    <meta name="msapplication-TileColor" content="#1a73e8">
    <meta name="apple-mobile-web-app-title" content="Generation Marketing">
    <meta name="application-name" content="Generation Marketing">
    <meta name="format-detection" content="telephone=yes">
    <link rel="alternate" hreflang="en" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($canonical_url); ?>">
    
    <!-- Speed: DNS Prefetch & Preconnect for CDN Performance (Core Web Vitals) -->
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    
    <!-- External Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    
    <!-- Structured Data JSON-LD Schema Markup -->
    <?php include_once __DIR__ . '/schema-markup.php'; ?>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom scrolled" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="assets/logo.png" alt="Generation Marketing"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page === 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page === 'about.php') ? 'active' : ''; ?>" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page === 'services.php') ? 'active' : ''; ?>" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page === 'pricing.php') ? 'active' : ''; ?>" href="pricing.php">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page === 'blog.php' || $current_page === 'blog-detail.php') ? 'active' : ''; ?>" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page === 'contact.php') ? 'active' : ''; ?>" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link nav-cta" href="contact.php"><i class="fas fa-rocket"></i> Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
