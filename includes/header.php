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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title and Description Tags (SEO Keyword Optimized) -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_desc); ?>">
    
    <!-- Open Graph tags for Social Media -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_desc); ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/logo.png">
    
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
