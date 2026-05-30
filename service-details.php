<?php
/**
 * Dynamic Service Details Page - Generation Marketing
 * Fully optimized with server-side rendering (SSR) for robust search engine indexing.
 */

// Define all premium marketing services in PHP server-side
$servicesData = [
    'google-ads-package' => [
        'title' => 'Google Ads Package',
        'price' => '₹15,000',
        'period' => '/month',
        'desc' => 'Drive instant, high-quality traffic to your website with targeted Google Ads campaigns designed for maximum ROI.',
        'longDesc' => 'Our Google Ads Package is designed for businesses looking for immediate visibility and lead generation. We handle everything from keyword research and ad copy creation to continuous optimization and A/B testing. We focus on reducing your cost-per-acquisition (CPA) while maximizing conversion rates globally.',
        'keywords' => 'google ads expert, hire PPC agency, Google ads management, digital marketing services, performance marketing, pay-per-click agency, search engine marketing, CPC optimization, global lead generation',
        'features' => [
            '3-5 Campaigns (Search, Display, Performance Max)',
            'Advanced Keyword Research & Negative Keywords',
            'Competitor Analysis & Ad Copywriting',
            'Conversion Tracking & Analytics Setup',
            'Remarketing Campaigns Setup',
            'Weekly Optimization & Transparent Reporting'
        ]
    ],
    'meta-ad-package' => [
        'title' => 'Meta Ad Package',
        'price' => '₹15,000',
        'period' => '/month',
        'desc' => 'Reach your target audience on Facebook and Instagram with highly converting ad creatives and strategic targeting.',
        'longDesc' => 'Tap into billions of active users with our Meta Ad Package. Perfect for e-commerce, local businesses, and service providers. We create compelling ad creatives, test multiple audiences, and retarget website visitors to drive sales and high-quality leads directly to your funnel.',
        'keywords' => 'meta ads agency, facebook advertising, instagram marketing specialist, lead generation ads, social media advertising, hire meta media buyer, eCommerce facebook ads, social media funnel builder',
        'features' => [
            '4-6 Campaigns (Lead Generation or Sales)',
            '10 Professional Creatives (Static Posts + Reels)',
            'Advanced Audience Targeting & Lookalike Audiences',
            'A/B Testing on Creatives and Ad Copy',
            'Pixel Setup & Custom Conversions',
            'Retargeting Setup for Maximum ROI'
        ]
    ],
    'seo-starter-plan' => [
        'title' => 'SEO Starter Plan',
        'price' => '₹8,000',
        'period' => '/month',
        'desc' => 'Build a strong organic foundation for long-term growth. Perfect for local businesses and beginners.',
        'longDesc' => 'SEO is a marathon, and the Starter Plan gets you on the track. We focus on fixing technical errors, optimizing your current pages, and setting up your Google My Business profile to start capturing local searches and organic traffic.',
        'keywords' => 'local SEO services, Google My Business optimization, website SEO audit, basic SEO package, improve search rankings, business citation building, local map pack SEO',
        'features' => [
            'Complete Website SEO Audit',
            '10-15 Target Keywords Research',
            'On-Page SEO (Titles, Meta tags, Headings)',
            'Google My Business (GMB) Setup & Optimization',
            '5 Basic Quality Backlinks/month',
            'Monthly Progress Report'
        ]
    ],
    'growth-seo-plan' => [
        'title' => 'Growth SEO Plan',
        'price' => '₹15,000',
        'period' => '/month',
        'desc' => 'Accelerate your organic rankings with advanced strategies, content optimization, and high-quality link building.',
        'longDesc' => 'Designed for growing businesses that want to dominate the first page of Google. We expand your keyword footprint, improve site speed and technical SEO, and acquire authoritative backlinks to boost your domain rating.',
        'keywords' => 'expert SEO agency, hire technical SEO expert, organic keyword ranking, domain authority growth, competitor search analysis, quality backlinks service, search engine optimizer, SEO Jaipur',
        'features' => [
            '20-30 Target Keywords',
            'Full On-Page & Technical SEO Optimization',
            '10-15 High-Quality Backlinks/month',
            'Competitor SEO Analysis',
            'Content Strategy & Recommendations',
            'Weekly Reporting & Strategy Calls'
        ]
    ],
    'pro-seo-plan' => [
        'title' => 'Pro SEO Plan',
        'price' => '₹25,000',
        'period' => '/month',
        'desc' => 'An aggressive SEO approach for established brands and e-commerce stores aiming for top market positions.',
        'longDesc' => 'Our most comprehensive organic growth package. We leave no stone unturned, implementing advanced schema markups, aggressive content strategies, and securing premium placements. Dedicated support ensures your SEO strategy adapts to market changes instantly.',
        'keywords' => 'premium SEO agency, enterprise SEO services, eCommerce SEO packages, dominate search rankings, elite backlink building, blog copywriting services, advanced schema markup, global SEO agency',
        'features' => [
            '4-60 Target Keywords',
            'Complete Website & E-commerce SEO',
            '20-30 Premium Quality Backlinks/month',
            'Blog Content Writing & Optimization',
            'Advanced Schema Markup Implementation',
            'Dedicated Account Manager & Weekly Optimization'
        ]
    ],
    'premium-brand-system' => [
        'title' => 'Premium Brand System',
        'price' => '₹35,000',
        'period' => 'one-time',
        'desc' => 'Establish a powerful, memorable identity that sets you apart from the competition and resonates with your audience.',
        'longDesc' => 'Your brand is more than a logo—it is the feeling customers get when interacting with your business. We build a complete brand ecosystem, from visual guidelines and typography to packaging and social media templates, ensuring consistent premium messaging across all touchpoints.',
        'keywords' => 'professional branding agency, corporate identity design, logo design services, business branding package, brand style guidelines, visual branding, social media brand kit, premium graphic design',
        'features' => [
            'Custom Logo Design (3 Concepts)',
            'Comprehensive Brand Strategy & Guidelines',
            'Typography & Color Palette Selection',
            'Social Media Kit (Profile, Cover, Post Templates)',
            'Business Stationery (Cards, Letterhead, Envelope)',
            'Product Packaging/Mockup Designs'
        ]
    ],
    'growth-website-plan' => [
        'title' => 'Growth Website Plan',
        'price' => '₹15,000',
        'period' => 'one-time',
        'desc' => 'Get a stunning, fast, and SEO-optimized 5-8 page corporate website that converts visitors into customers.',
        'longDesc' => 'We don\'t just build beautiful websites; we build sales machines. Your website will be fully responsive, lightning-fast, and designed with conversion rate optimization (CRO) principles. Includes essential integrations like WhatsApp chat, analytics, and contact forms.',
        'keywords' => 'premium web development agency, custom corporate website design, responsive UI UX design, hire website developers, conversion-rate-optimized web, clean code web design, bespoke PHP site development',
        'features' => [
            'Premium UI/UX Design (5-8 Pages)',
            'Mobile & Tablet Responsive Layout',
            'Basic On-Page SEO Setup',
            'Blog Section & Google Analytics Integration',
            'WhatsApp Floating Button & Contact Forms',
            '1 Month Free Technical Support'
        ]
    ],
    'ecommerce-website-setup' => [
        'title' => 'E-Commerce Store Setup',
        'price' => '₹30,000',
        'period' => 'one-time',
        'desc' => 'Launch your online store with a fully functional, high-converting Shopify or WooCommerce platform.',
        'longDesc' => 'Take your products online with a seamless shopping experience. We handle the technical setup, payment gateway integration, product uploads, and initial ad setup so you can start selling from day one.',
        'keywords' => 'ecommerce store setup, shopify store setup, WooCommerce developers, online shop launch packages, eCommerce theme design, payment gateway integration agency, retail shopping website design',
        'features' => [
            'Shopify or WooCommerce Setup',
            'Premium Theme Customization',
            'Payment Gateway & Shipping Integration',
            'Up to 50 Product Uploads + SEO',
            'Setup of 10 Initial Ad Campaigns (Google/Meta)',
            'Post-Launch Handover Training'
        ]
    ],
    'starter-marketplace-setup' => [
        'title' => 'Starter Marketplace Setup',
        'price' => '₹8,000',
        'period' => 'one-time',
        'desc' => 'Get your brand listed and selling on top Indian marketplaces like Amazon, Flipkart, and Meesho.',
        'longDesc' => 'Don\'t miss out on millions of daily shoppers. We will create your seller accounts, optimize your product listings with the right keywords, and guide you on marketplace best practices to ensure a smooth start.',
        'keywords' => 'marketplace listing optimization, Amazon seller central setup, Flipkart Meesho product cataloging, eCommerce sponsored product ads, marketplace onboarding service, seller central expert',
        'features' => [
            'Seller Account Setup (Amazon, Flipkart, Meesho)',
            '5-30 Product Listings Upload',
            'Product SEO & Keyword Optimization',
            'A+ Content/Cataloging Guidance',
            'Initial Sponsored Ads Setup',
            'Marketplace Growth Training'
        ]
    ],
    'ecommerce-management-plan' => [
        'title' => 'E-Commerce Management',
        'price' => '₹5,000',
        'period' => '/month per platform',
        'desc' => 'Let us manage your marketplace accounts while you focus on fulfillment and business expansion.',
        'longDesc' => 'Running marketplace ads and optimizing listings requires daily attention. Our experts will manage your seller central, run targeted ads to increase ROAS, and optimize listings to win the Buy Box more frequently.',
        'keywords' => 'ecommerce management agency, marketplace account manager, Amazon store optimization, boost eCommerce ROAS, multi-channel product listing management, buy box strategist, Amazon Ads manager',
        'features' => [
            'Daily Account Management & Health Check',
            'Continuous Listing & SEO Optimization',
            'Sponsored Ads Setup & Daily Management',
            'Inventory Updates & Promotion Planning',
            'Competitor Pricing Analysis',
            'Monthly Performance Reports'
        ]
    ],
    'smm-basic-package' => [
        'title' => 'Social Media Basic',
        'price' => '₹7,999',
        'period' => '/month',
        'desc' => 'Keep your social media active and engaging with professional posts and basic account management.',
        'longDesc' => 'Consistency is key on social media. We will maintain an active presence for your brand with high-quality graphics, engaging captions, and strategic hashtags to slowly build your organic following.',
        'keywords' => 'social media posting service, instagram grid optimization, professional caption writer, social media post designer, affordable social plans, monthly branding schedule, basic brand poster',
        'features' => [
            '12 Posts per Month (Graphics + Reels)',
            'Professional Post Design',
            'Engaging Caption Writing & Hashtags',
            'Management of 1 Platform (IG or FB)',
            'Basic Post Scheduling',
            'Monthly Progress Report'
        ]
    ],
    'smm-standard-package' => [
        'title' => 'Social Media Standard',
        'price' => '₹9,999',
        'period' => '/month',
        'desc' => 'Our most popular plan for businesses wanting aggressive organic growth and professional branding.',
        'longDesc' => 'Step up your social game. We create a cohesive grid, mix static posts with engaging reels, and implement a growth strategy that attracts your target audience and increases engagement rates significantly.',
        'keywords' => 'organic social media growth, social media content creator, custom video reel editing, cohesive grid design, community manager agency, instagram marketing company, digital marketing agency SMM',
        'features' => [
            '20 Posts per Month (Graphics + Reels + Stories)',
            'Premium Design & Video Editing',
            'Advanced Growth Strategy & Content Calendar',
            'Management of 2 Platforms (IG + FB)',
            'Community Engagement',
            'Monthly Insights & Strategy Call'
        ]
    ],
    'smm-premium-package' => [
        'title' => 'Social Media Premium',
        'price' => '₹14,999',
        'period' => '/month',
        'desc' => 'Total social media domination with daily posting, full account handling, and premium content creation.',
        'longDesc' => 'For brands that want to be top-of-mind every single day. We take complete ownership of your social media presence, ensuring daily touchpoints with your audience through highly polished, trend-aware content and interactive stories.',
        'keywords' => 'complete social media domination, premium social media management, daily post scheduling, dedicated social manager, custom short form video production, brand reputation management, global SMM expert',
        'features' => [
            '30 Posts per Month (Daily Content)',
            'Full Account Handling & DM Management',
            'Brand Strategy & Influencer Outreach Guidance',
            'Management of 2+ Platforms',
            'High-Quality Custom Graphics & Reel Editing',
            'Priority Support & Bi-Weekly Strategy Calls'
        ]
    ]
];

// Fetch and filter requested service package server-side
$service_id = isset($_GET['id']) ? trim($_GET['id']) : '';
$service = null;

if (!empty($service_id) && isset($servicesData[$service_id])) {
    $service = $servicesData[$service_id];
    
    // Set dynamic headers using the PHP array configuration
    $page_title = htmlspecialchars($service['title']) . " | Generation Marketing";
    $page_desc = htmlspecialchars($service['desc']);
    $page_keywords = htmlspecialchars($service['keywords']);
} else {
    // Return standard HTTP 404 header for search engine spider compliance
    header("HTTP/1.1 404 Not Found");
    $page_title = "Service Not Found | Generation Marketing";
    $page_desc = "The requested digital marketing package was not found. Explore our complete suite of SEO, Ads, Branding, and Web services.";
    $page_keywords = "digital marketing services, services packages, SEO packages, paid ads, branding, website development";
}

include_once __DIR__ . '/includes/header.php';
?>

<style>
    .details-section { padding: 120px 0 80px; }
    .details-poster img { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 500px; display: block; margin: 0 auto; }
    .details-content h1 { color: var(--navy); margin-bottom: 20px; font-weight: 800; font-family: 'Poppins', sans-serif; }
    .price-box { background: rgba(26,115,232,0.1); padding: 15px 25px; border-radius: 12px; display: inline-block; margin-bottom: 30px; border: 1px solid rgba(26,115,232,0.2); }
    .price-box h3 { color: var(--primary); margin: 0; font-size: 1.8rem; font-weight: 800; }
    .price-box span { font-size: 0.9rem; color: var(--gray); font-weight: normal; }
    .feature-list { list-style: none; padding: 0; margin-bottom: 40px; }
    .feature-list li { margin-bottom: 15px; display: flex; align-items: flex-start; gap: 12px; font-size: 1.05rem; }
    .feature-list li i { color: var(--green); font-size: 1.2rem; margin-top: 3px; }
</style>

<!-- Main Dynamic Content -->
<section class="details-section">
    <div class="container mt-4">
        <div class="row align-items-center mb-5">
            <div class="col-12 mb-4">
                <a href="services.php" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="fas fa-arrow-left me-2"></i> All Services
                </a>
            </div>
            
            <?php if ($service): ?>
                <!-- Service Banner Illustration/Poster -->
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="details-poster">
                        <img id="servicePoster" src="Services-posters/<?php echo htmlspecialchars($service_id); ?>.jpeg" alt="<?php echo htmlspecialchars($service['title']); ?> Package Poster">
                    </div>
                </div>
                
                <!-- Core Description Details -->
                <div class="col-lg-7 details-content ps-lg-5">
                    <h1 id="serviceTitle"><?php echo htmlspecialchars($service['title']); ?></h1>
                    
                    <div class="price-box">
                        <h3 id="servicePrice"><?php echo htmlspecialchars($service['price']); ?> <span><?php echo htmlspecialchars($service['period']); ?></span></h3>
                    </div>
                    
                    <p class="lead mb-4" id="serviceDesc" style="color: var(--gray); font-size: 1.15rem; line-height: 1.6;"><?php echo htmlspecialchars($service['desc']); ?></p>
                    
                    <h4 class="mb-3" style="color: var(--navy);">What's Included:</h4>
                    <ul class="feature-list" id="serviceFeatures">
                        <?php foreach ($service['features'] as $feature): ?>
                            <li>
                                <i class="fas fa-check-circle mt-1"></i> 
                                <span style="color: var(--navy); font-weight: 500;"><?php echo htmlspecialchars($feature); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="d-flex flex-wrap gap-3 mt-5">
                        <a href="contact.php?plan=<?php echo urlencode($service_id); ?>" class="btn-glow text-white text-decoration-none px-5 py-3 rounded-pill">
                            <i class="fas fa-rocket"></i> Get Started Now
                        </a>
                        <a href="https://wa.me/918306156521?text=Hi,%20I'm%20interested%20in%20your%20<?php echo urlencode($service['title']); ?>%20package." target="_blank" class="btn btn-outline-success rounded-pill px-4 py-3 fw-bold" style="border-width: 2px;">
                            <i class="fab fa-whatsapp fs-5"></i> Chat on WhatsApp
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Not Found Template -->
                <div class="col-12 text-center py-5">
                    <div class="mb-4 text-danger" style="font-size: 4rem;"><i class="fas fa-exclamation-triangle"></i></div>
                    <h2 class="fw-bold" style="color: var(--navy);">Service Package Not Found</h2>
                    <p class="lead text-muted mt-2">The package you are looking for does not exist or has been updated.</p>
                    <a href="services.php" class="btn btn-primary rounded-pill px-5 py-3 fw-bold mt-4" style="background: var(--primary); border: none;">Explore Available Packages</a>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if ($service): ?>
            <!-- Dynamic Choice Pitch -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-light" style="border: 1px solid rgba(0,0,0,0.05) !important;">
                        <h3 class="mb-4" style="color: var(--navy);">Why Choose This Package?</h3>
                        <p id="serviceLongDesc" style="color: var(--gray); font-size: 1.05rem; line-height: 1.8;"><?php echo htmlspecialchars($service['longDesc']); ?></p>
                        
                        <hr class="my-4" style="opacity: 0.1;">
                        
                        <h4 style="color: var(--navy);">Our Delivery Process:</h4>
                        <ol class="mt-3 ps-3" style="color: var(--gray); line-height: 2;">
                            <li><strong>Discovery & Audit:</strong> Comprehensive analysis of your current digital footprint and goals.</li>
                            <li><strong>Strategy Formulation:</strong> Custom-tailored plan focusing on your business KPIs and target audience.</li>
                            <li><strong>Execution:</strong> Launching campaigns, optimizing SEO, or creating premium brand assets.</li>
                            <li><strong>Tracking & Reporting:</strong> Transparent weekly/monthly reports to track growth and optimize further.</li>
                        </ol>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
