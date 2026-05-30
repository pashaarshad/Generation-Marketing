<?php
/**
 * Dynamic SEO Optimized Homepage - Generation Marketing
 */
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

// Sort by date descending
usort($published_blogs, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

// Limit to latest 3 blogs for homepage showcase
$latest_blogs = array_slice($published_blogs, 0, 3);

$page_title = "Generation Marketing | Grow. Scale. Succeed.";
$page_desc = "Premium digital marketing agency helping brands scale with targeted Google Ads, results-driven SEO, creative social campaigns, and custom web development.";

include_once __DIR__ . '/includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero" id="home">
    <div class="hero-bg-icons">
        <i class="fas fa-arrow-trend-up icon-float" style="top: 10%; left: 5%;"></i>
        <i class="fas fa-lightbulb icon-float" style="top: 80%; left: 15%;"></i>
        <i class="fas fa-bullseye icon-float" style="top: 15%; right: 40%;"></i>
        <i class="fas fa-rocket icon-float" style="bottom: 10%; right: 5%;"></i>
        <i class="fas fa-chart-pie icon-float" style="top: 50%; left: 2%;"></i>
    </div>
    <div class="glowing-divider"></div>

    <div class="container" style="position: relative; z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">
                <div class="hero-badge"><i class="fas fa-tag"></i> Premium Digital Marketing Agency</div>
                <h1>More <span style="color: var(--blue);">Growth</span>.<br>More Leads. More<br><span id="typewriter" style="border-right: 2px solid var(--blue);">Visibility</span></h1>
                <p>We help businesses grow with data-driven Google Ads, SEO, Social Media Marketing, and Premium Branding solutions. Results you can measure.</p>
                <div class="hero-btns">
                    <a href="services.php" class="btn-glow"><i class="fas fa-arrow-right"></i> Explore Services</a>
                    <a href="contact.php" class="btn-outline-hero"><i class="fas fa-phone"></i> Talk to Us</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="stat-number"><span class="counter" data-target="50" data-suffix="+">0</span></div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                    <div class="hero-stat">
                        <div class="stat-number"><span class="counter" data-target="200" data-suffix="+">0</span></div>
                        <div class="stat-label">Campaigns Run</div>
                    </div>
                    <div class="hero-stat">
                        <div class="stat-number"><span class="counter" data-target="95" data-suffix="%">0</span></div>
                        <div class="stat-label">Client Retention</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-image d-none d-lg-block text-center position-relative">
                <div class="hero-shape-right"></div>
                <img src="assets/hero-graph.png" alt="Digital Marketing Agency India" style="max-height:520px; border-radius:20px; position:relative; z-index:2; filter: drop-shadow(0 15px 30px rgba(0,0,0,0.3));">
            </div>
        </div>
    </div>
</section>

<!-- ABOUT BRIEF TEASER -->
<section class="section-padding" id="about">
    <div class="container">
        <div class="section-header text-center reveal">
            <h2>About <span style="color:var(--primary)">Generation Marketing</span></h2>
            <p class="subtitle">We are a result-driven digital marketing agency helping businesses grow online with proven strategies and creative solutions.</p>
            <div class="accent-line mx-auto"></div>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-3 reveal">
                <div class="about-card p-4 bg-white rounded-4 shadow-sm border border-light text-center h-100 transition-all hover-translate-y">
                    <div class="icon-box icon-blue mx-auto mb-3"><i class="fa-solid fa-crosshairs"></i></div>
                    <h5 class="fw-bold mb-2">Targeted Strategy</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">Data-driven campaigns tailored to your business goals for maximum ROI and growth.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal">
                <div class="about-card p-4 bg-white rounded-4 shadow-sm border border-light text-center h-100 transition-all hover-translate-y">
                    <div class="icon-box icon-red mx-auto mb-3"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    <h5 class="fw-bold mb-2">Proven Results</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">Track record of delivering measurable results — higher rankings, more traffic, better conversions.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal">
                <div class="about-card p-4 bg-white rounded-4 shadow-sm border border-light text-center h-100 transition-all hover-translate-y">
                    <div class="icon-box icon-yellow mx-auto mb-3"><i class="fa-regular fa-lightbulb"></i></div>
                    <h5 class="fw-bold mb-2">Creative Excellence</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">Stunning designs, compelling content, and innovative marketing that makes your brand stand out.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal">
                <div class="about-card p-4 bg-white rounded-4 shadow-sm border border-light text-center h-100 transition-all hover-translate-y">
                    <div class="icon-box icon-green mx-auto mb-3"><i class="fa-solid fa-handshake-angle"></i></div>
                    <h5 class="fw-bold mb-2">Dedicated Support</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">A dedicated team committed to your success with weekly reports and transparent communication.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 reveal">
            <a href="about.php" class="btn btn-outline-primary rounded-pill px-5 py-3 fw-bold">
                Learn More About Us <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- SERVICES SHOWCASE TEASER -->
<section class="section-padding section-light" id="services">
    <div class="container">
        <div class="section-header text-center reveal">
            <h2>Our Core <span style="color:var(--primary)">Services</span></h2>
            <p class="subtitle">Comprehensive digital marketing solutions engineered to help your business grow, scale, and succeed online.</p>
            <div class="accent-line mx-auto"></div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- Google Ads Card -->
            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card bg-white rounded-4 shadow-sm border overflow-hidden h-100 transition-all hover-translate-y">
                    <span class="card-badge">⭐ Main Service</span>
                    <div class="card-img-wrapper"><img src="Services-posters/google-ads-package.jpeg" alt="Google Ads Agency India" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Google Ads Package</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹15,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4 text-muted" style="font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>3-5 Campaigns (Search + Display)</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Conversion Tracking & Remarketing</li>
                        </ul>
                        <a href="service-details.php?id=google-ads-package" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold">See All Details</a>
                    </div>
                </div>
            </div>

            <!-- Meta Ads Card -->
            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card bg-white rounded-4 shadow-sm border overflow-hidden h-100 transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/meta-ad-package.jpeg" alt="Meta Ads Agency India" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Meta Ad Package</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹15,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4 text-muted" style="font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>4-6 Lead / Sales Campaigns</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>A/B Testing & Retargeting</li>
                        </ul>
                        <a href="service-details.php?id=meta-ad-package" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold">See All Details</a>
                    </div>
                </div>
            </div>

            <!-- SEO Growth Card -->
            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card bg-white rounded-4 shadow-sm border overflow-hidden h-100 transition-all hover-translate-y">
                    <span class="card-badge" style="background:var(--green)">★ Recommended</span>
                    <div class="card-img-wrapper"><img src="Services-posters/growth-seo-plan.jpeg" alt="SEO Growth Services India" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Growth SEO Plan</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹15,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4 text-muted" style="font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>20-30 Target Keywords + On-Page</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>10-15 Quality Backlinks/month</li>
                        </ul>
                        <a href="service-details.php?id=growth-seo-plan" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold">See All Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 reveal">
            <a href="services.php" class="btn btn-primary rounded-pill px-5 py-3 fw-bold" style="background-color: var(--primary); border: none;">
                View All Services & Packages <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- PRICING TEASER -->
<section class="section-padding bg-white" id="pricing-teaser">
    <div class="container text-center reveal">
        <div class="section-header text-center reveal">
            <h2>Pricing & <span style="color:var(--primary)">Packages</span></h2>
            <p class="subtitle">Transparent pricing with no hidden charges. Choose the plan that fits your business needs.</p>
            <div class="accent-line mx-auto"></div>
        </div>
        <p class="lead text-muted max-w-2xl mx-auto mb-4" style="font-size: 1.1rem;">No hidden setup fees. No lock-in contracts. Pay only for results.</p>
        <div class="row justify-content-center g-4 mb-5">
            <div class="col-md-4">
                <div class="bg-light p-4 rounded-4 shadow-sm border-0 transition-all hover-translate-y">
                    <h5 class="fw-bold" style="color: var(--navy);">SEO Plans</h5>
                    <p class="text-muted mb-2">Starting from</p>
                    <h3 class="fw-extrabold text-primary mb-3">₹8,000<span style="font-size: 0.9rem; font-weight: normal; color: var(--gray);">/month</span></h3>
                    <a href="pricing.php" class="btn btn-sm btn-outline-primary rounded-pill px-4 py-2 fw-bold">View SEO Packages</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-light p-4 rounded-4 shadow-sm border-0 transition-all hover-translate-y">
                    <h5 class="fw-bold" style="color: var(--navy);">Social Media</h5>
                    <p class="text-muted mb-2">Starting from</p>
                    <h3 class="fw-extrabold text-primary mb-3">₹7,999<span style="font-size: 0.9rem; font-weight: normal; color: var(--gray);">/month</span></h3>
                    <a href="pricing.php" class="btn btn-sm btn-outline-primary rounded-pill px-4 py-2 fw-bold">View SMM Packages</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-light p-4 rounded-4 shadow-sm border-0 transition-all hover-translate-y">
                    <h5 class="fw-bold" style="color: var(--navy);">Paid Ads</h5>
                    <p class="text-muted mb-2">Starting from</p>
                    <h3 class="fw-extrabold text-primary mb-3">₹15,000<span style="font-size: 0.9rem; font-weight: normal; color: var(--gray);">/month</span></h3>
                    <a href="pricing.php" class="btn btn-sm btn-outline-primary rounded-pill px-4 py-2 fw-bold">View Campaign Packages</a>
                </div>
            </div>
        </div>
        <a href="pricing.php" class="btn btn-primary rounded-pill px-5 py-3 fw-bold" style="background-color: var(--primary); border: none;">
            Compare All Packages <i class="fas fa-chevron-right ms-2"></i>
        </a>
    </div>
</section>

<!-- LATEST BLOG SHOWCASE -->
<section class="section-padding section-light" id="blog">
    <div class="container">
        <div class="section-header text-center reveal">
            <h2>Latest from Our <span style="color:var(--primary)">Blog</span></h2>
            <p class="subtitle">Tips, insights, and strategies to help you stay ahead in the digital marketing game.</p>
            <div class="accent-line mx-auto"></div>
        </div>
        <div class="row g-4">
            <?php if (empty($latest_blogs)): ?>
                <div class="col-12 text-center reveal">
                    <p class="lead" style="color: var(--gray);">No blog posts found. Check back later!</p>
                </div>
            <?php else: ?>
                <?php foreach ($latest_blogs as $blog): ?>
                    <?php 
                    $image_src = htmlspecialchars($blog['image']);
                    if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
                        $image_src = 'uploads/blogs/' . htmlspecialchars($blog['image']);
                    }
                    ?>
                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="blog-card bg-white rounded-4 border shadow-sm overflow-hidden h-100 d-flex flex-column transition-all hover-translate-y">
                            <div class="blog-img" style="height: 220px; overflow: hidden;"><img src="<?php echo $image_src; ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="w-100 h-100 object-fit-cover"></div>
                            <div class="blog-body p-4 d-flex flex-column flex-grow-1">
                                <span class="blog-tag mb-2 d-inline-block"><?php echo htmlspecialchars($blog['category']); ?></span>
                                <h5 class="fw-bold mb-3" style="color: var(--navy);"><?php echo htmlspecialchars($blog['title']); ?></h5>
                                <p class="text-muted flex-grow-1" style="font-size: 0.95rem;"><?php echo htmlspecialchars($blog['excerpt']); ?></p>
                                <a href="blog-detail.php?slug=<?php echo urlencode($blog['slug']); ?>" class="read-more mt-auto fw-bold text-decoration-none" style="color: var(--primary);">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="text-center mt-5 reveal">
            <a href="blog.php" class="btn btn-outline-primary rounded-pill px-5 py-3 fw-bold">
                Read All Articles <i class="fas fa-newspaper ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- CLIENTS & TRUST SECTION -->
<section class="section-padding bg-white" id="clients">
    <div class="container">
        <div class="section-header text-center reveal">
            <h2>Our <span style="color:var(--primary)">Clients</span></h2>
            <p class="subtitle">Trusted by 50+ businesses across India. Here's what our clients say about us.</p>
            <div class="accent-line mx-auto"></div>
        </div>
        <div class="row g-4 mb-5 justify-content-center">
            <div class="col-6 col-md-4 col-lg-2 reveal">
                <div class="client-logo"><span>TechNova</span></div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 reveal">
                <div class="client-logo"><span>FreshMart</span></div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 reveal">
                <div class="client-logo"><span>StyleHub</span></div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 reveal">
                <div class="client-logo"><span>BuildCraft</span></div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 reveal">
                <div class="client-logo"><span>EduPrime</span></div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 reveal">
                <div class="client-logo"><span>GreenLeaf</span></div>
            </div>
        </div>
        
        <!-- Testimonials Carousel -->
        <div id="testimonialCarousel" class="carousel slide reveal" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="testimonial-card p-4 bg-light rounded-4 shadow-sm border border-light">
                                <div class="stars mb-3 text-warning"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                <p class="lead mb-4" style="color: var(--navy); font-style: italic; font-size: 1.15rem;">"Generation Marketing transformed our online presence completely. Our Google Ads campaigns are delivering 3x ROI and our leads have increased by 200%. Highly recommended!"</p>
                                <div class="client-info d-flex justify-content-center align-items-center gap-3">
                                    <div class="client-avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">R</div>
                                    <div class="text-start">
                                        <div class="client-name fw-bold" style="color: var(--navy);">Rajesh Kumar</div>
                                        <div class="client-role text-muted" style="font-size: 0.85rem;">CEO, TechNova Solutions</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="testimonial-card p-4 bg-light rounded-4 shadow-sm border border-light">
                                <div class="stars mb-3 text-warning"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                <p class="lead mb-4" style="color: var(--navy); font-style: italic; font-size: 1.15rem;">"The SEO Growth Plan has been a game-changer for our business. We went from page 5 to page 1 on Google within 3 months. Their team is professional and results-driven."</p>
                                <div class="client-info d-flex justify-content-center align-items-center gap-3">
                                    <div class="client-avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">P</div>
                                    <div class="text-start">
                                        <div class="client-name fw-bold" style="color: var(--navy);">Priya Sharma</div>
                                        <div class="client-role text-muted" style="font-size: 0.85rem;">Founder, StyleHub Fashion</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span></button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next"><span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span></button>
        </div>
    </div>
</section>

<!-- GENERAL TERMS AGREEMENT ACCORDION -->
<section class="section-padding bg-light" id="terms">
    <div class="container">
        <div class="section-header text-center reveal">
            <h2>Terms & <span style="color:var(--primary)">Conditions</span></h2>
            <p class="subtitle">Please read our terms of service and privacy policy carefully.</p>
            <div class="accent-line mx-auto"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 reveal">
                <div class="accordion terms-accordion" id="termsAccordion">
                    <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#t1">1. Service Agreement</button></h2>
                        <div id="t1" class="accordion-collapse collapse" data-bs-parent="#termsAccordion">
                            <div class="accordion-body">By engaging Generation Marketing for any service, you agree to the terms outlined herein. Our services include but are not limited to SEO, Google Ads, Meta Ads, Social Media Management, Branding, and Website Development. All service deliverables, timelines, and pricing will be clearly communicated before project commencement.</div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#t2">2. Payment Terms</button></h2>
                        <div id="t2" class="accordion-collapse collapse" data-bs-parent="#termsAccordion">
                            <div class="accordion-body">All recurring services (SEO, Ads, Social Media) are billed monthly in advance. One-time services (Branding, Website) require 50% advance payment before work begins and 50% upon completion. Payments are non-refundable once work has commenced. All prices are in Indian Rupees (₹) and are exclusive of applicable taxes.</div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#t3">3. Refund Policy</button></h2>
                        <div id="t3" class="accordion-collapse collapse" data-bs-parent="#termsAccordion">
                            <div class="accordion-body">Refunds are available within 7 days of payment if no work has been initiated. Once the project is underway, refunds will be prorated based on work completed. Ad spend budgets paid to third-party platforms (Google, Meta) are non-refundable.</div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#t4">4. Intellectual Property</button></h2>
                        <div id="t4" class="accordion-collapse collapse" data-bs-parent="#termsAccordion">
                            <div class="accordion-body">All deliverables created by Generation Marketing become the property of the client upon full payment. This includes logos, designs, website code, and content. We reserve the right to showcase completed projects in our portfolio unless otherwise agreed upon in writing.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . '/includes/footer.php';
?>