<?php
/**
 * Dedicated Services Page - Generation Marketing
 */
$page_title = "Our Services | Generation Marketing - Digital Packages & Solutions";
$page_desc = "Boost your search engine visibility, paid ad ROI, and social presence. Explore Google Ads, Meta Ads, SEO Plans, Branding, Web Design, and E-Com Store Setups.";
include_once __DIR__ . '/includes/header.php';
?>

<!-- SERVICES HERO -->
<section class="details-section bg-dark text-white text-center d-flex align-items-center justify-content-center" style="padding: 140px 0 80px; background: linear-gradient(135deg, #0b1120 0%, #111827 100%) !important; position: relative; overflow: hidden;">
    <div class="hero-bg-icons" style="opacity: 0.15;">
        <i class="fas fa-bullseye icon-float" style="top: 10%; right: 15%; font-size: 3rem;"></i>
        <i class="fas fa-chart-pie icon-float" style="bottom: 15%; left: 10%; font-size: 2.5rem;"></i>
        <i class="fas fa-arrow-trend-up icon-float" style="top: 60%; left: 80%; font-size: 3rem;"></i>
    </div>
    <div class="container reveal">
        <h1 class="display-4 fw-extrabold mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 800; background: linear-gradient(to right, #ffffff, #93c5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Our Marketing Services</h1>
        <p class="lead max-w-2xl mx-auto" style="color: rgba(255,255,255,0.8); font-size: 1.25rem;">
            Choose from our highly specialized, result-oriented marketing plans engineered to scale conversions.
        </p>
    </div>
</section>

<!-- SERVICES FILTER & GRID -->
<section class="section-padding section-light" id="services">
    <div class="container">
        <div class="section-header text-center reveal">
            <h2>Specialized <span style="color:var(--primary)">Digital Solutions</span></h2>
            <p class="subtitle">Filter our packages to find the perfect plan that aligns with your growth targets.</p>
            <div class="accent-line mx-auto"></div>
        </div>
        
        <!-- Filter Tabs -->
        <div class="service-tabs reveal text-center mb-5 mt-2">
            <button class="service-tab active" data-filter="all">All Services</button>
            <button class="service-tab" data-filter="seo">SEO</button>
            <button class="service-tab" data-filter="ads">Paid Ads</button>
            <button class="service-tab" data-filter="smm">Social Media</button>
            <button class="service-tab" data-filter="brand">Branding</button>
            <button class="service-tab" data-filter="web">Web & E-Com</button>
        </div>

        <div class="row g-4">
            <!-- Google Ads -->
            <div class="col-md-6 col-lg-4 service-item" data-category="ads">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <span class="card-badge">⭐ Main Service</span>
                    <div class="card-img-wrapper"><img src="Services-posters/google-ads-package.jpeg" alt="Google Ads Package" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Google Ads Package</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹15,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>3-5 Campaigns (Search + Display)</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Advanced Keyword Research</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Conversion Tracking & Remarketing</li>
                        </ul>
                        <a href="service-details.php?id=google-ads-package" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Meta Ads -->
            <div class="col-md-6 col-lg-4 service-item" data-category="ads">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/meta-ad-package.jpeg" alt="Meta Ad Package" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Meta Ad Package</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹15,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>4-6 Campaigns (Lead/Sales)</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>10 Creatives (Post + Reels)</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>A/B Testing & Retargeting</li>
                        </ul>
                        <a href="service-details.php?id=meta-ad-package" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- SEO Starter -->
            <div class="col-md-6 col-lg-4 service-item" data-category="seo">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/seo-starter-plan.jpeg" alt="SEO Starter Plan" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">SEO Starter Plan</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹8,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Website SEO Audit</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>10-15 Keywords Research</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>On-Page SEO & GMB Optimization</li>
                        </ul>
                        <a href="service-details.php?id=seo-starter-plan" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- SEO Growth -->
            <div class="col-md-6 col-lg-4 service-item" data-category="seo">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <span class="card-badge" style="background:var(--green)">★ Recommended</span>
                    <div class="card-img-wrapper"><img src="Services-posters/growth-seo-plan.jpeg" alt="Growth SEO Plan" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Growth SEO Plan</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹15,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>20-30 Keywords + Technical SEO</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>10-15 Quality Backlinks</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Weekly Report + Strategy</li>
                        </ul>
                        <a href="service-details.php?id=growth-seo-plan" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- SEO Pro -->
            <div class="col-md-6 col-lg-4 service-item" data-category="seo">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/pro-seo-plan.jpeg" alt="Pro SEO Plan" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Pro SEO Plan</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹25,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>40-60 Keywords + Complete SEO</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>20-30 High Quality Backlinks</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Dedicated Support & Weekly Report</li>
                        </ul>
                        <a href="service-details.php?id=pro-seo-plan" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Branding -->
            <div class="col-md-6 col-lg-4 service-item" data-category="brand">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <span class="card-badge" style="background:var(--gold)">Premium</span>
                    <div class="card-img-wrapper"><img src="Services-posters/premium-brand-system.jpeg" alt="Premium Brand System" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Premium Brand System</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹35,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">one-time</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Logo + Brand Strategy + Guidelines</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Social Media Kit & Ad Creatives</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Business Stationery & Packaging</li>
                        </ul>
                        <a href="service-details.php?id=premium-brand-system" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Website Development -->
            <div class="col-md-6 col-lg-4 service-item" data-category="web">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <span class="card-badge" style="background:var(--green)">★ Recommended</span>
                    <div class="card-img-wrapper"><img src="Services-posters/growth-website-plan.jpeg" alt="Growth Website Plan" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Growth Website Plan</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹15,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">one-time</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>5-8 Pages + Premium UI/UX</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>SEO + Blog + Analytics Setup</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>WhatsApp & Call Integration</li>
                        </ul>
                        <a href="service-details.php?id=growth-website-plan" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- E-Com WooCommerce / Shopify Setup -->
            <div class="col-md-6 col-lg-4 service-item" data-category="web">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/ecommerce-website-setup.jpeg" alt="E-Commerce Website Setup" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">E-Commerce Store Setup</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹30,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">one-time</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Shopify/WooCommerce Setup</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Payment Gateway & Shipping Integration</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Up to 50 Product Listings + SEO</li>
                        </ul>
                        <a href="service-details.php?id=ecommerce-website-setup" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Marketplace Setup -->
            <div class="col-md-6 col-lg-4 service-item" data-category="web">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/starter-marketplace-setup.jpeg" alt="Marketplace Setup" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Starter Marketplace Setup</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹8,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">one-time</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Amazon, Flipkart, Meesho Listing</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>5-30 Product Listings & Optimization</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Sponsored Ad Setup & Training</li>
                        </ul>
                        <a href="service-details.php?id=starter-marketplace-setup" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- E-Com Management -->
            <div class="col-md-6 col-lg-4 service-item" data-category="web">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/ecommerce-management-plan.jpeg" alt="E-Commerce Management" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">E-Commerce Management</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹5,000 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month per plat</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Listing & SEO Optimization</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Ad Campaign Management</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Buy Box Strategy & Promos</li>
                        </ul>
                        <a href="service-details.php?id=ecommerce-management-plan" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- SMM Basic -->
            <div class="col-md-6 col-lg-4 service-item" data-category="smm">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <div class="card-img-wrapper"><img src="Services-posters/smm-basic-package.jpeg" alt="SMM Basic" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Social Media — Basic</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹7,999 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>12 Posts (Graphics + Reels)</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Caption & Hashtag Research</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>1 Platform Account Posting</li>
                        </ul>
                        <a href="service-details.php?id=smm-basic-package" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- SMM Standard -->
            <div class="col-md-6 col-lg-4 service-item" data-category="smm">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <span class="card-badge" style="background:var(--primary)">🔥 Popular</span>
                    <div class="card-img-wrapper"><img src="Services-posters/smm-standard-package.jpeg" alt="SMM Standard" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Social Media — Standard</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹9,999 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>20 Posts (Graphics + Reels + Story)</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Caption & Cohesive Grid Strategy</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>2 Platforms (FB + Instagram)</li>
                        </ul>
                        <a href="service-details.php?id=smm-standard-package" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- SMM Premium -->
            <div class="col-md-6 col-lg-4 service-item" data-category="smm">
                <div class="service-card position-relative h-100 bg-white rounded-4 shadow-sm border overflow-hidden transition-all hover-translate-y">
                    <span class="card-badge" style="background:var(--red)">👑 Premium</span>
                    <div class="card-img-wrapper"><img src="Services-posters/smm-premium-package.jpeg" alt="SMM Premium" class="w-100"></div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold" style="color: var(--navy);">Social Media — Premium</h4>
                        <div class="price-tag fw-extrabold mb-3" style="color: var(--primary); font-size: 1.5rem;">₹14,999 <span class="period text-muted" style="font-size: 0.9rem; font-weight: normal;">/month</span></div>
                        <ul class="features-mini list-unstyled mb-4" style="color: var(--gray); font-size: 0.95rem;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>30 Posts (Daily grid content)</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Full Account Handling & DM management</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Custom Video Editing & Story sets</li>
                        </ul>
                        <a href="service-details.php?id=smm-premium-package" class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold" style="font-size: 0.95rem;">
                            <i class="fas fa-eye me-1"></i> View Full Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES FOOTER CTA -->
<section class="section-padding bg-dark text-white text-center" style="background: linear-gradient(135deg, var(--navy) 0%, #0d1527 100%) !important;">
    <div class="container reveal">
        <h2 class="fw-bold mb-3">Unsure which package is right for your business?</h2>
        <p class="lead mb-4 text-muted-white mx-auto max-w-2xl" style="font-size: 1.15rem;">Get in touch for a completely free digital consultation and competitor audit report.</p>
        <a href="contact.php" class="btn-glow text-white text-decoration-none px-5 py-3 rounded-pill d-inline-block">
            <i class="fas fa-phone-alt"></i> Consult Our Experts
        </a>
    </div>
</section>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
